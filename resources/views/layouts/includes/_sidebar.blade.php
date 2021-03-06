<ul class="sidebar navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="{{ route('dashboard') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span>
      </a>
    </li>
    <!-- Admin -->
    @if(auth()->user()->role == 'Admin')
    <li class="nav-item">
      <a class="nav-link" href="{{ route('konfirmasipem.index') }}">
        <i class="fas fa-fw fa-clipboard-check"></i>
        <span>Verifikasi Pembayaran</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('terverifikasi.index') }}">
        <i class="fas fa-fw fa-check-circle"></i>
        <span>Pembayaran Terverifikasi</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('dp.index') }}">
        <i class="fas fa-fw fa-table"></i>
        <span>Data Pengajar</span></a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="/Maqdis/jadwal-pengajar">
      <i class="fas fa-fw fa-clipboard-list"></i>
      <span>Jadwal Pengajar</span></a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="{{ route('ds.index') }}">
      <i class="fas fa-fw fa-table"></i>
      <span>Data Peserta</span></a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="{{ route('jpeserta.index') }}">
      <i class="fas fa-fw fa-clipboard-list"></i>
      <span>Jadwal Peserta</span></a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="{{ route('absen.index') }}">
      <i class="fas fa-fw fa-book"></i>
      <span>Rekap Kehadiran</span></a>
    </li>
    <li class="nav-item">
    {{-- <a class="nav-link" href="{{ route('konfirmasi.index') }}">
      <i class="fas fa-fw fa-check-double"></i>
      <span>Konfirmasi Lanjut Program</span></a>
    </li>
    --}}
    <!-- Super Admin -->
    <li class="nav-item">
    <a class="nav-link" href="{{ route('pengguna.index') }}">
      <i class="fas fa-fw fa-users"></i>
      <span>Data Pengguna</span></a>
    </li>
    <!-- /super admin -->
    @endif
    <!-- /admin -->

    <!-- Pengajar -->
    @if(auth()->user()->role == 'Pengajar')
    <li class="nav-item">
    <a class="nav-link" href="{{ route('absen.pengajar') }}">
      <i class="fas fa-fw fa-calendar-check"></i>
      <span>Absensi</span></a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="{{ route('jadwal.pengajar') }}">
      <i class="fas fa-fw fa-clipboard-list"></i>
      <span>Jadwal</span></a>
    </li>
    @endif
    <!-- /pengajar -->

    @if(auth()->user()->role == 'Peserta')
    <!-- Peserta -->
    <li class="nav-item">
    <a class="nav-link" href="{{ route('daftar.index') }}">
      <i class="fas fa-fw fa-clipboard-list"></i>
      <span>Daftar Program</span></a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="{{ route('jadwal.pertemuan') }}">
      <i class="fas fa-fw fa-calendar-check"></i>
      <span>Jadwal Pertemuan</span></a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="{{ route('absen.peserta') }}">
      <i class="fas fa-fw fa-user-check"></i>
      <span>Absensi</span></a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="{{ route('status.pembayaran') }}">
      <i class="fas fa-fw fa-credit-card"></i>
      <span>Status Pembayaran</span></a>
    </li>
    <!-- /peserta -->
    @endif
</ul>
