@extends ('layout')

@section('title')
    Services
@endsection

@section('content')
<section id="contact" class="contact">
        <div class="container" data-aos="fade-up">
            <div class="row" style="text-align: justify; text-justify: inter-character;">
                <p style="padding: 10px 40px; text-align: @if (app()->getLocale() === 'en') left; @else right @endif" >{!! nl2br($message->detail)  !!}</p> 
            </div>

        </div>
    </section>
    <section id="services" class="services">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h5 style="margin: -60px 0px 70px 0px;">{{__('public.service list')}}</h5>
            </div>
            <div class="row">
                @foreach($services as $service)
                <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up">
                    <div class="icon">
                        <i>
                            <img src="{{ asset($service->img) }}" alt="{{ $service->title }}" width="80">
                        </i>
                    </div>
                    <h4 class="title"><a href="{{ route('service_detail', $service->id) }}">{{ $service->title }}</a></h4>
                    <p class="description">{{ substr($service->detail, 0, 100) }}...</p>
                </div>
                @endforeach
            </div>

        </div>
    </section>
@endsection