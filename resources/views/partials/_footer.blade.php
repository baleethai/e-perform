<!-- Footer Start -->
<footer class="footer bg-dark-footer relative text-gray-200 dark:text-gray-200">
    <div class="container">
        <div class="grid grid-cols-12">
            <div class="col-span-12">
                <div class="py-[60px] px-0">
                    <div class="grid md:grid-cols-12 grid-cols-1 gap-[30px]">
                        <div class="lg:col-span-4 md:col-span-12">
                            <a href="#" class="text-[22px] focus:outline-none">
                                <img src="{{ Storage::url((new \App\Settings\GeneralSettings())->site_logo) }}" style="width: 300px;" alt="">
                            </a>
                            <p class="mt-6 text-gray-300">
                                {{ (new \App\Settings\GeneralSettings())->address }}
                            </p>
                            <ul class="list-none mt-6">

                                @if ((new \App\Settings\GeneralSettings())->facebook)
                                <li class="inline"><a href=" {{ (new \App\Settings\GeneralSettings())->facebook }}" target="_blank" class="btn btn-icon btn-sm border border-gray-800 rounded-md hover:border-indigo-600 dark:hover:border-indigo-600 hover:bg-indigo-600 dark:hover:bg-indigo-600"><i class="uil uil-facebook-f align-middle" title="facebook"></i></a></li>
                                @endif

                                @if ((new \App\Settings\GeneralSettings())->instagram)
                                <li class="inline"><a href="{{ (new \App\Settings\GeneralSettings())->instagram }}" target="_blank" class="btn btn-icon btn-sm border border-gray-800 rounded-md hover:border-indigo-600 dark:hover:border-indigo-600 hover:bg-indigo-600 dark:hover:bg-indigo-600"><i class="uil uil-instagram align-middle" title="instagram"></i></a></li>
                                @endif

                                @if ((new \App\Settings\GeneralSettings())->twitter)
                                    <li class="inline"><a href="{{ (new \App\Settings\GeneralSettings())->twitter }}" target="_blank" class="btn btn-icon btn-sm border border-gray-800 rounded-md hover:border-indigo-600 dark:hover:border-indigo-600 hover:bg-indigo-600 dark:hover:bg-indigo-600"><i class="uil uil-twitter align-middle" title="twitter"></i></a></li>
                                @endif

                                @if ((new \App\Settings\GeneralSettings())->email)
                                <li class="inline"><a href="mailto:{{ (new \App\Settings\GeneralSettings())->email }}" class="btn btn-icon btn-sm border border-gray-800 rounded-md hover:border-indigo-600 dark:hover:border-indigo-600 hover:bg-indigo-600 dark:hover:bg-indigo-600"><i class="uil uil-envelope align-middle" title="email"></i></a></li>
                                @endif

                            </ul><!--end icon-->
                        </div><!--end col-->

                        <div class="lg:col-span-3 md:col-span-4">
                            <h5 class="tracking-[1px] text-gray-100 font-semibold">เกี่ยวกับระบบ</h5>
                            <ul class="list-none footer-list mt-6">
                                <li>
                                    <a href="{{ route('login') }}" class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out">
                                        <i class="uil uil-angle-right-b me-1"></i> เข้าสู่ระบบ
                                    </a>
                                </li>
                                <li class="mt-[10px]">
                                    <a href="{{ route('forgot-password') }}" class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out">
                                        <i class="uil uil-angle-right-b me-1"></i> ลืมรหัสผ่าน
                                    </a>
                                </li>
                                <li class="mt-[10px]">
                                    <a href="{{ route('auth.profile') }}" class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i class="uil uil-angle-right-b me-1"></i> โปรไฟล์</a>
                                </li>
                                <li class="mt-[10px]">
                                    <a href="{{ route('auth.portfolio.index') }}" class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out">
                                        <i class="uil uil-angle-right-b me-1"></i> จัดการภาระงานบุคลากร</a>
                                </li>
                                <li class="mt-[10px]">
                                    <a href="#" class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out">
                                        <i class="uil uil-angle-right-b me-1"></i> จัดการงานวิชาการ
                                    </a>
                                </li>
                            </ul>
                        </div><!--end col-->


                    </div><!--end grid-->
                </div><!--end col-->
            </div>
        </div><!--end grid-->
    </div><!--end container-->

    <div class="py-[30px] px-0 border-t border-slate-800">
        <div class="container text-center">
            <div class="grid md:grid-cols-2 items-center">
                <div class="md:text-left text-center">
                    <p class="mb-0">© <script>document.write(new Date().getFullYear())</script> มหาวิทยาลัยมหาจุฬาลงกรณราชวิทยาลัย วิทยาลัยสงฆ์ราชบุรี</p>
                </div>

{{--                <ul class="list-none md:text-right text-center mt-6 md:mt-0">--}}
{{--                    <li class="inline"><a href=""><img src="{{ asset('assets/images/payments/american-ex.png') }}" class="max-h-6 inline" title="American Express" alt=""></a></li>--}}
{{--                    <li class="inline"><a href=""><img src="{{ asset('assets/images/payments/discover.png') }}" class="max-h-6 inline" title="Discover" alt=""></a></li>--}}
{{--                    <li class="inline"><a href=""><img src="{{ asset('assets/images/payments/master-card.png') }}" class="max-h-6 inline" title="Master Card" alt=""></a></li>--}}
{{--                    <li class="inline"><a href=""><img src="{{ asset('assets/images/payments/paypal.png') }}" class="max-h-6 inline" title="Paypal" alt=""></a></li>--}}
{{--                    <li class="inline"><a href=""><img src="{{ asset('assets/images/payments/visa.png') }}" class="max-h-6 inline" title="Visa" alt=""></a></li>--}}
{{--                </ul>--}}
            </div><!--end grid-->
        </div><!--end container-->
    </div>
</footer><!--end footer-->
<!-- Footer End -->

<!-- Start Cookie Popup -->
{{--<div class="cookie-popup fixed max-w-lg bottom-3 right-3 left-3 sm:left-0 sm:right-0 mx-auto bg-white dark:bg-slate-900 shadow dark:shadow-gray-800 rounded-md py-5 px-6 z-50">--}}
{{--    <p class="text-slate-400">This website uses cookies to provide you with a great user experience. By using it, you accept our <a href="https://shreethemes.in" target="_blank" class="text-emerald-600 dark:text-emerald-500 font-semibold">use of cookies</a></p>--}}
{{--    <div class="cookie-popup-actions text-right">--}}
{{--        <button class="absolute border-none bg-none p-0 cursor-pointer font-semibold top-2 right-2"><i class="uil uil-times text-dark dark:text-slate-200 text-2xl"></i></button>--}}
{{--    </div>--}}
{{--</div>--}}
<!--Note: Cookies Js including in plugins.init.js (path like; assets/js/plugins.init.js) and Cookies css including in _helper.scss (path like; scss/_helper.scss)-->
<!-- End Cookie Popup -->

{{--<!-- Back to top -->--}}
{{--<a href="#" onclick="topFunction()" id="back-to-top" class="back-to-top fixed hidden text-lg rounded-full z-10 bottom-5 right-5 h-9 w-9 text-center bg-indigo-600 text-white leading-9"><i class="uil uil-arrow-up"></i></a>--}}
{{--<!-- Back to top -->--}}
