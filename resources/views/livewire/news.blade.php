<!-- Start Hero -->
<section class="relative table w-full py-32 lg:py-36 bg-[url('../../assets/images/blog/bg.jpg')] bg-center bg-no-repeat">
    <div class="absolute inset-0 bg-black opacity-80"></div>
    <div class="container">
        <div class="grid grid-cols-1 pb-8 text-center mt-10">
            <h3 class="md:text-4xl text-3xl md:leading-normal leading-normal font-medium text-white">ข่าวประชาสัมพันธ์</h3>
        </div><!--end grid-->
    </div><!--end container-->

    <div class="absolute text-center z-10 bottom-5 right-0 left-0 mx-3">
        <ul class="breadcrumb tracking-[0.5px] breadcrumb-light mb-0 inline-block">
           <li class="inline breadcrumb-item uppercase text-[13px] font-bold duration-500 ease-in-out text-white/50 hover:text-white">
               <a href="{{ route('home.index') }}">หน้าแรก</a>
           </li>
           <li class="inline breadcrumb-item uppercase text-[13px] font-bold duration-500 ease-in-out text-white" aria-current="page">ข่าวประชาสัมพันธ์</li>
        </ul>
    </div>
</section><!--end section-->
<div class="relative">
    <div class="shape absolute right-0 sm:-bottom-px -bottom-[2px] left-0 overflow-hidden z-1 text-white dark:text-slate-900">
        <svg class="w-full h-auto" viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
        </svg>
    </div>
</div>
<!-- End Hero -->

<!-- Start Section-->
<section class="relative md:py-24 py-16">
    <div class="container">
        <div class="grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 gap-[30px]">
            @foreach($news as $item)
            <div class="blog relative rounded-md shadow dark:shadow-gray-800 overflow-hidden">
                @if ($item->image)
                    <img src="{{ Storage::url($item->image) }}" alt="">
                @else
                    <img src="http://via.placeholder.com/353x234" alt="">
                @endif
                <div class="content p-6">
                    <a href="{{ route('news.show', $item) }}" class="title h5 text-lg font-medium hover:text-indigo-600 duration-500 ease-in-out">
                        {{ $item->title }}
                    </a>
                    <p class="text-slate-400 mt-3">
                        <a href="{{ route('news.show', $item) }}">
                            {{ \Illuminate\Support\Str::limit($item->content, 120) }}
                        </a>
                    </p>
                    <div class="mt-4">
                        <a href="{{ route('news.show', $item) }}" class="btn btn-link font-normal hover:text-indigo-600 after:bg-indigo-600 duration-500 ease-in-out">อ่านเพิ่มเติม <i class="uil uil-arrow-right"></i></a>
                    </div>
                </div>
            </div><!--blog end-->
            @endforeach
        </div>

        <div class="grid md:grid-cols-12 grid-cols- mt-8">
            <div class="md:col-span-12 text-center">
                {{ $news->links() }}
            </div>
        </div><!--end grid-->
    </div><!--end container-->

</section><!--end section-->
<!-- End -->
