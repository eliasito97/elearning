@extends('backend.layouts.app')
@section('title', 'Add User')

@push('styles')
<!-- Pick date -->
<link rel="stylesheet" href="{{asset('public/vendor/pickadate/themes/default.css')}}">
<link rel="stylesheet" href="{{asset('public/vendor/pickadate/themes/default.date.css')}}">
@endpush

@section('content')

<div class="content-body">
    <!-- row -->
    <div class="container-fluid">

        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>{{ __('Add User') }}</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{ __('Homepage') }}</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('user.index')}}">{{ __('Users') }}</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('user.create')}}">{{ __('Add User') }}</a></li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-xxl-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">{{ __('Basic Info') }}</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{route('user.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Name') }}</label>
                                        <input type="text" class="form-control" name="userName"
                                            value="{{old('userName')}}" required autofocus>
                                    </div>
                                    @if($errors->has('userName'))
                                    <span class="text-danger"> {{ $errors->first('userName') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Middlename') }}</label>
                                        <input type="text" class="form-control" name="userMiddlename"
                                               value="{{old('userMiddlename')}}">
                                    </div>
                                    @if($errors->has('userMiddlename'))
                                        <span class="text-danger"> {{ $errors->first('userMiddlename') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Last Name') }}</label>
                                        <input type="text" class="form-control" name="userLastname"
                                               value="{{old('userLastname')}}" required autofocus>
                                    </div>
                                    @if($errors->has('userLastname'))
                                        <span class="text-danger"> {{ $errors->first('userLastname') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('last Name2') }}</label>
                                        <input type="text" class="form-control" name="userLastname2"
                                               value="{{old('userLastname2')}}">
                                    </div>
                                    @if($errors->has('userLastname2'))
                                        <span class="text-danger"> {{ $errors->first('userLastname2') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Phone Number') }}</label>
                                        <input type="tel" class="form-control" name="contactNumber_en"
                                            value="{{old('contactNumber_en')}}">
                                    </div>
                                    @if($errors->has('contactNumber_en'))
                                    <span class="text-danger"> {{ $errors->first('contactNumber_en') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">{{__('Country')}}</label>
                                        <input type="tel" class="form-control" name="userCountry"
                                            value="{{old('userCountry')}}">
                                    </div>
                                    @if($errors->has('userCountry'))
                                    <span class="text-danger"> {{ $errors->first('userCountry') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Email') }}</label>
                                        <input type="email" class="form-control" name="emailAddress"
                                            value="{{old('emailAddress')}}">
                                    </div>
                                    @if($errors->has('emailAddress'))
                                    <span class="text-danger"> {{ $errors->first('emailAddress') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Role') }}</label>
                                        <select class="form-control" name="roleId">
                                            @forelse ($role as $r)
                                            <option value="{{$r->id}}" {{old('roleId')==$r->id?'selected':''}}>
                                                {{$r->name}}</option>
                                            @empty
                                            <option value="">{{ __('No Role Found') }}</option>
                                            @endforelse
                                        </select>
                                    </div>
                                    @if($errors->has('roleId'))
                                    <span class="text-danger"> {{ $errors->first('roleId') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Full Access') }}</label>
                                        <select class="form-control" name="fullAccess">
                                            <option value="0" @if(old('fullAccess')==0) selected @endif>{{ __('No') }}</option>
                                            <option value="1" @if(old('fullAccess')==1) selected @endif>{{ __('Yes') }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Status') }}</label>
                                        <select class="form-control" name="status">
                                            <option value="1" @if(old('status')==1) selected @endif>{{ __('Active') }}</option>
                                            <option value="0" @if(old('status')==0) selected @endif>{{ __('Inactive') }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Password') }}</label>
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                    @if($errors->has('password'))
                                    <span class="text-danger"> {{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <label class="form-label">{{ __('Image') }}</label>
                                    <div class="form-group fallback w-100">
                                        <input type="file" class="dropify" data-default-file="" name="image">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                                    <button type="submit" class="btn btn-light">{{ __('Cancel') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection

@push('scripts')
<!-- pickdate -->
<script src="{{asset('public/vendor/pickadate/picker.js')}}"></script>
<script src="{{asset('public/vendor/pickadate/picker.time.js')}}"></script>
<script src="{{asset('public/vendor/pickadate/picker.date.js')}}"></script>

<!-- Pickdate -->
<script src="{{asset('public/js/plugins-init/pickadate-init.js')}}"></script>
@endpush
