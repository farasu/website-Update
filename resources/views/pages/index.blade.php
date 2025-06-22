@extends ('layout')

@section('title')
    Webiste
@endsection

@section('content')
    <section id="hero">
        <div class="hero-container">
            <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

                <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

                <div class="carousel-inner" role="listbox">
                    @foreach($herro as $herro)
                    <div class="carousel-item @if($loop->index == 0) active @endif" style="background-image: url('{{ $herro->img }}');">
                        <div class="carousel-container"> 
                        <div class="carousel-content container">
                            <h2 class="animate__animated animate__fadeInDown">{{ $herro->title }}</h2>
                            <p class="animate__animated animate__fadeInUp">{{ $herro->detail}}</p>
                        </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
                </a>
                <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
                </a>

            </div>
        </div>
    </section>
    <section id="about" class="about">
      <div class="container">
        <div class="row no-gutters">
            <div class="section-title">
              <h2>{{__('public.about')}}</h2>
              <hr>
              @if($info)
              <p id="about-text">
                {{ $info->detail }}
              </p>
              @endif
            </div>
        </div>

      </div>
    </section>

    <section id="services" class="services">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>{{__('public.services')}}</h2>
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
                    <p class="description">{{ substr($service->detail, 0, 100) }} ...</p>
                </div>
                @endforeach
            </div>

        </div>
    </section>

    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>{{__('public.contact')}}</h2>
            </div>

            <div class="row">

                <div class="col-lg-6 d-flex" data-aos="fade-up">
                <div class="info-box">
                    <i class="bx bx-map"></i>
                    <h3>{{__('public.address')}}</h3>
                    <p>
                        {{__('public.add1')}}, {{__('public.add2')}}, {{__('public.district')}}, {{__('public.Kabul')}},  {{__('public.Afghanistan')}}
                        </p>
                </div>
                </div>

                <div class="col-lg-3 d-flex" data-aos="fade-up" data-aos-delay="100">
                <div class="info-box">
                    <i class="bx bx-envelope"></i>
                    <h3>{{__('public.address')}}</h3>
                    <p>info@anmc.gov.af</p>
                </div>
                </div>

                <div class="col-lg-3 d-flex" data-aos="fade-up" data-aos-delay="200">
                <div class="info-box ">
                    <i class="bx bx-phone-call"></i>
                    <h3>{{__('public.phone')}}</h3>
                    <p>+93 (0) 790 60 90 70</p>
                </div>
                </div>
            </div>

        </div>
    </section>
@endsection