@extends ('layout')

@section('title')
    {{ $service->title }}
@endsection

@section('content')
<section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>{{ $service->title }}</h2>
            </div>

            <div class="row">
                <p style="padding: 10px 40px; text-align: @if (app()->getLocale() === 'en') left; @else right @endif">
                    {!! nl2br($service->detail)  !!}
                </p>
            </div>

        </div>
    </section>
@endsection