<!DOCTYPE html>
<html lang="id">

{{-- HEADER (HEAD) --}}
@include('layouts.lte.head')

<body>
    <style>
        /* submenu link */
        .submenu a {
            padding: 8px 10px;
            display: block;
            border-radius: 6px;
            transition: 0.2s;
        }

        .submenu a:hover {
            background: rgba(255, 255, 255, 0.1);
        }

        /* icon rotation */
        .toggle-icon {
            transition: transform .25s ease;
        }

        .toggle-icon.rotate {
            transform: rotate(90deg);
        }

        /* active states */
        .active-sub {
            background: rgba(0, 123, 255, 0.15) !important;
            font-weight: bold;
            border-left: 3px solid #007bff;
        }
    </style>

    {{-- NAVBAR --}}
    @include('layouts.lte.navbar')

    <div class="d-flex">

        {{-- SIDEBAR --}}
        @include('layouts.lte.sidebar')

        {{-- AREA HALAMAN --}}
        <div class="content-wrapper w-100 p-4">
            @yield('content')
        </div>
    </div>
    {{-- FOOTER --}}
    @include('layouts.lte.footer')
</body>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const toggles = document.querySelectorAll('.sidebar-toggle');

    toggles.forEach(toggle => {
        const target = document.querySelector(toggle.dataset.bsTarget);
        const icon = toggle.querySelector('.toggle-icon');

        // event saat collapse dibuka
        target.addEventListener('show.bs.collapse', () => {
            icon.classList.add('rotate');
        });

        // event saat collapse ditutup
        target.addEventListener('hide.bs.collapse', () => {
            icon.classList.remove('rotate');
        });
    });
});
</script>

</html>