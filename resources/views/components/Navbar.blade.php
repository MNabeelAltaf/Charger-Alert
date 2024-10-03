<nav id="topnav" class="defaultscroll is-sticky">
    <div class="container">
        <!-- Logo container-->
        <a class="logo ps-0" href="index.html">
            <img src="{{ asset('assets/images/logo-dark.png') }}" class="inline-block sm:hidden" alt="">
            <div class="sm:block hidden">
                <span class="inline-block dark:hidden">
                    <img src="{{ asset('assets/images/logo-dark.png') }}" class="l-dark h-7" alt="">
                    <img src="{{ asset('assets/images/logo-dark.png') }}" class="l-light h-7" alt="">
                </span>
                <img src="{{ asset('assets/images/logo-dark.png') }}" height="24" class="hidden dark:inline-block"
                    alt="">
            </div>
        </a>

        <!-- End Logo container-->
        <div class="menu-extras">
            <div class="menu-item">
                <!-- Mobile menu toggle-->
                <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
                <!-- End mobile menu toggle-->
            </div>
        </div>

        <!--Login button Start-->
        <ul class="buy-button list-none mb-0">

            <li class="dropdown inline-block relative ps-1">
                <button data-dropdown-toggle="dropdown"
                    class="dropdown-toggle btn btn-icon rounded-full bg-violet-600 hover:bg-violet-700 border-violet-600 hover:border-violet-700 text-white inline-flex"
                    type="button">
                    <img src="{{ asset('assets/images/client/05.jpg') }}" class="rounded-full" alt="">
                </button>
                <!-- Dropdown menu -->
                <div class="dropdown-menu absolute end-0 m-0 mt-4 z-10 w-48 rounded-md overflow-hidden bg-white dark:bg-slate-900 shadow dark:shadow-gray-800 hidden"
                    onclick="event.stopPropagation();">
                    <div class="relative">
                        <div class="py-8 bg-gradient-to-tr from-violet-600 to-red-600"></div>
                        <div class="absolute px-4 -bottom-7 start-0">

                        </div>
                    </div>



                    <ul class="py-2 text-start">
                        <li>
                            <a href="creator-profile.html"
                                class="block text-[14px] font-semibold py-1.5 px-4 hover:text-violet-600"><i
                                    class="uil uil-user text-[16px] align-middle me-1"></i> Profile</a>
                        </li>
                        {{-- <li>
                            <a href="creator-profile-edit.html" class="block text-[14px] font-semibold py-1.5 px-4 hover:text-violet-600"><i class="uil uil-setting text-[16px] align-middle me-1"></i> Settings</a>
                        </li> --}}
                        <li class="border-t border-gray-100 dark:border-gray-800 my-2"></li>
                        <li>

                            <a href="{{ route('logout') }}"
                                class="block text-[14px] font-semibold py-1.5 px-4 hover:text-violet-600"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="uil uil-sign-out-alt text-[16px] align-middle me-1"></i> Logout
                            </a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </ul>
                </div>
            </li>
        </ul>
        <!--Login button End-->

        <div id="navigation">
            <!-- Navigation Menu-->
            <ul class="navigation-menu nav-light justify-end">
                <li class="has-submenu parent-menu-item">
                    <a href="{{ route('dashboard') }}">Home</a>

                </li>

                <li class="has-submenu parent-parent-menu-item">
                    <a href="{{ route('category_view') }}">Category</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
