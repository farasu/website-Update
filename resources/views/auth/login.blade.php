@extends('auth')

@section('content')
    <div class="row pt-5">
        <div class="col-md-8">
            <img src="{{ asset('assets/img/login.png')}}" alt="auth" width="80%">
        </div>
        <div class="col-md-4">
            <h5 class="pb-3" style="color: #154c79;">Login to ANMC's Website</h5>
            <div class="card">
                <div class="col-md-12 p-2">
                    <h6>Login Form</h6>
                    <hr>
                </div>
                <div class="card-body">
                    <form action="{{ route('login')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="form-group mt-1">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control 
                                @error('email') is-invalid @enderror" required value="{{ old('email') }}" placeholder="Enter your email address">
                                @error('email')
                                    <span class="invalid-feedback" role="alert"> 
                                        <strong > {{ $message }} </strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mt-1">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control 
                                @error('password') is-invalid @enderror" value="{{ old('password') }}" required placeholder="Enter the password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert"> 
                                        <strong > {{ $message }} </strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group my-1">
                                    <button type="submit" class="btn btn-primary float-start">login</button>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group my-1">
                                    <a href="{{ route('register')}}" class="btn btn-light float-end">Go to Register</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection