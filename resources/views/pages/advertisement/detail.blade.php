@extends ('layout')

@section('title')
    {{ $info->title }}
@endsection

@section('content')
<section id="contact" class="contact">
    <div class="container"> 
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-12">
                    <img src="{{ asset($info->img) }}" class="rounded-start p-1 img-cover" alt="{{ $info->title }}" height="350px" height="300px;">
                </div>
                <div class="col-md-12">
                <div class="card-body">
                    <h5 class="card-title">{{ $info->title }}</h5>
                    <p class="card-text"><small class="text-muted">{{ date('M-d-y', strtotime($info->updated_at)) }}</small></p>
                    <p class="card-text">{!! nl2br($info->detail)  !!}</p>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection