@extends('backend.layouts.app')
@section('title', 'Edit Student')

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
                    <h4>{{ __('Edit Student') }}</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{ __('Homepage') }}</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('student.index')}}">{{ __('Students') }}</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0);">{{ __('Edit Student') }}</a></li>
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
                        <form action="{{route('student.update',encryptor('encrypt', $student->id))}}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="uptoken" value="{{encryptor('encrypt',$student->id)}}">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Name') }}</label>
                                        <input type="text" class="form-control" name="userName"
                                            value="{{old('userName',$student->name)}}">
                                    </div>
                                    @if($errors->has('userName'))
                                    <span class="text-danger"> {{ $errors->first('userName') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Middlename') }}</label>
                                        <input type="text" class="form-control" name="userMiddlename"
                                               value="{{old('userMiddlename',$student->middlename)}}">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Last Name') }}</label>
                                        <input type="text" class="form-control" name="userLastname"
                                               value="{{old('userLastname',$student->lastname)}}">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Last Name2') }}</label>
                                        <input type="text" class="form-control" name="userLastname2"
                                            value="{{old('userLastname2',$student->lastname2)}}">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Phone Number') }}</label>
                                        <input type="tel" class="form-control" name="contactNumber_en"
                                            value="{{old('contactNumber_en',$student->contact_en)}}">
                                    </div>
                                    @if($errors->has('contactNumber_en'))
                                    <span class="text-danger"> {{ $errors->first('contactNumber_en') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Country') }}</label>
                                        <input type="tel" class="form-control" name="userCountry"
                                            value="{{old('userCountry',$student->country)}}">
                                    </div>
                                    @if($errors->has('userCountry'))
                                    <span class="text-danger"> {{ $errors->first('userCountry') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Email') }}</label>
                                        <input type="email" class="form-control" name="emailAddress"
                                            value="{{old('emailAddress',$student->email)}}">
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
                                            <option value="{{$r->id}}" {{old('roleId', $student->
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
                                        <label class="form-label">{{ __('Date of Birth') }}</label>
                                        <input type="date" name="birthDate"
                                            value="{{old('birthDate',$student->date_of_birth)}}" class="form-control"
                                            id="">
                                    </div>
                                    @if($errors->has('birthDate'))
                                    <span class="text-danger"> {{ $errors->first('birthDate') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Gender') }}</label>
                                        <select class="form-control" name="gender">
                                            <option value="male" @if(old('gender',$student->gender)=='male' ) selected
                                                @endif>{{ __('Male') }}
                                            </option>
                                            <option value="female" @if(old('gender',$student->gender)=='female' )
                                                selected @endif>{{ __('Female') }}
                                            </option>
                                            <option value="other" @if(old('gender',$student->gender)=='other' ) selected
                                                @endif>{{ __('Other') }}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Status') }}</label>
                                        <select class="form-control" name="status">
                                            <option value="1" @if(old('status',$student->status)==1) selected
                                                @endif>{{ __('Active') }}</option>
                                            <option value="0" @if(old('status',$student->status)==0) selected
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
