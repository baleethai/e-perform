@extends('layouts.app')
@section('content')

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
                            <img class="rounded" src="{{ Storage::url($academic->cover) }}" alt="{{ $academic->name }}">
                            @endif
                        </div>
                        <div class="fbox-content px-0">
                            <h3>{{ $academic->name }}</h3>
                            <p>{!! Str::limit($academic->description, 100) !!}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

@endsection
