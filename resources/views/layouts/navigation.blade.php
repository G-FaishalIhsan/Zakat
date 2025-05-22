<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('dashboard') }}" class="app-brand-link">
            <img src="{{ asset("../assets/img/logo/logo.jpg") }}" alt="Logo" style="max-height: 100px; width: auto;">
            <span class="app-brand-text demo menu-text fw-bold ms-2">Zakat Fitrah</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="bx bx-chevron-left d-block d-xl-none align-middle"></i>
        </a>
    </div>

    <div class="menu-divider mt-0"></div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboards -->
        <li class="menu-item">
            <a href="{{ route('dashboard') }}" class="menu-link ">
                <i class="menu-icon tf-icons bx bx-home-smile"></i>
                <div class="text-truncate" data-i18n="Dashboards">Dashboards</div>
            </a>
        </li>
        <!-- Layouts -->

        <!-- Apps & Pages -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Muzakki &amp; Mustahik</span>
        </li>
        <!-- Pages -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-user-check"></i>
                <div class="text-truncate" data-i18n="Account Settings">Muzakki</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('muzakki.index') }}" class="menu-link">
                        <div class="text-truncate" data-i18n="Account">List Muzakki</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('muzakki.create') }}" class="menu-link">
                        <div class="text-truncate" data-i18n="Notifications">Tambah Muzakki</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
                <div class="text-truncate" data-i18n="Authentications">Mustahik</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('mustahik.index') }}" class="menu-link" >
                        <div class="text-truncate" data-i18n="Basic">List Mustahik</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('mustahik.create') }}" class="menu-link" >
                        <div class="text-truncate" data-i18n="Basic">Tambah Mustahik</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-cube-alt"></i>
                <div class="text-truncate" data-i18n="Misc">Kategori Mustahik</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('kategori_mustahik.index') }}" class="menu-link">
                        <div class="text-truncate" data-i18n="Error">List Kategori</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('kategori_mustahik.create') }}" class="menu-link">
                        <div class="text-truncate" data-i18n="Under Maintenance">Tambah Kategori</div>
                    </a>
                </li>
            </ul>
        </li>
        <!-- Components -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Pengumpulan Zakat</span></li>
        <!-- Cards -->
        <li class="menu-item {{ request()->routeIs('laporan.pengumpulan*') }}">
            <a href="{{ route('laporan.pengumpulan') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-collection"></i>
                <div class="text-truncate" data-i18n="Basic">Laporan Pengumpulan</div>
            </a>
        </li>
        <!-- User interface -->
        <li class="menu-item">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-box"></i>
                <div class="text-truncate" data-i18n="User interface">Bayar Zakat</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('pengumpulan.index') }}" class="menu-link">
                        <div class="text-truncate" data-i18n="Alerts">List Pembayaran</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('pengumpulan.create') }}" class="menu-link">
                        <div class="text-truncate" data-i18n="Accordion">Tambah Pembayaran</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Distribusi Zakat</span></li>
        <!-- Cards -->
        <li class="menu-item {{ request()->routeIs('laporan.distribusi*') }}">
            <a href="{{ route('laporan.distribusi') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-collection"></i>
                <div class="text-truncate" data-i18n="Basic">Laporan Distribusi</div>
            </a>
        </li>
        <!-- User interface -->
        <li class="menu-item">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-box"></i>
                <div class="text-truncate" data-i18n="User interface">Zakat Warga</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('distribusi-warga.index') }}" class="menu-link">
                        <div class="text-truncate" data-i18n="Alerts">List Distribusi</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('distribusi-warga.create') }}" class="menu-link">
                        <div class="text-truncate" data-i18n="Accordion">Tambah Distribusi</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-box"></i>
                <div class="text-truncate" data-i18n="User interface">Zakat Mustahik</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('distribusi-mustahik.index') }}" class="menu-link">
                        <div class="text-truncate" data-i18n="Alerts">List Distribusi</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('distribusi-mustahik.create') }}" class="menu-link">
                        <div class="text-truncate" data-i18n="Accordion">Tambah Distribusi</div>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</aside>
