@extends('frontend.layouts.app')
@section('title', 'Sign Up')
@section('header-attr') class="nav-shadow" @endsection

@section('content')
<!-- SignUp Area Starts Here -->
<section class="signup-area signin-area p-3">
    <div class="container">
        <div class="row align-items-center justify-content-md-center">
            <div class="col-lg-5 order-2 order-lg-0">
                <div class="signup-area-textwrapper">
                    <h2 class="font-title--md mb-0">{{__('Sign up')}}</h2>
                    <p class="mt-2 mb-lg-4 mb-3">{{__('Already have an account?')}} <a href="{{route('studentLogin')}}" class="text-black-50">{{__('Sign in')}}</a></p>
                    <form action="{{route('studentRegister.store','studentdashboard')}}" method="POST">
                        @csrf
                        <div class="form-element">
                                <label for="name">{{__('Name')}}</label>
                                <input type="text" placeholder="{{__('Enter your')}} {{__('name')}}" id="userName" value="{{old('name')}}" name="userName" />
                                @if($errors->has('name'))
                                    <small class="d-block text-danger">{{$errors->first('name')}}</small>
                                @endif
                        </div>
                        <div class="form-element">
                            <label for="name">{{__('Middlename')}}</label>
                            <input type="text" placeholder="{{__('Enter your')}} {{__('Middlename')}}" id="userMiddlename" value="{{old('Middlename')}}" name="userMiddlename" />
                            @if($errors->has('Middlename'))
                                <small class="d-block text-danger">{{$errors->first('Middlename')}}</small>
                            @endif
                        </div>
                        <div class="form-element">
                            <label for="name">{{__('Last Name')}}</label>
                            <input type="text" placeholder="{{__('Enter your')}} {{__('Last Name')}}" id="userLastname" value="{{old('Last Name')}}" name="userLastname" />
                            @if($errors->has('Last Name'))
                                <small class="d-block text-danger">{{$errors->first('Last Name')}}</small>
                            @endif
                        </div>
                        <div class="form-element">
                            <label for="name">{{__('last Name2')}}</label>
                            <input type="text" placeholder="{{__('Enter your')}} {{__('last Name2')}} " id="userLastname2" value="{{old('last Name2')}}" name="userLastname2" />
                            @if($errors->has('name'))
                                <small class="d-block text-danger">{{$errors->first('last Name2')}}</small>
                            @endif
                        </div>
                        <div class="form-element">
                                <label for="email">{{__('Your email')}}</label>
                                <input type="email" placeholder="{{__('example@email.com')}}" id="email" value="{{old('email')}}" name="email" />
                                @if($errors->has('email'))
                                    <small class="d-block text-danger">{{$errors->first('email')}}</small>
                                @endif
                        </div>
                        <div class="form-element">
                            <label for="password" class="w-100" style="text-align: left;">{{__('Password')}}</label>
                            <div class="form-alert-input">
                                <input type="password" placeholder="{{__('Type here...')}}" id="password"  name="password"/>
                                <div class="form-alert-icon" onclick="showPassword('password',this)">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-eye">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg>
                                </div>
                                @if($errors->has('password'))
                                    <small class="d-block text-danger">{{$errors->first('password')}}</small>
                                @endif
                            </div>
                        </div>
                        <div class="form-element">
                            <label for="password_confirmation" class="w-100" style="text-align: left;">{{__('Confirm Password')}}</label>
                            <div class="form-alert-input">
                                <input type="password" placeholder="{{__('Type here...')}}" name="password_confirmation" id="password_confirmation" />
                                <div class="form-alert-icon" onclick="showPassword('password_confirmation',this)">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-eye">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="form-element d-flex align-items-center terms">
                            <input class="checkbox-primary me-1" type="checkbox" id="agree" />
                            <label for="agree" class="text-secondary mb-0">{{__('Accept the')}} <a href="#"
                                    style="text-decoration: underline;">{{__('Terms')}}</a> {{__('and')}} <a href="#"
                                    style="text-decoration: underline;">{{__('Privacy Policy')}}</a></label>
                        </div>
                        <div class="form-element">
                            <button type="submit" class="button button-lg button--primary w-100">{{__('Sign up')}}</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-7 order-1 order-lg-0">
                <div class="signup-area-image">
                    <img src="{{asset('public/frontend/dist/images/signup/Illustration.png')}}" alt="Illustration Image"
                        class="img-fluid" />
                </div>
            </div>
        </div>
    </div>
</section>
<!-- SignUp Area Ends Here -->

@endsection
