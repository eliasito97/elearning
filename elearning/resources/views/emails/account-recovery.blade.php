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
            <h1>{{ __('Account Recovery') }}</h1>
            <p>{{ __('Hello') }} {{ $user->name_en }},</p>
            <p>{{ __('You have requested to recover your account. Click on the following link to reset your password:') }}</p>
            <a href="{{ route('password.reset',encryptor('encrypt', $user->id)) }}">{{ __('Reset Password') }}</a>
        </div>
    </div>
</div>
<!-- SignUp Area Ends Here -->
@endsection
