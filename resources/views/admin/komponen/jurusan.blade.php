<li class="nav-item ">
    <a data-bs-toggle="collapse" href="#submenu3" class="collapsed" aria-expanded="false" style="pointer-events: none">
        <p>Jurusan</p>
    </a>
</li>
<li class="nav-item {{ request()->segment(2) == 'fakultas' ? 'active' : '' }}">
    <a href="{{route('admin.fakultas')}}" class="collapsed" aria-expanded="false">
        <i class="fas fa-home"></i>
        <p>Fakutlas</p>
    </a>
</li>
<li class="nav-item {{ request()->segment(2) == 'program_studi' ? 'active' : '' }}">
    <a href="{{route('admin.program_studi')}}" class="collapsed" aria-expanded="false">
        <i class="fas fa-home"></i>
        <p>Program Studi</p>
    </a>
</li>
<li class="nav-item  {{ request()->segment(2) == 'kurikulum' ? ' submenu' : '' }}">
    <a data-bs-toggle="collapse" href="#submenu1" 
        class="{{ request()->segment(2) == 'kurikulum' ? '' : 'collapsed' }}" 
        aria-expanded="{{ request()->segment(2) == 'kurikulum' ? 'true' : 'false' }}">
        <i class="fas fa-bars"></i>
        <p>Kurikulum</p>
        <span class="caret"></span>
    </a>
    <div class="{{ request()->segment(2) == 'kurikulum' ? 'collapse show' : 'collapse ' }}" id="submenu1" style="">
        <ul class="nav nav-collapse ">
            <li>
                <a href="{{route('admin.kurikulum')}}" >
                    <span class="sub-item @if (request()->segment(2) == 'kurikulum' && request()->segment(3) == 'data_kurikulum')
                        text-white
                    @endif ">Data Kurikulum</span>
                </a>
            </li>
            <li>
                <a href="{{route('admin.matakuliah')}}">
                    <span class="sub-item @if (request()->segment(2) == 'kurikulum' && request()->segment(3) == 'matakuliah')
                        text-white
                    @endif ">Matakuliah</span>
                </a>
            </li>
            <li>
                <a href="">
                    <span class="sub-item @if (request()->segment(2) == 'kurikulum' && request()->segment(3) == 'matakuliah_prasyarat')
                        text-white
                    @endif ">Matakuliah Prasyarat</span>
                </a>
            </li>
        </ul>
    </div>
</li>
<li class="nav-item {{ request()->segment(2) == 'program_studi' ? 'active' : '' }}">
    <a href="{{route('admin.program_studi')}}" class="collapsed" aria-expanded="false">
        <i class="fas fa-home"></i>
        <p>Dosen</p>
    </a>
</li>
<li class="nav-item {{ request()->segment(2) == 'program_studi' ? 'active' : '' }}">
    <a href="{{route('admin.program_studi')}}" class="collapsed" aria-expanded="false">
        <i class="fas fa-home"></i>
        <p>Perwalian</p>
    </a>
</li>