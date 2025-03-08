<!-- Start Hero -->
<section class="relative table w-full py-32 lg:py-40 bg-gradient-to-br to-orange-600/20 via-fuchsia-600/20 from-indigo-600/20">
    <div class="container">
        <div class="grid grid-cols-1 pb-8 text-center mt-10">
            <h3 class="mb-3 text-3xl leading-normal font-medium text-dark">{{ $album->name }}</h3>

            <ul class="list-none">
                <li class="inline font-semibold text-dark/60 mr-2"> <span class="text-dark">ผู้โพสต์ :</span> Admin</li>
                <li class="inline font-semibold text-dark/60"> <span class="text-dark">เผยแพร่วันที่ :</span> {{ $album->created_at->format('d/m/Y') }}</li>
            </ul>
        </div><!--end grid-->
    </div><!--end container-->

    <div class="absolute text-center z-10 bottom-5 right-0 left-0 mx-3">
        <ul class="breadcrumb tracking-[0.5px] breadcrumb-light mb-0 inline-block">
           <li class="inline breadcrumb-item uppercase text-[13px] font-bold duration-500 ease-in-out text-dark/50 hover:text-dark">
               <a href="{{ route('home.index') }}">หน้าแรก</a>
           </li>
           <li class="inline breadcrumb-item uppercase text-[13px] font-bold duration-500 ease-in-out text-dark/50 hover:text-dark">
               <a href="{{ route('album.index') }}">อัลบั้มรูปภาพ</a>
           </li>
            <li class="inline breadcrumb-item uppercase text-[13px] font-bold duration-500 ease-in-out text-dark" aria-current="page">{{ $album->name }}</li>
        </ul>
    </div>

</section>

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
            <div class="lg:col-span-8 md:col-span-7">

                <div id="grid" class="md:flex justify-center mx-auto">

                    @foreach($album->files as $file)
                    <div class=" p-1 picture-item">
                        <div class="group relative block overflow-hidden rounded-md transition-all duration-500">
                            <a href="{{ Storage::url($file) }}" class="lightbox transition-all duration-500 group-hover:scale-105" title="{{ $album->name }}">
                                <img src="{{ Storage::url($file) }}" class="" alt="{{ $album->name }}">
                            </a>
                        </div>
                    </div>
                    @endforeach

                </div>

            </div>

            <div class="lg:col-span-4 md:col-span-5">
                <div class="sticky top-20">
                    <h5 class="text-lg font-semibold bg-gray-50 dark:bg-slate-800 shadow dark:shadow-gray-800 rounded-md p-2 text-center">รายละเอียด :</h5>
                    <dl class="grid grid-cols-12 mb-0 mt-4">
                        <dt class="md:col-span-4 col-span-5 mt-2">ชื่ออัลบั้ม :</dt>
                        <dd class="md:col-span-8 col-span-7 mt-2 text-slate-400">{{ $album->name }}</dd>

                        <dt class="md:col-span-4 col-span-5 mt-2">รายละเอียด :</dt>
                        <dd class="md:col-span-8 col-span-7 mt-2 text-slate-400">{{ $album->description }}</dd>

                        <dt class="md:col-span-4 col-span-5 mt-2">เผยแพร่วันที่ :</dt>
                        <dd class="md:col-span-8 col-span-7 mt-2 text-slate-400">{{ $album->created_at->format('d/m/Y') }}</dd>

                    </dl>

                </div>
            </div>
        </div>
    </div>

</section>
