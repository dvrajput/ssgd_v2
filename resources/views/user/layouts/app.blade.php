<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Default Title')</title>

    <!-- Latest Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<style>
    :root {
        /* Light theme variables */
        --bg-color: #f8f9fa;
        --text-color: #212529;
        --card-bg: #ffffff;
        --border-color: #ced4da;
        --primary-color: #d7861b;
        --navbar-bg: #d7861b;
        --dropdown-bg: #ffffff;
        --input-bg: #ffffff;
        --input-text: #212529;
    }

    [data-theme="dark"] {
        /* Dark theme variables */
        --bg-color: #212529;
        --text-color: #f8f9fa;
        --card-bg: #2c3034;
        --border-color: #495057;
        --primary-color: #e69932;
        --navbar-bg: #d7861b;
        --dropdown-bg: #343a40;
        --input-bg: #343a40;
        --input-text: #f8f9fa;
    }

    /* Apply variables */
    body {
        background-color: var(--bg-color);
        color: var(--text-color);
        /* transition: all 0.3s ease; */
    }

    .navbar {
    background-color: var(--navbar-bg);
}

.navbar-brand,
.navbar-nav .nav-link,
.navbar .dropdown-toggle,
#themeToggle,
.navbar .nav-link.active {
    color: #ffffff !important;
}

    .card {
        background-color: var(--card-bg);
        border-color: var(--border-color);
    }

    .form-control, .input-group-text {
        background-color: var(--input-bg) !important;
        color: var(--input-text) !important;
        border-color: var(--border-color);
    }

    /* Dropdown items in navbar */
.navbar .dropdown-menu {
    background-color: var(--navbar-bg);
}

.navbar .dropdown-item {
    color: #ffffff !important;
}

.navbar .dropdown-item:hover {
    background-color: rgba(255, 255, 255, 0.1);
}

    /* Select2 Dark Mode Styles */
    [data-theme="dark"] .select2-container--default .select2-selection--single {
        background-color: var(--input-bg);
        border-color: var(--border-color);
    }

    [data-theme="dark"] .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: var(--input-text);
    }

    [data-theme="dark"] .select2-dropdown {
        background-color: var(--dropdown-bg);
        border-color: var(--border-color);
    }

    [data-theme="dark"] .select2-search__field {
        background-color: var(--input-bg);
        color: var(--input-text);
    }

    [data-theme="dark"] .select2-results__option {
        color: var(--text-color);
    }

    [data-theme="dark"] .select2-results__option--highlighted[aria-selected] {
        background-color: var(--primary-color);
        color: #ffffff;
    }

    /* Theme Toggle Button */
    #themeToggle {
        background: none;
        border: none;
        cursor: pointer;
    }

    #themeToggle i {
        color: white;
        font-size: 1.2rem;
    }

    /* DataTables Dark Mode */
    [data-theme="dark"] .dataTables_wrapper {
        color: var(--text-color);
    }

    [data-theme="dark"] .dataTables_wrapper .dataTables_length,
    [data-theme="dark"] .dataTables_wrapper .dataTables_filter,
    [data-theme="dark"] .dataTables_wrapper .dataTables_info,
    [data-theme="dark"] .dataTables_wrapper .dataTables_processing,
    [data-theme="dark"] .dataTables_wrapper .dataTables_paginate {
        color: var(--text-color) !important;
    }

    [data-theme="dark"] .dataTables_wrapper .dataTables_paginate .paginate_button {
        color: var(--text-color) !important;
    }

    [data-theme="dark"] table.dataTable tbody tr {
        background-color: var(--card-bg);
        color: var(--text-color);
    }

    [data-theme="dark"] table.dataTable tbody tr:hover {
        background-color: var(--dropdown-bg);
    }

    /* Table and Lyrics Dark Mode Styles */
[data-theme="dark"] {
    /* Tables */
    --table-bg: #2c3034;
    --table-border: #495057;
    --table-hover: #343a40;
}

/* General Table Styles */
[data-theme="dark"] table {
    background-color: var(--table-bg);
    color: var(--text-color);
}

[data-theme="dark"] .table {
    color: var(--text-color);
    border-color: var(--table-border);
}

[data-theme="dark"] .table th,
[data-theme="dark"] .table td {
    border-color: var(--table-border);
    background-color: var(--table-bg);
}

[data-theme="dark"] .table-hover tbody tr:hover {
    background-color: var(--table-hover);
    color: var(--text-color);
}

/* DataTables Specific */
[data-theme="dark"] .dataTables_wrapper .dataTable {
    background-color: var(--table-bg);
    color: var(--text-color);
}

[data-theme="dark"] .dataTables_wrapper .dataTables_length select,
[data-theme="dark"] .dataTables_wrapper .dataTables_filter input {
    background-color: var(--input-bg);
    color: var(--text-color);
    border-color: var(--border-color);
}

[data-theme="dark"] .dataTables_wrapper .dataTables_paginate .paginate_button {
    background-color: var(--table-bg) !important;
    color: var(--text-color) !important;
    border-color: var(--border-color) !important;
}

[data-theme="dark"] .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
    background-color: var(--primary-color) !important;
    color: #ffffff !important;
}

[data-theme="dark"] .dataTables_wrapper .dataTables_paginate .paginate_button.current {
    background-color: var(--primary-color) !important;
    color: #ffffff !important;
    border-color: var(--primary-color) !important;
}

/* Lyrics View Styles */
[data-theme="dark"] .lyrics-container,
[data-theme="dark"] .song-details {
    background-color: var(--card-bg);
    color: var(--text-color);
}

[data-theme="dark"] .lyrics-text,
[data-theme="dark"] .song-title,
[data-theme="dark"] .song-meta {
    color: var(--text-color);
}

/* Button Styles in Dark Mode */
[data-theme="dark"] .btn-primary {
    background-color: var(--primary-color);
    border-color: var(--primary-color);
}

[data-theme="dark"] .btn-secondary {
    background-color: #495057;
    border-color: #495057;
}

/* Search and Filter Elements */
[data-theme="dark"] .search-box,
[data-theme="dark"] .filter-box {
    background-color: var(--input-bg);
    color: var(--text-color);
    border-color: var(--border-color);
}

/* Modal Dark Mode */
[data-theme="dark"] .modal-content {
    background-color: var(--card-bg);
    color: var(--text-color);
}

[data-theme="dark"] .modal-header,
[data-theme="dark"] .modal-footer {
    border-color: var(--border-color);
}

/* Export Buttons */
[data-theme="dark"] .dt-buttons .dt-button {
    background-color: var(--primary-color) !important;
    color: #ffffff !important;
    border-color: var(--primary-color) !important;
}

[data-theme="dark"] .dt-buttons .dt-button:hover {
    background-color: var(--primary-color) !important;
    opacity: 0.9;
}

        /* Desktop behavior */
        @media (min-width: 992px) {
            .dropdown-submenu>.dropdown-menu {
                top: 0;
                left: 100%;
                margin-top: -6px;
                margin-left: -1px;
                display: none;
                z-index: 1000;
            }

            .dropdown-submenu:hover>.dropdown-menu {
                display: block;
            }
        }

        /* Mobile behavior */
        @media (max-width: 991px) {
            .container {
                padding-left: 25px;
            }

            .navbar-toggler {
            padding: 3px !important;
            font-size: var(--bs-navbar-toggler-font-size);
            line-height: 1;
            /* color: var(--bs-navbar-color); */
            background-color: transparent;
            border: 0px !important;
            border-radius: var(--bs-navbar-toggler-border-radius);
            transition: var(--bs-navbar-toggler-transition);
            }

            .navbar-toggler:focus,
            .navbar-toggler:active {
                outline: none !important;
                box-shadow: none !important;
                border-color: var(--bs-navbar-toggler-border-color) !important;
            }
            .dropdown-submenu>.dropdown-menu {
                left: 0;
                top: 100%;
                margin-top: 0;
                margin-left: 15px;
                border: none;
                background-color: transparent;
                display: none;
            }

            .dropdown-menu {
                border: none;
                background-color: transparent;
            }

            .dropdown-item {
                color: white !important;
                padding: 8px 15px;
                position: relative;
            }

            .dropdown-submenu .dropdown-item {
                padding-left: 25px;
            }

            /* Add arrow indicator for items with submenu */
            .has-submenu::after {
                content: '›';
                position: absolute;
                right: 10px;
                top: 50%;
                transform: translateY(-50%);
                transition: transform 0.2s;
            }

            /* Rotate arrow when submenu is open */
            .has-submenu.show::after {
                transform: translateY(-50%) rotate(90deg);
            }

            .show>.dropdown-menu {
                display: block;
            }
        }
</style>

    @yield('style')
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{ route('user.songs.index') }}">
                {{ __('Kirtanavali') }}
            </a>
            <div class="d-flex align-items-center d-lg-none">
            <button id="themeToggle" class="nav-link me-3">
                <i class="fa-solid fa-moon dark-icon"></i>
                <i class="fa-solid fa-sun light-icon d-none"></i>
            </button>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            </div>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    {{-- <li class="nav-item">
                        <a class="nav-link{{ request()->is('songs*') ? ' active' : '' }}"
                            href="{{ route('user.songs.index') }}">{{ __('Songs') }}</a>
                    </li> --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle{{ request()->is('categories*') ? ' active' : '' }}"
                            href="#" id="categoryDropdown" role="button" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            {{ __('Category') }}
                        </a>
                        @php
                            $categories = DB::table('categories')->get();
                        @endphp
                        <div class="dropdown-menu" aria-labelledby="categoryDropdown">
                            @foreach ($categories as $category)
                                <div class="dropdown-submenu">
                                    <a class="dropdown-item" href="#">
                                        {{ $category->{'category_' . app()->getLocale()} }}
                                    </a>
                                    @php
                                        $subcategories = DB::table('cate_sub_cate_rels')
                                            ->join(
                                                'sub_categories',
                                                'sub_categories.sub_category_code',
                                                '=',
                                                'cate_sub_cate_rels.sub_category_code',
                                            )
                                            ->where('cate_sub_cate_rels.category_code', $category->category_code)
                                            ->select('sub_categories.*')
                                            ->get();
                                    @endphp
                                    @if ($subcategories->count() > 0)
                                        <div class="dropdown-menu">
                                            @foreach ($subcategories as $subcategory)
                                                <a class="dropdown-item"
                                                    href="{{ route('user.categories.show', $subcategory->sub_category_code) }}">
                                                    {{ $subcategory->{'sub_category_' . app()->getLocale()} }}
                                                </a>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </li>
                    
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link{{ request()->is('contact*') ? ' active' : '' }}"
                            href="{{ route('user.contact.create') }}">{{ __('Contact') }}</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="languageDropdown" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ app()->getLocale() === 'gu' ? __('Gujarati') : __('English') }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="languageDropdown">
                            <a class="dropdown-item" href="{{ route('locale', 'en') }}">{{ __('English') }}</a>
                            <a class="dropdown-item" href="{{ route('locale', 'gu') }}">{{ __('Gujarati') }}</a>
                        </div>
                    </li>
                    <li class="nav-item d-none d-lg-block">
                        <button id="themeToggle" class="nav-link">
                            <i class="fa-solid fa-moon dark-icon"></i>
                            <i class="fa-solid fa-sun light-icon d-none"></i>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- Load jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Load Bootstrap and other scripts -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <!-- Load Toastr -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        // Toastr Notifications
        $(document).ready(function() {
            @if (session('success'))
                toastr.success("{{ session('success') }}", "Success", {
                    positionClass: "toast-top-right",
                    timeOut: 5000
                });
            @endif
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    toastr.error("{{ $error }}", "Error", {
                        positionClass: "toast-top-right",
                        timeOut: 5000
                    });
                @endforeach
            @endif
        });
    </script>
    <script>
        $(document).ready(function() {
            // Check if we're on mobile
            function isMobile() {
                return window.innerWidth < 992;
            }

            // Add arrow indicator to items with submenu
            $('.dropdown-submenu > .dropdown-item').addClass('has-submenu');

            // Handle mobile clicks
            if (isMobile()) {
                $('.dropdown-submenu > .dropdown-item').click(function(e) {
                    e.preventDefault();
                    e.stopPropagation();

                    // Toggle the clicked submenu
                    $(this).next('.dropdown-menu').slideToggle();
                    $(this).toggleClass('show');

                    // Close other open submenus
                    $('.dropdown-submenu > .dropdown-item').not(this).next('.dropdown-menu').slideUp();
                    $('.dropdown-submenu > .dropdown-item').not(this).removeClass('show');
                });
            }

            // Handle window resize
            $(window).resize(function() {
                if (!isMobile()) {
                    // Reset mobile-specific styles when returning to desktop
                    $('.dropdown-menu').removeAttr('style');
                    $('.has-submenu').removeClass('show');
                }
            });
        });
    </script>
    <script>
    // Check for saved theme preference
    document.addEventListener('DOMContentLoaded', function() {
    const themeToggles = document.querySelectorAll('#themeToggle, #themeToggleLg');
    
    // Check for saved theme
    const savedTheme = localStorage.getItem('theme') || 'light';
    document.documentElement.setAttribute('data-theme', savedTheme);
    updateIcons(savedTheme);

    // Theme toggle handler
    themeToggles.forEach(toggle => {
        toggle.addEventListener('click', function() {
            const currentTheme = document.documentElement.getAttribute('data-theme');
            const newTheme = currentTheme === 'light' ? 'dark' : 'light';
            
            document.documentElement.setAttribute('data-theme', newTheme);
            localStorage.setItem('theme', newTheme);
            updateIcons(newTheme);
        });
    });

    function updateIcons(theme) {
        themeToggles.forEach(toggle => {
            const darkIcon = toggle.querySelector('.dark-icon');
            const lightIcon = toggle.querySelector('.light-icon');
            
            if (theme === 'dark') {
                darkIcon.classList.add('d-none');
                lightIcon.classList.remove('d-none');
            } else {
                darkIcon.classList.remove('d-none');
                lightIcon.classList.add('d-none');
            }
        });
    }
});
</script>


    @yield('script')
</body>

</html>
