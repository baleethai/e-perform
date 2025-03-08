<div class="lg:w-1/4 md:w-1/3 md:px-3">
    <div class="relative md:-mt-48 -mt-32">
        <div class="p-6 rounded-md shadow dark:shadow-gray-800 bg-white dark:bg-slate-900">
            <div class="profile-pic text-center mb-5">
                <div>

                    <div class="relative h-28 w-28 mx-auto">
                        @if (auth()->guard('personnel')->user()->getMedia('personnel-images')->first())
                        <img src="{{ auth()->guard('personnel')->user()->getMedia('personnel-images')->first()->getUrl() }}" class="rounded-full shadow dark:shadow-gray-800 ring-4 ring-slate-50 dark:ring-slate-800" alt="">
                        @endif
                    </div>

                    <div class="mt-4">
                        <h5 class="text-lg font-semibold">{{ auth()->guard('personnel')->user()->full_name }}</h5>
                        <p class="text-slate-400">{{ auth()->guard('personnel')->user()->email }}</p>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-100 dark:border-gray-700">

                    <ul class="list-none sidebar-nav mb-0 mt-3">

                        <li class="navbar-item account-menu">
                            <a href="{{ route('auth.profile') }}" class="navbar-link text-slate-400 flex items-center py-2 rounded">
                                <x-feathericon-grid class="h-4 w-4 mr-2 text-[18px] mb-0"/>
                                <h6 class="mb-0">โปรไฟล์</h6>
                            </a>
                        </li>

                        <li class="navbar-item account-menu {{ in_array(Route::currentRouteName(), ['auth.portfolio.index', 'auth.portfolio.edit', 'auth.portfolio.create']) ? 'active' : '' }}">
                            <a href="{{ route('auth.portfolio.index') }}" class="navbar-link text-slate-400 flex items-center py-2 rounded">
                                <x-feathericon-user class="h-4 w-4 mr-2 text-[18px] mb-0"/>
                                <h6 class="mb-0">จัดการภาระงานบุคลากร</h6>
                            </a>
                        </li>

                        <li class="navbar-item account-menu {{ in_array(Route::currentRouteName(), ['auth.academic.index', 'auth.academic.edit', 'auth.academic.create']) ? 'active' : '' }}">
                            <a href="{{ route('auth.academic.index') }}" class="navbar-link text-slate-400 flex items-center py-2 rounded">
                                <span class="mr-2 text-[18px] mb-0"><i class="uil uil-diary-alt"></i></span>
                                <h6 class="mb-0">จัดการงานวิชาการ</h6>
                            </a>
                        </li>

                        <li class="navbar-item account-menu {{ in_array(Route::currentRouteName(), ['auth.document.index', 'auth.document.create']) ? 'active' : '' }}">
                            <a href="{{ route('auth.document.index') }}" class="navbar-link text-slate-400 flex items-center py-2 rounded">
                                <span class="mr-2 text-[18px] mb-0"><i class="uil uil-diary-alt"></i></span>
                                <h6 class="mb-0">เอกสาร</h6>
                            </a>
                        </li>

{{--                        <li class="navbar-item account-menu {{ in_array(Route::currentRouteName(), ['auth.academic.index', 'auth.academic.edit', 'auth.academic.create']) ? 'active' : '' }}">--}}
{{--                            <a href="{{ route('auth.academic.index') }}" class="navbar-link text-slate-400 flex items-center py-2 rounded">--}}
{{--                                <span class="mr-2 text-[18px] mb-0"><i class="uil uil-diary-alt"></i></span>--}}
{{--                                <h6 class="mb-0">อัลบัมรูปภาพ</h6>--}}
{{--                            </a>--}}
{{--                        </li>--}}

                        <li class="navbar-item account-menu">
                            <a href="{{ route('logout') }}" class="navbar-link text-slate-400 flex items-center py-2 rounded">
                                <span class="mr-2 text-[18px] mb-0"><i class="uil uil-sign-alt"></i></span>
                                ออกจากระบบ
                            </a>
                        </li>

                    </ul>
                </div>
        </div>
    </div>
</div>
