@extends('layouts.app')
@section('content')
@if ($banners->count() > 0)

<section id="slider" class="slider-element slider-parallax swiper_wrapper min-vh-75" data-loop="true">
    <div class="swiper-container swiper-parent">
        <div class="swiper-wrapper">
            @foreach ($banners as $banner)
            <div class="swiper-slide">
                <div class="container">
                    <div class="slider-caption">
                        <div>
                            @if ($banner->summary)
                            <h2>{{ $banner->summary }}</h2>
                            @endif
                            @if ($banner->description)
                            <p class="d-none d-sm-block">
                                {{ $banner->description }}
                            </p>
                            @endif

                        </div>
                    </div>
                </div>
                @if ($banner->images)
                <div class="swiper-slide-bg" style="background-image: url('{{ Storage::url($banner->images) }}'); background-position: center top;"></div>
                @endif
            </div>
            @endforeach
        </div>
        <div class="slider-arrow-left"><i class="uil uil-angle-left-b"></i></div>
        <div class="slider-arrow-right"><i class="uil uil-angle-right-b"></i></div>
    </div>
</section>
@endif

<section id="content">
    <div class="content-wrap">
        <div class="container">
            <h1>งานวิชาการ</h1>
            <div class="row justify-content-center col-mb-50">
                @foreach ($academics as $academic)
                <div class="col-sm-6 col-lg-4">
                    <div class="feature-box media-box">
                        <div class="fbox-media">
                            @if ($academic->cover)
                                <a href="{{ route('academic.show', $academic) }}">
                                    <img class="rounded" src="{{ Storage::url($academic->cover) }}" alt="{{ $academic->name }}">
                                </a>
                            @endif
                        </div>
                        <div class="fbox-content px-0">
                            <h3>
                                <a href="{{ route('academic.show', $academic) }}">
                                    {{ $academic->name }}
                                </a>
                            </h3>
                            <p>
                                {!! Str::limit($academic->description, 100) !!}
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

@endsection
