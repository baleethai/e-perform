@extends('layouts.app')

@section('content')

<section class="relative table w-full py-32 lg:py-40 bg-gradient-to-br to-orange-600/20 via-fuchsia-600/20 from-indigo-600/20">
    <div class="container">
        <div class="grid grid-cols-1 text-center mt-10">
            <h3 class="text-3xl leading-normal font-medium">{{ $academic->name }}</h3>
        </div>
    </div>
</section>

<section class="relative md:py-24 py-16">
    <div class="container">
        <div class="grid md:grid-cols-12 grid-cols-1 gap-[30px]">
            <div class="lg:col-span-7 md:col-span-6">
                <div class="sticky top-20">
                    <div class="grid lg:grid-cols-12 grid-cols-1 gap-[30px]">
                        <div class="lg:col-span-12">
                            <div class="work-details">
                                <img src="{{ Storage::url($academic->cover) }}" alt="">
                                <p class="text-slate-400">{!! $academic->description !!}</p>
                            </div>
                        </div><!--end col-->
                    </div><!--end grid-->
                </div>
            </div><!--end col-->
        </div><!--end grid-->
    </div><!--end container-->

</section><!--end section-->

@endsection
