<div class="w-100 ">
    <h2 class="fw-bold mb-3 float-start">
        {{ $title }}
    </h2>
    <div class="float-end pt-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                @for ($i = 2; $i < 5; $i++)
                    @if (request()->segment($i))
                        @php
                            $string = request()->segment($i);
                            $string = str_replace('_', ' ', $string);
                            $string = ucwords($string);
                        @endphp
                        <li class="breadcrumb-item"><a href="#">{{ $string }}</a></li>
                    @endif
                @endfor
            </ol>
        </nav>
    </div>
</div>
