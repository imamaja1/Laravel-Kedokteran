<?php

namespace App\Http\Middleware;

use Closure;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class CekLoginAttempt
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $ip = $request->ip();
        $email = $request->input('email');
        $captcha = $request->input('g-recaptcha-response');
        $userAgent = $request->header('User-Agent');

        // 1. Cek limit request (max 5 per menit per IP)
        $key = 'login_attempts_' . $ip;
        $attempts = Cache::get($key, 0);

        if ($attempts >= 5) {
            return response()->json(['message' => 'Terlalu banyak percobaan login. Coba lagi nanti.'], 429);
        }

        // 2. Verifikasi reCAPTCHA
        $captchaPassed = $this->verifyRecaptcha($captcha);

        if (!$captchaPassed) {
            // Simpan log gagal karena captcha
            $this->saveLog($ip, $email, $userAgent, false, false);
            return response()->json(['message' => 'Captcha tidak valid.'], 403);
        }

        // Tambahkan hitungan percobaan login
        Cache::put($key, $attempts + 1, now()->addMinutes(1));

        // Simpan log percobaan login (hasil suksesnya nanti di controller login)
        $this->saveLog($ip, $email, $userAgent, true, false);

        return $next($request);
    }

    private function verifyRecaptcha($captchaResponse)
    {
        $secret = env('RECAPTCHA_SECRET_KEY');
        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response={$captchaResponse}");
        $result = json_decode($response, true);

        return $result['success'] ?? false;
    }

    private function saveLog($ip, $email, $userAgent, $captchaPassed, $success)
    {
        DB::table('login_attempts')->insert([
            'ip' => $ip,
            'email' => $email,
            'user_agent' => $userAgent,
            'captcha_passed' => $captchaPassed,
            'success' => $success,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
