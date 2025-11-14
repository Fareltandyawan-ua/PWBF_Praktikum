<div id="sidebar" class="sidebar">

    <!-- DASHBOARD -->
    <a href="{{ route('admin.dashboard-admin') }}"
       class="{{ request()->routeIs('admin.dashboard-admin') ? 'active-menu' : '' }}">
        <i class="fa-solid fa-gauge icon-only"></i>
        <span class="text">Dashboard</span>
    </a>

    <!-- DATA MASTER -->
    <a href="#"
       class="sidebar-toggle d-flex justify-content-between align-items-center"
       data-bs-toggle="collapse"
       data-bs-target="#menuMaster"
       aria-expanded="{{ request()->is('admin/*') ? 'true' : 'false' }}"
       aria-controls="menuMaster">

        <div>
            <i class="fa-solid fa-database icon-only"></i>
            <span class="text">Data Master</span>
        </div>

        <i class="fa-solid fa-chevron-right toggle-icon 
            {{ request()->is('admin/jenis-hewan*') 
            || request()->is('admin/kategori*')
            || request()->is('admin/kategori-klinis*')
            || request()->is('admin/kode-tindakan-terapi*')
            || request()->is('admin/pemilik*')
            || request()->is('admin/pet*')
            || request()->is('admin/ras-hewan*')
            || request()->is('admin/role*')
            || request()->is('admin/user*')
            || request()->is('admin/role-user*')
            ? 'rotate' : '' }}">
        </i>
    </a>

    <!-- SUBMENU -->
    <div class="collapse submenu ps-3
        {{ request()->is('admin/jenis-hewan*')
        || request()->is('admin/kategori*')
        || request()->is('admin/kategori-klinis*')
        || request()->is('admin/kode-tindakan-terapi*')
        || request()->is('admin/pemilik*')
        || request()->is('admin/pet*')
        || request()->is('admin/ras-hewan*')
        || request()->is('admin/role*')
        || request()->is('admin/user*')
        || request()->is('admin/role-user*')
        ? 'show' : '' }}"
         id="menuMaster">

        <a href="{{ route('admin.jenis-hewan.index') }}"
           class="{{ request()->routeIs('admin.jenis-hewan.*') ? 'active-sub' : '' }}">
            <i class="fa-solid fa-paw icon-only"></i>
            <span class="text">Jenis Hewan</span>
        </a>

        <a href="{{ route('admin.kategori.index') }}"
           class="{{ request()->routeIs('admin.kategori.*') ? 'active-sub' : '' }}">
            <i class="fa-solid fa-layer-group icon-only"></i>
            <span class="text">Kategori</span>
        </a>

        <a href="{{ route('admin.kategori-klinis.index') }}"
           class="{{ request()->routeIs('admin.kategori-klinis.*') ? 'active-sub' : '' }}">
            <i class="fa-solid fa-clipboard-list icon-only"></i>
            <span class="text">Kategori Klinis</span>
        </a>

        <a href="{{ route('admin.kode-tindakan-terapi.index') }}"
           class="{{ request()->routeIs('admin.kode-tindakan-terapi.*') ? 'active-sub' : '' }}">
            <i class="fa-solid fa-file-medical icon-only"></i>
            <span class="text">Kode Tindakan Terapi</span>
        </a>

        <a href="{{ route('admin.pemilik.index') }}"
           class="{{ request()->routeIs('admin.pemilik.*') ? 'active-sub' : '' }}">
            <i class="fa-solid fa-user icon-only"></i>
            <span class="text">Pemilik</span>
        </a>

        <a href="{{ route('admin.pet.index') }}"
           class="{{ request()->routeIs('admin.pet.*') ? 'active-sub' : '' }}">
            <i class="fa-solid fa-dog icon-only"></i>
            <span class="text">Pet</span>
        </a>

        <a href="{{ route('admin.ras-hewan.index') }}"
           class="{{ request()->routeIs('admin.ras-hewan.*') ? 'active-sub' : '' }}">
            <i class="fa-solid fa-cat icon-only"></i>
            <span class="text">Ras Hewan</span>
        </a>

        <a href="{{ route('admin.role.index') }}"
           class="{{ request()->routeIs('admin.role.*') ? 'active-sub' : '' }}">
            <i class="fa-solid fa-id-badge icon-only"></i>
            <span class="text">Role</span>
        </a>

        <a href="{{ route('admin.user.index') }}"
           class="{{ request()->routeIs('admin.user.*') ? 'active-sub' : '' }}">
            <i class="fa-solid fa-users icon-only"></i>
            <span class="text">User</span>
        </a>

        <a href="{{ route('admin.role-user.index') }}"
           class="{{ request()->routeIs('admin.role-user.*') ? 'active-sub' : '' }}">
            <i class="fa-solid fa-users-gear icon-only"></i>
            <span class="text">Role User</span>
        </a>

    </div>

</div>
