<!-- Start Navbar -->
<nav id="topnav" class="defaultscroll is-sticky">
    <div class="container">

        <!-- Logo container-->
        <a class="logo pl-0" href="{{ route('home.index') }}">
            <img src="{{ Storage::url((new \App\Settings\GeneralSettings())->site_logo) }}" class="mt-2 w-50" alt="">
            <img src="{{ Storage::url((new \App\Settings\GeneralSettings())->site_logo) }}" class="hidden dark:inline-block w-50" alt="">
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
            <li class="inline mb-0">
                @if (auth()->guard('personnel')->check())
                    <a href="{{ route('auth.dashboard') }}" class="btn btn-icon rounded-full bg-indigo-600/5 hover:bg-indigo-600 border-indigo-600/10 hover:border-indigo-600 text-indigo-600 hover:text-white">
                        <x-feathericon-grid class="h-4 w-4"/>
                    </a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-icon rounded-full bg-indigo-600/5 hover:bg-indigo-600 border-indigo-600/10 hover:border-indigo-600 text-indigo-600 hover:text-white">
                        <x-feathericon-user class="h-4 w-4"/>
                    </a>
                @endif
            </li>
        </ul>
        <!--Login button End-->

        <div id="navigation">
            <ul class="navigation-menu">
                <li><a href="{{ route('home.index') }}" class="sub-menu-item">หน้าแรก</a></li>
                <li><a href="{{ route('academic.index') }}" class="sub-menu-item">ผลงานทางวิชาการ</a></li>
                <li><a href="{{ route('album.index') }}" class="sub-menu-item">อัลบั้มรูปภาพ</a></li>
                <li><a href="{{ route('contact.index') }}" class="sub-menu-item">ติดต่อ</a></li>
            </ul>
        </div>

    </div>
</nav>

