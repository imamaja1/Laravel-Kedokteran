<div class="w-100 ">
    <h2 class="fw-bold mb-3 float-start">
        {{ $title }}
    </h2>
    <div class="float-end pt-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                @php
                    $href = 'admin';
                @endphp
                <li class="breadcrumb-item"><a href="{{url($href.'/dashboard')}}">Dashboard</a></li>
                @for ($i = 2; $i < 5; $i++)
                    @if (request()->segment($i))
                        @php
                            $string1 = request()->segment($i);
                            if (preg_match('/\d/', $string1)) {
                                 continue;
                            }
                            $string = str_replace('_', ' ', $string1);
                            $string = ucwords($string);
                            $href = $href.'/'.strtolower($string1);
                        @endphp
                        {{-- @if ($i == 2)
                            <li class="breadcrumb-item"><a href="{{url($href)}}" >{{ $string }}</a></li>
                        @else
                            <li class="breadcrumb-item"><a href="#" >{{ $string }}</a></li>
                        @endif --}}
                    @endif
                @endfor
            </ol>
        </nav>
    </div>
</div>