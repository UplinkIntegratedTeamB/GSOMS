@extends('layouts.guest')
@section('content')
    <div class="container-fluid">
        <div class="row" >
            <div class="col" style="margin: 0; padding: 0">
                <img src="{{ asset('images/brand/hall2.png') }}" alt="" style="width: 100%; height: 100vh; margin: 0">
            </div>
            <div class="col-lg-4 card" style="height: 100vh">
                <div class="bg-white shadow-soft py-lg-5 w-100">
                    <div class="text-center text-md-center mb-4 mt-md-0">
                        <h5 class="mt-5 ">{{ __('Welcome to General Services Office Management System') }}</h5>
                    </div>

                    <form class="mt-3 card-body" action="{{ route('login') }}" method="POST">
                        @csrf
                        <!-- Form -->
                        <div class="form-group mb-4">
                            <label for="email">{{ __('Your Email') }}</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1">
                                    <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z">
                                        </path>
                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z">
                                        </path>
                                    </svg>
                                </span>
                                <input name="email" type="email" class="form-control" placeholder="{{ __('Email') }}"
                                    id="email" value="{{ old('email') }}" required autofocus>
                            </div>
                            @error('email')
                                <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                        </div>
                        <!-- End of Form -->
                        <div class="form-group">
                            <!-- Form -->
                            <div class="form-group mb-4">
                                <label for="password">{{ __('Your Password') }}</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon2">
                                        <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                                clip-rule="evenodd">
                                            </path>
                                        </svg>
                                    </span>
                                    <input name="password" type="password" placeholder="{{ __('Password') }}"
                                        class="form-control" id="password" required>
                                </div>
                                @error('password')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                            <!-- End of Form -->
                            <div class="d-flex justify-content-between align-items-top mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                    <label class="form-check-label mb-0" for="remember">
                                        {{ __('Remember me') }}
                                    </label>
                                </div>
                                {{-- <div>
                                    <a href="{{ route('password.request') }}" class="small text-right">
                                        {{ __('Lost password?') }}
                                    </a>
                                </div> --}}
                            </div>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-gray-800">{{ __('Sign in') }}</button>
                        </div>
                    </form>
                    <div class="d-flex justify-content-center align-items-center mt-4">
                        <span class="fw-normal">
                            {{ __('Design and Developed by ') }}
                        </span>
                        <a class="fw-normal" style="text-decoration: underline; margin-left: 3px; color:blue">
                            {{ __('Uplink Integrated Solution') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
