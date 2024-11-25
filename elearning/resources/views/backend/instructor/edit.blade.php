@extends('backend.layouts.app')
@section('title', 'Edit Instructor')

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
                    <h4>{{ __('Edit Instructor') }}</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{ __('Home') }}</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('instructor.index')}}">{{ __('Instructors') }}</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0);">{{ __('Edit Instructor') }}</a></li>
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
                        <form action="{{route('instructor.update',encryptor('encrypt', $instructor->id))}}"
                            method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="uptoken" value="{{encryptor('encrypt',$instructor->id)}}">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Name') }}</label>
                                        <input type="text" class="form-control" name="userName"
                                            value="{{old('userName',$instructor->name)}}">
                                    </div>
                                    @if($errors->has('userName'))
                                    <span class="text-danger"> {{ $errors->first('userName') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Middlename') }}</label>
                                        <input type="text" class="form-control" name="userMiddlename"
                                            value="{{old('userMiddlename',$instructor->middlename)}}">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Last Name') }}</label>
                                        <input type="text" class="form-control" name="userLastname"
                                               value="{{old('userLastname',$instructor->lastname)}}">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Last Name2') }}</label>
                                        <input type="text" class="form-control" name="userLastname2"
                                               value="{{old('userLastname2',$instructor->lastname2)}}">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Phone Number') }}</label>
                                        <input type="tel" class="form-control" name="contactNumber_en"
                                            value="{{old('contactNumber_en',$instructor->contact_en)}}">
                                    </div>
                                    @if($errors->has('contactNumber_en'))
                                    <span class="text-danger"> {{ $errors->first('contactNumber_en') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">{{__('Country')}}</label>
                                        <input type="tel" class="form-control" name="userCountry"
                                            value="{{old('userCountry',$instructor->country)}}">
                                    </div>
                                    @if($errors->has('userCountry'))
                                    <span class="text-danger"> {{ $errors->first('userCountry') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Email') }}</label>
                                        <input type="email" class="form-control" name="emailAddress"
                                            value="{{old('emailAddress',$instructor->email)}}">
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
                                            <option value="{{$r->id}}" {{old('roleId', $instructor->
                                                role_id)==$r->id?'selected':''}}>
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
                                        <label class="form-label">{{ __('Designation') }}</label>
                                        <input type="text" class="form-control" name="designation"
                                            value="{{old('designation',$instructor->designation)}}">
                                    </div>
                                    @if($errors->has('designation'))
                                    <span class="text-danger"> {{ $errors->first('designation') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Title') }}</label>
                                        <input type="text" class="form-control" name="title"
                                            value="{{old('title',$instructor->title)}}">
                                    </div>
                                    @if($errors->has('title'))
                                    <span class="text-danger"> {{ $errors->first('title') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Status') }}</label>
                                        <select class="form-control" name="status">
                                            <option value="1" @if(old('status',$instructor->status)==1) selected
                                                @endif>{{ __('Active') }}</option>
                                            <option value="0" @if(old('status',$instructor->status)==0) selected
                                                @endif>{{ __('Inactive') }}</option>
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
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Biography') }}</label>
                                        <textarea class="form-control"
                                            name="bio">{{old('bio',$instructor->bio)}}</textarea>
                                    </div>
                                    @if($errors->has('bio'))
                                    <span class="text-danger"> {{ $errors->first('bio') }}</span>
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
