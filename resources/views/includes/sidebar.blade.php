<nav class="navbar bg-body-tertiary fixed-top">
  <div class="container-fluid">
      <a class="navbar-brand" href="#">Dashboard</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
          <div class="offcanvas-header">
              <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Zakat</h5>
              <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body d-flex flex-column justify-content-between">
              <!-- Bagian navigasi utama -->
              <div>
                  <ul class="navbar-nav flex-column">
                      <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Data Muzakki
                          </a>
                          <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="{{ url('/dashboard/muzakki/') }}">Master Data Muzakki</a></li>
                              <li><a class="dropdown-item" href="{{ url('/dashboard/muzakki/create') }}">Atur & Tambah Data Muzakki</a></li>
                          </ul>
                      </li>
                      <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Data Mustahik
                          </a>
                          <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="{{ url('/dashboard/mustahik/') }}">Master Data Mustahik</a></li>
                              <li><a class="dropdown-item" href="{{ url('/dashboard/mustahik/create') }}">Atur & Tambah Data Mustahik</a></li>
                          </ul>
                      </li>
                      <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Kategori Mustahik
                          </a>
                          <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="{{ url('/dashboard/kategori_mustahik/') }}">Semua Kategori Mustahik</a></li>
                              <li><a class="dropdown-item" href="{{ url('/dashboard/kategori_mustahik/create') }}">Tambah Kategori Mustahik</a></li>
                          </ul>
                      </li>
                      <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Pengumpulan Zakat
                          </a>
                          <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="{{ url('/dashboard/pengumpulan_zakat') }}">Data Pengumpulan Zakat Fitrah</a></li>
                              <li><a class="dropdown-item" href="{{ url('/dashboard/pengumpulan_zakat/create') }}">Tambah Pengumpulan Zakat Fitrah</a></li>
                          </ul>
                      </li>
                      <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Distribusi Zakat
                          </a>
                          <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="{{ url('/dashboard/distribusi_zakat') }}">Data Distribusi Zakat Fitrah</a></li>
                              <li><a class="dropdown-item" href="{{ url('/dashboard/distribusi_zakat/create') }}">Tambah Data Distribusi Zakat Fitrah</a></li>
                          </ul>
                      </li>
                      <li><a class="nav-link" href="{{ url('/dashboard/laporan_pengumpulan') }}">Laporan Pengumpulan</a></li>
                      <li><a class="nav-link" href="{{ url('/dashboard/laporan_distribusi') }}">Laporan Distribusi</a></li>
                  </ul>
              </div>

              <!-- Bagian username dan logout -->
              <div class="mt-4">
                  <div class="media-body">
                      <span>{{ Auth::user()->name }}</span>
                      <p class="mb-0 font-roboto">Pengurus DKM <i class="middle fa fa-angle-down"></i></p>
                  </div>
                  <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                      <i data-feather="log-out"></i>
                      <span>Log out</span>
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
              </div>
          </div>
      </div>
  </div>
</nav>
