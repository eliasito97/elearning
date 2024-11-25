@extends('backend.layouts.app')
@section('title', 'Add Course')

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
                    <h4>{{ __('Add Course') }}</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{ __('Homepage') }}</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('course.index')}}">{{ __('Courses') }}</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('course.create')}}">{{ __('Add Course') }}</a></li>
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
                        <form action="{{route('course.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Title') }}</label>
                                        <input type="text" class="form-control" name="courseTitle_en"
                                            value="{{old('courseTitle_en')}}">
                                    </div>
                                    @if($errors->has('courseTitle_en'))
                                    <span class="text-danger"> {{ $errors->first('courseTitle_en') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Description') }}</label>
                                        <textarea class="form-control" name="courseDescription_en">{{old('courseDescription_en')}}</textarea>
                                    </div>
                                    @if($errors->has('courseDescription_en'))
                                    <span class="text-danger"> {{ $errors->first('courseDescription_en') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Category') }}</label>
                                        <select class="form-control" name="categoryId">
                                            @forelse ($courseCategory as $c)
                                            <option value="{{$c->id}}" {{old('categoryId')==$c->id?'selected':''}}>
                                                {{$c->category_name}}</option>
                                            @empty
                                            <option value="">{{ __('No Category Found') }}</option>
                                            @endforelse
                                        </select>
                                    </div>
                                    @if($errors->has('categoryId'))
                                    <span class="text-danger"> {{ $errors->first('categoryId') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Instructor') }}</label>
                                        <select class="form-control" name="instructorId">
                                            @forelse ($instructor as $i)
                                            <option value="{{$i->id}}" {{old('instructorId')==$i->id?'selected':''}}>
                                                {{$i->name}} {{$i->lastname}}</option>
                                            @empty
                                            <option value="">{{ __('No Instructor Found') }}</option>
                                            @endforelse
                                        </select>
                                    </div>
                                    @if($errors->has('instructorId'))
                                    <span class="text-danger"> {{ $errors->first('instructorId') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Typepayment') }}</label>
                                        <select class="form-control" name="typepayment_id">
                                            @forelse ($typepayment as $t)
                                                <option value="{{$t->id}}" {{old('typepayment_id')==$t->id?'selected':''}}>
                                                    @switch($t->typepayment_plan)
                                                        @case('full_course_subscription')
                                                            {{ __('full_course_subscription') }}
                                                            @break
                                                        @case('annual_subscription')
                                                            {{ __('annual_subscription') }}
                                                            @break
                                                        @case('weekly_subscription')
                                                            {{ __('weekly_subscription') }}
                                                            @break
                                                        @case('daily_subscription')
                                                            {{ __('daily_subscription') }}
                                                            @break
                                                        @default
                                                            {{ __('unknown') }} <!-- Opcional: si no se encuentra un valor de dificultad -->
                                                    @endswitch</option>
                                            @empty
                                                <option value="">{{ __('No Instructor Found') }}</option>
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Amount') }} {{ __('of the') }} {{ __('full_course_subscription') }}</label>
                                        <input type="number" class="form-control" name="courseFull_course_subscription"
                                               value="{{old('courseFull_course_subscription')}}">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Amount') }} {{ __('of the') }} {{ __('annual_subscription') }}</label>
                                        <input type="number" class="form-control" name="courseAnnual_subscription"
                                               value="{{old('courseAnnual_subscription')}}">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Amount') }} {{ __('of the') }} {{ __('weekly_subscription') }}</label>
                                        <input type="number" class="form-control" name="courseWeekly_subscription"
                                               value="{{old('courseWeekly_subscription')}}">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Amount') }} {{ __('of the') }} {{ __('daily_subscription') }}</label>
                                        <input type="number" class="form-control" name="courseDaily_subscription"
                                               value="{{old('courseDaily_subscription')}}">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Difficulty') }}</label>
                                        <select class="form-control" name="courseDifficulty">
                                            <option value="beginner" @if(old('courseDifficulty')=='beginner' ) selected
                                                @endif>{{ __('Basic') }}</option>
                                            <option value="intermediate" @if(old('courseDifficulty')=='intermediate' )
                                                selected @endif>{{ __('Intermediate') }}
                                            </option>
                                            <option value="advanced" @if(old('courseDifficulty')=='advanced' ) selected
                                                @endif>{{ __('Advanced') }}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Price') }}</label>
                                        <input type="number" class="form-control" name="coursePrice"
                                            value="{{old('coursePrice')}}">
                                    </div>
                                    @if($errors->has('coursePrice'))
                                    <span class="text-danger"> {{ $errors->first('coursePrice') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Old Price') }}</label>
                                        <input type="number" class="form-control" name="courseOldPrice"
                                            value="{{old('courseOldPrice')}}">
                                    </div>
                                    @if($errors->has('courseOldPrice'))
                                    <span class="text-danger"> {{ $errors->first('courseOldPrice') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Subscription Price') }}</label>
                                        <input type="number" class="form-control" name="subscription_price"
                                            value="{{old('subscription_price')}}">
                                    </div>
                                    @if($errors->has('subscription_price'))
                                    <span class="text-danger"> {{ $errors->first('subscription_price') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Start From') }}</label>
                                        <input type="date" class="form-control" name="start_from"
                                            value="{{old('start_from')}}">
                                    </div>
                                    @if($errors->has('start_from'))
                                    <span class="text-danger"> {{ $errors->first('start_from') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Duration') }}</label>
                                        <input type="number" class="form-control" name="duration"
                                            value="{{old('duration')}}">
                                    </div>
                                    @if($errors->has('duration'))
                                    <span class="text-danger"> {{ $errors->first('duration') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Number of Lesson') }}</label>
                                        <input type="number" class="form-control" name="lesson"
                                            value="{{old('lesson')}}">
                                    </div>
                                    @if($errors->has('lesson'))
                                    <span class="text-danger"> {{ $errors->first('lesson') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Prerequisites') }}</label>
                                        <textarea class="form-control" name="prerequisites_en"
                                            value="{{old('prerequisites_en')}}"></textarea>
                                    </div>
                                    @if($errors->has('prerequisites_en'))
                                    <span class="text-danger"> {{ $errors->first('prerequisites_en') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Course Code') }}</label>
                                        <input type="text" class="form-control" name="course_code"
                                            value="{{old('course_code')}}">
                                    </div>
                                    @if($errors->has('course_code'))
                                    <span class="text-danger"> {{ $errors->first('course_code') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Thumbnail Video URL') }}</label>
                                        <input type="text" class="form-control" name="thumbnail_video" value="{{old('thumbnail_video')}}">
                                    </div>
                                    @if($errors->has('thumbnail_video'))
                                    <span class="text-danger"> {{ $errors->first('thumbnail_video') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Course Tag') }}</label>
                                        <select class="form-control" name="tag">
                                            <option value="popular" @if(old('tag')=='popular' ) selected @endif>{{ __('Popular') }}</option>
                                            <option value="featured" @if(old('tag')=='featured' ) selected @endif>{{ __('Featured') }}
                                            </option>
                                            <option value="upcoming" @if(old('tag')=='upcoming' ) selected @endif>{{ __('Upcoming') }}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                {{-- <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Status</label>
                                        <select class="form-control" name="status">
                                            <option value="1" @if(old('status')==1) selected @endif>Active</option>
                                            <option value="0" @if(old('status')==0) selected @endif>Inactive</option>
                                        </select>
                                    </div>
                                </div> --}}
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label class="form-label">{{ __('Image') }}</label>
                                    <div class="form-group fallback w-100">
                                        <input type="file" class="dropify" data-default-file="" name="image">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label class="form-label">{{ __('Thumbnail Image') }}</label>
                                    <div class="form-group fallback w-100">
                                        <input type="file" class="dropify" data-default-file="" name="thumbnail_image">
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
