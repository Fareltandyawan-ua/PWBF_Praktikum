<nav class="navbar navbar-dark bg-dark px-3">
    <div class="d-flex align-items-center">

        <!-- Sidebar toggle -->
        <button id="toggleSidebar" class="btn btn-outline-light me-3">
            <i class="fa-solid fa-bars"></i>
        </button>

        <span class="navbar-brand">RSHP</span>
    </div>

    <div class="d-flex align-items-center">
        <!-- Logout -->
        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
            class="btn btn-danger btn-sm">
            <i class="fa-solid fa-right-from-bracket"></i> Logout
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
            @csrf
        </form>
    </div>
</nav>
