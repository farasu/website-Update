@extends('layout')

@section('title')
    News
@endsection

@section('content')
<section id="services" class="services">
        <div class="container" data-aos="fade-up">
            <div class="row">
            @foreach($newses as $news)
                <div class="col-md-4 col-sm-6 my-4">
                    <div class="card mx-1 px-0">
                        <img class="card-img-top img-cover" src="{{ $news->img }}" alt="{{ $news->title }}" height="200">
                        <div class="card-body">
                            <h5 class="card-title">{{ $news->title }}</h5>
                            <p class="card-text">{{ substr($news->detail, 0, 300) }} ... </p>
                            <a href="{{ route('news_detail', $news->id ) }}" class="btn btn-link text-decoration-none fs-6">
                                <i class="bi @if (app()->getLocale() === 'en') bi-arrow-right-square-fill @else bi-arrow-left-square-fill @endif"></i> {{__('public.readmore')}}
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </section>

@endsection