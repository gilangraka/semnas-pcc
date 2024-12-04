{{-- Aside --}}
<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="light"> <!--begin::Sidebar Brand-->
    <div class="sidebar-brand"><a href="{{url('/')}}" class="brand-link"><span class="brand-text fw-light">SEMNAS
                2025</span></a></div>
    <div class="sidebar-wrapper">
        <nav class="mt-2"> <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-item"> <a href="{{ url('/') }}" class="nav-link"> <i
                            class="nav-icon bi bi-house"></i>
                        <p>
                            Home
                        </p>
                    </a>
                </li>
                <li class="nav-item"> <a href="{{ route('dashboard.index') }}"
                        class="nav-link {{ request()->routeIs('dashboard.index') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-header">PAGES</li>
                @can('Lihat User')
                    <li class="nav-item"> <a href="#"
                            class="nav-link {{ request()->routeIs('manage-peserta.index') || request()->routeIs('manage-panitia.index') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-people-fill"></i>
                            <p>
                                Kelola User
                                <i class="nav-arrow bi bi-chevron-right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item"> <a href="{{ route('manage-panitia.index') }}"
                                    class="nav-link {{ request()->routeIs('manage-panitia.index') ? 'active' : '' }}"> <i
                                        class="nav-icon bi bi-dot"></i>
                                    <p>Panitia Seminar</p>
                                </a> </li>
                            <li class="nav-item"> <a href="{{ route('manage-peserta.index') }}"
                                    class="nav-link {{ request()->routeIs('manage-peserta.index') ? 'active' : '' }}"> <i
                                        class="nav-icon bi bi-dot"></i>
                                    <p>Peserta Seminar</p>
                                </a> </li>
                        </ul>
                    </li>
                @endcan

                @can('Scan QR')
                    <li class="nav-item">
                        <a href="{{ route('scan-qr.index') }}"
                            class="nav-link {{ request()->routeIs('scan-qr.index') ? 'active' : '' }}"> <i
                                class="nav-icon bi bi-qr-code"></i>
                            <p>Scan QR Code</p>
                        </a>
                    </li>
                @endcan

                <li class="nav-item"> <a href="https://techcomfest.ukmpcc.org" class="nav-link" target="_blank">
                        <i class="nav-icon bi bi-trophy"></i>
                        <p>Techcom Fest</p>
                    </a> </li>
                <li class="nav-item"> <a href="https://wa.me/6285742089646" class="nav-link" target="_blank"> <i
                            class="nav-icon bi bi-whatsapp"></i>
                        <p>Hubungi Kami</p>
                    </a> </li>

                <hr class="my-3 text-white" />

                <li class="nav-item">
                    <a onclick="document.getElementById('logout-form').submit()" href="#" class="nav-link">
                        <i class="nav-icon bi bi-box-arrow-left"></i>
                        <p>Sign Out</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>

<form id="logout-form" method="POST" action="{{ route('logout') }}">
    @csrf
    @method('delete')
</form>
{{-- End Aside --}}
