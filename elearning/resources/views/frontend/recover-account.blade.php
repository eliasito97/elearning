@extends('frontend.layouts.app')
@section('title',  'Recuperar Cuenta')
@section('header-attr') class="nav-shadow" @endsection
@push('styles')
    <link rel="stylesheet" href="{{asset('public/frontend/dist/recover-account.css')}}" />
@endpush
@section('content')
<!-- SignUp Area Starts Here -->


<div class="page-recover-account">
    <div class="container">
        <div class="row align-items-center justify-content-md-center">
            <div class="container">
                <h1 class="texto">{{ __('Recover your account') }}</h1>
                <p class="texto">{{ __('Enter your email or mobile number to search for your account.') }}</p>
                <!-- Mostrar mensajes de éxito o error -->
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('recover.account.process') }}" method="POST">
                    @csrf
                    <input class="texto" type="text" name="email_or_phone" placeholder="{{ __('Email or Phone') }}" required>
                    <div class="buttons">
                        <button type="button" class="cancel-btn" onclick="window.location='{{ url('/') }}'">{{ __('Cancel') }}</button>
                        <button type="submit" class="search-btn">{{ __('Search') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- SignUp Area Ends Here -->
@endsection
