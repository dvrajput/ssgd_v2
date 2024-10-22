<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ route('user.songs.index') }}">
        {{ __('Kirtanavali') }}
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link{{ request()->is('songs*') ? ' active' : '' }}"
                    href="{{ route('user.songs.index') }}">{{ __('Songs') }}</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle{{ request()->is('categories*') ? ' active' : '' }}" href="#"
                    id="categoryDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    {{ __('Category') }}
                </a>
                @php
                    $categories = DB::table('categories')->get();
                @endphp
                <div class="dropdown-menu" aria-labelledby="categoryDropdown">
                    @foreach ($categories as $category)
                        <div class="dropdown-submenu">
                            <a class="dropdown-item"
                                href="{{ route('user.categories.show', $category->category_code) }}">
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
        <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="languageDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ app()->getLocale() === 'gu' ? __('Gujarati') : __('English') }}
                </a>
                <div class="dropdown-menu" aria-labelledby="languageDropdown">
                    <a class="dropdown-item" href="{{ route('locale', 'en') }}">{{ __('English') }}</a>
                    <a class="dropdown-item" href="{{ route('locale', 'gu') }}">{{ __('Gujarati') }}</a>
                </div>
            </li>
        </ul>
    </div>
</nav>

@section('style')
    <style>
        .dropdown-menu {
            border-radius: 0;
            /* Remove border-radius for a sharper look */
            opacity: 0;
            /* Start hidden */
            transition: opacity 0.3s ease;
            /* Fade in animation */
            visibility: hidden;
            /* Prevent clicks when hidden */
        }

        .dropdown-submenu {
            position: relative;
        }

        .dropdown-submenu:hover .dropdown-menu {
            opacity: 1;
            /* Fade in */
            visibility: visible;
            /* Make visible for clicks */
        }

        .dropdown-menu.show {
            opacity: 1;
            /* Show menu */
            visibility: visible;
            /* Make visible for clicks */
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .dropdown-menu {
                position: static;
                /* Make dropdowns full width on mobile */
            }

            .dropdown-menu .dropdown-item {
                width: 100%;
                /* Full width items */
            }
        }
    </style>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            // Handle click event to toggle the dropdown
            $('#categoryDropdown').on('click', function(e) {
                e.preventDefault();
                $(this).next('.dropdown-menu').toggleClass('show');
            });

            // Close the dropdown if clicked outside
            $(document).on('click', function(e) {
                if (!$(e.target).closest('#categoryDropdown').length) {
                    $('.dropdown-menu').removeClass('show');
                }
            });
        });
    </script>
@endsection
