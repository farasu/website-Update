@extends('auth')

@section('content')
    <div class="row pt-2">
        <div class="col-md-8">
            <img src="{{ asset('assets/img/register.png')}}" alt="auth" width="80%">
        </div>
        <div class="col-md-4">
            <h5 class="pb-3" style="color: #154c79;">Register to ANMC's Website</h5>
            <div class="card">
                <div class="col-md-12 p-2">
                    <h6>Register Form</h6>
                    <hr>
                </div>
                <div class="card-body">
                    <form action="{{ route('register') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="form-group mt-1">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" required class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Enter your name">
                                @error('name')
                                    <span class="invalid-feedback" role="alert"> 
                                        <strong > {{ $message }} </strong>
                                    </span>
                                @enderror
                            </div>
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
                            <div class="form-group mt-1">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" name="password_confirmation" required id="password_confirmation" 
                                placeholder="Confirm your password" class="form-control">
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
                                    <button type="submit" class="btn btn-primary float-start">Regsiter</button>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group my-1">
                                    <a href="{{ route('login')}}" class="btn btn-light float-end">Go to Login</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection