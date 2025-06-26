<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div style="margin-bottom: 20px">
        <a href="/">
            <img src="{{asset('img/Universitas_Bumigora.png')}}" alt=""  class=" fill-current text-gray-500" style="height: 200px; margin: 0 auto 0 auto; padding-bottom: 10px;border-bottom :10px; ">
        </a>
        <hr style="border-bottom: 2px solid;" class="my-2">
        <div class="text-center">
                <a href="{{route('login_mhs')}}" class="btn btn-secondary" > Mahasiswa </a>
                <a href="{{route('login_dosen')}}" class="btn btn-primary"> Dosen </a>
        </div>
    </div>
    <form method="POST" action="{{ route('login_dosen') }}">
        @csrf
        <div>
            <x-input-label for="email" :value="__('email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email')" required autofocus autocomplete="nim" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>
        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
