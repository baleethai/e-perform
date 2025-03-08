<section class="relative lg:pb-24 pb-16">

    @include('livewire.auth.partials.pro-banner')

    <div class="container lg:mt-24 mt-16">
        <div class="md:flex">

            @include('livewire.auth.partials.navbar-menu')

            <div class="lg:w-3/4 md:w-2/3 md:px-3 mt-[30px] md:mt-0">
                <div class="pb-6 border-b border-gray-100 dark:border-gray-700">
                    <h5 class="text-xl font-semibold">{{ auth()->guard('personnel')->user()->full_name }}</h5>

                    <p class="text-slate-400 mt-3">{{ auth()->guard('personnel')->user()->bio }}</p>
                </div>

                <div class="grid lg:grid-cols-1 grid-cols-1 gap-[30px] pt-6">
                    <div>
                        <h5 class="text-xl font-semibold">ข้อมูลส่วนตัว :</h5>
                        <div class="mt-6 grid lg:grid-cols-2 grid-cols-2">
                            <div class="flex items-center">
                                <i data-feather="mail" class="fea icon-ex-md text-slate-400 mr-3"></i>
                                <div class="flex-1">
                                    <h6 class="text-indigo-600 dark:text-white font-medium mb-0">อีเมล :</h6>
                                    <a href="#" class="text-slate-400">{{ auth()->guard('personnel')->user()->email }}</a>
                                </div>
                            </div>
                            <div class="flex items-center mt-3">
                                <i data-feather="bookmark" class="fea icon-ex-md text-slate-400 mr-3"></i>
                                <div class="flex-1">
                                    <h6 class="text-indigo-600 dark:text-white font-medium mb-0">รหัสบุคคลากร :</h6>
                                    <a href="#" class="text-slate-400">{{ auth()->guard('personnel')->user()->code }}</a>
                                </div>
                            </div>
                            <div class="flex items-center mt-3">
                                <i data-feather="italic" class="fea icon-ex-md text-slate-400 mr-3"></i>
                                <div class="flex-1">
                                    <h6 class="text-indigo-600 dark:text-white font-medium mb-0">เลขที่บัตรประชาชน :</h6>
                                    <a href="#" class="text-slate-400">{{ auth()->guard('personnel')->user()->id_card }}</a>
                                </div>
                            </div>
                            <div class="flex items-center mt-3">
                                <i data-feather="globe" class="fea icon-ex-md text-slate-400 mr-3"></i>
                                <div class="flex-1">
                                    <h6 class="text-indigo-600 dark:text-white font-medium mb-0">วัน/เดือน/ปีเกิด :</h6>
                                    <a href="#" class="text-slate-400">{{ auth()->guard('personnel')->user()->birthdate }}</a>
                                </div>
                            </div>
                            <div class="flex items-center mt-3">
                                <i data-feather="gift" class="fea icon-ex-md text-slate-400 mr-3"></i>
                                <div class="flex-1">
                                    <h6 class="text-indigo-600 dark:text-white font-medium mb-0">วันที่เริ่มปฏิบัติงาน :</h6>
                                    <a href="#" class="text-slate-400">{{ auth()->guard('personnel')->user()->work_start_date }}</a>
                                </div>
                            </div>
                            <div class="flex items-center mt-3">
                                <i data-feather="map-pin" class="fea icon-ex-md text-slate-400 mr-3"></i>
                                <div class="flex-1">
                                    <h6 class="text-indigo-600 dark:text-white font-medium mb-0">ที่อยู่ :</h6>
                                    <a href="#" class="text-slate-400">{{ auth()->guard('personnel')->user()->address }}</a>
                                </div>
                            </div>
                            <div class="flex items-center mt-3">
                                <i data-feather="phone" class="fea icon-ex-md text-slate-400 mr-3"></i>
                                <div class="flex-1">
                                    <h6 class="text-indigo-600 dark:text-white font-medium mb-0">เบอร์โทรศัพท์ :</h6>
                                    <a href="#" class="text-slate-400">{{ auth()->guard('personnel')->user()->phone }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

{{--                <h5 class="text-xl font-semibold mt-[30px]">ผลงานวิชาการ :</h5>--}}
{{--                <div class="grid lg:grid-cols-3 md:grid-cols-2 mt-6 gap-[30px]">--}}
{{--                    <div class="group relative block overflow-hidden rounded-md transition-all duration-500">--}}
{{--                        <img src="{{ asset('assets/images/portfolio/1.jpg') }}" class="group-hover:origin-center group-hover:scale-110 group-hover:rotate-3 transition duration-500" alt="">--}}
{{--                        <div class="absolute inset-2 group-hover:bg-white/90 dark:group-hover:bg-slate-900/90 transition duration-500 z-0 rounded-md"></div>--}}

{{--                        <div class="content transition-all duration-500">--}}
{{--                            <div class="icon absolute z-10 hidden group-hover:block top-6 right-6 transition-all duration-500">--}}
{{--                                <a href="{{ asset('assets/images/portfolio/1.jpg') }}" class="btn bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white btn-icon rounded-full lightbox"><i class="uil uil-camera"></i></a>--}}
{{--                            </div>--}}

{{--                            <div class="title absolute z-10 hidden group-hover:block bottom-6 left-6">--}}
{{--                                <a href="{{ asset('portfolio-detail-three.html') }}" class="h6 text-lg font-medium hover:text-indigo-600 duration-500 ease-in-out">Mockup Collection</a>--}}
{{--                                <p class="text-slate-400 mb-0">Abstract</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="group relative block overflow-hidden rounded-md transition-all duration-500">--}}
{{--                        <img src="{{ asset('assets/images/portfolio/2.jpg') }}" class="group-hover:origin-center group-hover:scale-110 group-hover:rotate-3 transition duration-500" alt="">--}}
{{--                        <div class="absolute inset-2 group-hover:bg-white/90 dark:group-hover:bg-slate-900/90 transition duration-500 z-0 rounded-md"></div>--}}
{{--                        <div class="content transition-all duration-500">--}}
{{--                            <div class="icon absolute z-10 hidden group-hover:block top-6 right-6 transition-all duration-500">--}}
{{--                                <a href="{{ asset('assets/images/portfolio/2.jpg') }}" class="btn bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white btn-icon rounded-full lightbox"><i class="uil uil-camera"></i></a>--}}
{{--                            </div>--}}

{{--                            <div class="absolute z-10 hidden group-hover:block bottom-6 left-6 transition-all duration-500">--}}
{{--                                <a href="portfolio-detail-three.html" class="h6 text-lg font-medium hover:text-indigo-600 duration-500 ease-in-out">Mockup Collection</a>--}}
{{--                                <p class="text-slate-400 mb-0">Abstract</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="group relative block overflow-hidden rounded-md transition-all duration-500">--}}
{{--                        <img src="assets/images/portfolio/3.jpg" class="group-hover:origin-center group-hover:scale-110 group-hover:rotate-3 transition duration-500" alt="">--}}
{{--                        <div class="absolute inset-2 group-hover:bg-white/90 dark:group-hover:bg-slate-900/90 transition duration-500 z-0 rounded-md"></div>--}}

{{--                        <div class="content transition-all duration-500">--}}
{{--                            <div class="icon absolute z-10 hidden group-hover:block top-6 right-6 transition-all duration-500">--}}
{{--                                <a href="assets/images/portfolio/3.jpg" class="btn bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white btn-icon rounded-full lightbox"><i class="uil uil-camera"></i></a>--}}
{{--                            </div>--}}

{{--                            <div class="absolute z-10 hidden group-hover:block bottom-6 left-6 transition-all duration-500">--}}
{{--                                <a href="portfolio-detail-three.html" class="h6 text-lg font-medium hover:text-indigo-600 duration-500 ease-in-out">Mockup Collection</a>--}}
{{--                                <p class="text-slate-400 mb-0">Abstract</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="group relative block overflow-hidden rounded-md transition-all duration-500">--}}
{{--                        <img src="assets/images/portfolio/4.jpg" class="group-hover:origin-center group-hover:scale-110 group-hover:rotate-3 transition duration-500" alt="">--}}
{{--                        <div class="absolute inset-2 group-hover:bg-white/90 dark:group-hover:bg-slate-900/90 transition duration-500 z-0 rounded-md"></div>--}}

{{--                        <div class="content transition-all duration-500">--}}
{{--                            <div class="icon absolute z-10 hidden group-hover:block top-6 right-6 transition-all duration-500">--}}
{{--                                <a href="assets/images/portfolio/4.jpg" class="btn bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white btn-icon rounded-full lightbox"><i class="uil uil-camera"></i></a>--}}
{{--                            </div>--}}

{{--                            <div class="absolute z-10 hidden group-hover:block bottom-6 left-6 transition-all duration-500">--}}
{{--                                <a href="portfolio-detail-three.html" class="h6 text-lg font-medium hover:text-indigo-600 duration-500 ease-in-out">Mockup Collection</a>--}}
{{--                                <p class="text-slate-400 mb-0">Abstract</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="group relative block overflow-hidden rounded-md transition-all duration-500">--}}
{{--                        <img src="assets/images/portfolio/5.jpg" class="group-hover:origin-center group-hover:scale-110 group-hover:rotate-3 transition duration-500" alt="">--}}
{{--                        <div class="absolute inset-2 group-hover:bg-white/90 dark:group-hover:bg-slate-900/90 transition duration-500 z-0 rounded-md"></div>--}}

{{--                        <div class="content transition-all duration-500">--}}
{{--                            <div class="icon absolute z-10 hidden group-hover:block top-6 right-6 transition-all duration-500">--}}
{{--                                <a href="assets/images/portfolio/5.jpg" class="btn bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white btn-icon rounded-full lightbox"><i class="uil uil-camera"></i></a>--}}
{{--                            </div>--}}

{{--                            <div class="absolute z-10 hidden group-hover:block bottom-6 left-6 transition-all duration-500">--}}
{{--                                <a href="portfolio-detail-three.html" class="h6 text-lg font-medium hover:text-indigo-600 duration-500 ease-in-out">Mockup Collection</a>--}}
{{--                                <p class="text-slate-400 mb-0">Abstract</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="group relative block overflow-hidden rounded-md transition-all duration-500">--}}
{{--                        <img src="assets/images/portfolio/6.jpg" class="group-hover:origin-center group-hover:scale-110 group-hover:rotate-3 transition duration-500" alt="">--}}
{{--                        <div class="absolute inset-2 group-hover:bg-white/90 dark:group-hover:bg-slate-900/90 transition duration-500 z-0 rounded-md"></div>--}}

{{--                        <div class="content transition-all duration-500">--}}
{{--                            <div class="icon absolute z-10 hidden group-hover:block top-6 right-6 transition-all duration-500">--}}
{{--                                <a href="assets/images/portfolio/6.jpg" class="btn bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white btn-icon rounded-full lightbox"><i class="uil uil-camera"></i></a>--}}
{{--                            </div>--}}

{{--                            <div class="absolute z-10 hidden group-hover:block bottom-6 left-6 transition-all duration-500">--}}
{{--                                <a href="portfolio-detail-three.html" class="h6 text-lg font-medium hover:text-indigo-600 duration-500 ease-in-out">Mockup Collection</a>--}}
{{--                                <p class="text-slate-400 mb-0">Abstract</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    --}}
{{--                </div>--}}
{{--                --}}
{{--                --}}
            </div>
        </div><!--end grid-->
    </div><!--end container-->
</section><!--end section-->
<!-- End Hero -->
