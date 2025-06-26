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
<li class="nav-item {{ request()->segment(2) == 'dosen' ? 'active' : '' }}">
    <a href="{{route('admin.program_studi')}}" class="collapsed" aria-expanded="false">
        <i class="fas fa-home"></i>
        <p>Dosen</p>
    </a>
</li>

