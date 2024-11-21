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
            <h1>Recuperación de Cuenta</h1>
            <p>Hola {{ $user->name_en }},</p>
            <p>Has solicitado recuperar tu cuenta. Haz clic en el siguiente enlace para restablecer tu contraseña:</p>
            <a href="{{ route('password.reset',encryptor('encrypt', $user->id)) }}">Restablecer contraseña</a>
        </div>
    </div>
</div>
<!-- SignUp Area Ends Here -->
@endsection
