@extends('layout')

@section('title')
    Gallery
@endsection

@section('content')
    <section id="portfolio" class="portfolio section-bg">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row portfolio-container">
                @foreach($data as $image)
                <div class="col-lg-4 col-md-6 portfolio-item">
                    <div class="portfolio-wrap">
                        <img src="{{ $image->image }}" class="img-fluid" alt="{{ $image->caption }}">
                        <div class="portfolio-info">
                        <h4>{{ $image->caption }}</h4>
                        <div class="portfolio-links">
                            <a href="{{ asset($image->image) }}" data-galleryery="portfolioGallery" class="portfolio-lightbox"><i class="bi bi-plus"></i></a>
                        </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection