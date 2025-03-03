@php use App\Settings\GeneralSettings; @endphp
<header id="header" class="header-size-sm" data-sticky-shrink="false">
    <div class="container">
        <div class="header-row">
            <div id="logo" class="ms-auto ms-lg-0 me-lg-auto py-4">
                <a href="{{ route('home.index') }}">
                    <img class="logo-default"
                         srcset="{{ Storage::url((new GeneralSettings())->site_logo) }} 2x"
                         src="{{ Storage::url((new GeneralSettings())->site_logo) }}"
                         alt="{{ env('APP_NAME') }}"
                    >
                </a>
            </div>

            <div class="header-misc d-none d-lg-flex">

                <ul class="header-extras">
                    <li>
                        <i class="i-plain bi-telephone m-0"></i>
                        <div class="he-text">
                            โทรติดต่อ
                            <span>{{ (new GeneralSettings())->phone }}</span>
                        </div>
                    </li>
                    <li>
                        <i class="i-plain bi-envelope m-0"></i>
                        <div class="he-text">
                            อีเมล
                            <span>{{ (new GeneralSettings())->email }}</span>
                        </div>
                    </li>
                    <li>
                        <i class="i-plain bi-clock m-0"></i>
                        <div class="he-text">
                            เปิดทำการ
                            <span>{{ (new GeneralSettings())->opening_hours }}</span>
                        </div>
                    </li>
                </ul>

            </div>

        </div>
    </div>

    <div id="header-wrap">
        <div class="container">
            <div class="header-row justify-content-between flex-row-reverse flex-lg-row justify-content-lg-center">

                <div class="primary-menu-trigger">
                    <button class="cnvs-hamburger" type="button" title="Open Mobile Menu">
                        <span class="cnvs-hamburger-box"><span class="cnvs-hamburger-inner"></span></span>
                    </button>
                </div>

                <!-- Primary Navigation
                ============================================= -->
                <nav class="primary-menu with-arrows">
                    <ul class="menu-container">
                        <li class="menu-item @if (Route::currentRouteName() == 'home.index') current @endif">
                            <a class="menu-link" href="{{ route('home.index') }}"><div>หน้าแรก</div></a>
                        </li>
                        <li class="menu-item @if (Route::currentRouteName() == 'academic.index') current @endif">
                            <a class="menu-link" href="{{ route('academic.index') }}"><div>ผลงานวิชาการ</div></a>
                        </li>
                        <li class="menu-item @if (Route::currentRouteName() == 'contact.index') current @endif">
                            <a class="menu-link" href="https://rbr.mcu.ac.th/" target="_blank"><div>ติดต่อเรา</div></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <div class="header-wrap-clone"></div>
</header>
