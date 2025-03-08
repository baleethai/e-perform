<section class="relative table w-full py-32 lg:py-40 bg-gradient-to-br to-orange-600/20 via-fuchsia-600/20 from-indigo-600/20">
    <div class="container">
        <div class="grid grid-cols-1 text-center mt-10">
            <h3 class="text-3xl leading-normal font-medium">อัลบั้มรูปภาพ</h3>
            <p class="text-lg max-w-xl mx-auto">รวมรูปภาพกิจกรรม งานการศึกษา</p>
        </div><!--end grid-->
    </div><!--end container-->

    <div class="absolute text-center z-10 bottom-5 right-0 left-0 mx-3">
        <ul class="breadcrumb tracking-[0.5px] breadcrumb-light mb-0 inline-block">
           <li class="inline breadcrumb-item uppercase text-[13px] font-bold duration-500 ease-in-out text-dark/50 hover:text-dark">
               <a href="{{ route('home.index') }}">หน้าแรก</a>
           </li>
            <li class="inline breadcrumb-item uppercase text-[13px] font-bold duration-500 ease-in-out text-dark" aria-current="page">อัลบั้มรูปภาพ</li>
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
        <div class="grid grid-cols-1 items-center gap-[30px]">
            <div class="filters-group-wrap text-center">
                <div class="filters-group">
                    <ul class="mb-0 list-none container-filter-box filter-options">
                        <li class="inline-block font-medium text-base mx-1.5 mb-3 py-1 px-3 cursor-pointer relative text-slate-400 border border-gray-100 dark:border-gray-700 rounded-md transition duration-500 active" data-group="all">ทั้งหมด</li>
                        @foreach($albumTypes as $albumType)
                        <li class="inline-block font-medium text-base mx-1.5 mb-3 py-1 px-3 cursor-pointer relative text-slate-400 border border-gray-100 dark:border-gray-700 rounded-md transition duration-500" data-group="album-{{ $albumType->id }}">
                            {{ $albumType->name }}
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div><!--grid-->
    </div>

    <div class="container-fluid relative">
        <div id="grid" class="md:flex justify-center mx-auto mt-4">
            @foreach($albums as $album)
            <div class="lg:w-1/6 md:w-1/3 p-4 picture-item" data-groups='["album-{{ $album->id }}"]'>
                <div class="group relative block overflow-hidden rounded-md transition-all duration-500">
                    <a href="{{ route('album.show', $album) }}">
                        @if ($album->image)
                            <img src="{{ Storage::url($album->image) }}" class="rounded-md" alt="">
                        @else
                            <img src="http://via.placeholder.com/203x135" class="rounded-md" alt="">
                        @endif
                    </a>
                    <div class="content pt-3">
                        <h5 class="mb-1">
                            <a href="" class="hover:text-indigo-600 transition-all duration-500 font-semibold">{{ $album->name }}</a>
                        </h5>
                        <h6 class="text-slate-400">{{ $album->created_at->format('d/m/Y') }}</h6>
                    </div>
                </div>
            </div>
            @endforeach

        </div>

        <div class="grid md:grid-cols-12 grid-cols-1 mt-8">

            <div class="md:col-span-12 text-center">
                {{ $albums->links() }}
            </div>

        </div>
    </div>

</section>
