<!-- Start Hero -->
<section class="relative table w-full py-32 lg:py-36 bg-[url('../../assets/images/blog/bg.jpg')] bg-center bg-no-repeat">
    <div class="absolute inset-0 bg-black opacity-80"></div>
    <div class="container">
        <div class="grid grid-cols-1 pb-8 text-center mt-10">
            <h3 class="mb-3 text-3xl leading-normal font-medium text-white">{{ $post->title }}</h3>

            <ul class="list-none mt-6">
                <li class="inline-block font-semibold text-white/50 mx-5"> <span class="text-white block">ผู้เขียน :</span> <span class="block">{{ $post->author->name }}</span></li>
                <li class="inline-block font-semibold text-white/50 mx-5"> <span class="text-white block">เผยแพร่ :</span> <span class="block">{{ $post->published_at->format('d/m/Y') }}</span></li>
                <li class="inline-block font-semibold text-white/50 mx-5"> <span class="text-white block">หมวดหมู่ :</span> <span class="block">{{ optional($post->category)->name }}</span></li>
            </ul>
        </div><!--end grid-->
    </div><!--end container-->

    <div class="absolute text-center z-10 bottom-5 right-0 left-0 mx-3">
        <ul class="breadcrumb tracking-[0.5px] breadcrumb-light mb-0 inline-block">
            <li class="inline breadcrumb-item uppercase text-[13px] font-bold duration-500 ease-in-out text-white/50 hover:text-white">
                <a href="{{ route('home.index') }}">หน้าแรก</a>
            </li>
            <li class="inline breadcrumb-item uppercase text-[13px] font-bold duration-500 ease-in-out text-white" aria-current="page">
                {{ $post->title }}
            </li>
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
        <div class="grid md:grid-cols-12 grid-cols-1 gap-[30px]">
            <div class="lg:col-span-8 md:col-span-6">
                <div class="p-6 rounded-md shadow dark:shadow-gray-800">

                    <div class="">
                        <p class="text-slate-400">
                            {!! $post->content !!}
                        </p>
                    </div>
                </div>

            </div>

            <div class="lg:col-span-4 md:col-span-6">
                <div class="sticky top-20">
                    <h5 class="text-lg font-semibold bg-gray-50 dark:bg-slate-800 shadow dark:shadow-gray-800 rounded-md p-2 text-center">ข่าวประชาสัมพันธ์ล่าสุด</h5>
                    @foreach($latestPosts as $latestPost)
                    <div class="flex items-center mt-5 mb-5">
                        <a href="{{ route('news.show', $latestPost) }}">
                            @if ($latestPost->image)
                                <img src="{{ Storage::url($latestPost->image) }}" class="h-16 rounded-md shadow dark:shadow-gray-800" alt="">
                            @else
                                <img src="http://via.placeholder.com/97x64" class="h-16 rounded-md shadow dark:shadow-gray-800" alt="">
                            @endif
                        </a>
                        <div class="ml-3">
                            <a href="{{ route('news.show', $latestPost) }}" class="font-semibold hover:text-indigo-600">{{ $latestPost->title }}</a>
                            <p class="text-sm text-slate-400">{{ $latestPost->published_at->format('d/m/Y') }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div><!--end grid-->
    </div><!--end container-->

</section><!--end section-->
<!-- End -->
