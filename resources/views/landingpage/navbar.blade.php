<nav id="topnav" class="defaultscroll is-sticky">
    <div class="container">
        <!-- Logo container-->
        <a class="logo ps-0" href="{{ route('homepage') }}">
            <img src="{{ asset('assets/images/icon.png') }}" class="inline-block sm:hidden" alt="">
            <div class="sm:block hidden">
                <img src="{{ asset('assets/images/icon.png') }}" class="inline-block dark:hidden h-7"
                    alt="">
                <img src="{{ asset('assets/images/icon.png') }}" class="hidden dark:inline-block h-7"
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

            <li class="inline-block ps-1  mb-0 ">
                <a   href="#download_btn"
                    class="p-3 inline-block rounded-full bg-violet-600 hover:bg-violet-700 border-violet-600 hover:border-violet-700 text-white text-center px-6 py-3">
                    Download App
                </a>
            </li>



        </ul>
        <!--Login button End-->

        <div id="navigation">
            <!-- Navigation Menu-->
            <ul class="navigation-menu justify-end">
                <li class="has-submenu parent-menu-item">
                    <a href="{{ route('homepage') }}">Home</a>
                </li>

                <li class="has-submenu parent-parent-menu-item">
                    <a href="#categories">Explore</a>
                </li>
            </ul><!--end navigation menu-->
        </div><!--end navigation-->
    </div><!--end container-->
</nav>
