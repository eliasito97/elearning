@extends('backend.layouts.app')
@section('title', 'Edit Question')

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
                    <h4>{{ __('Edit Question') }}</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{ __('Homepage') }}</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('question.index')}}">{{ __('Questions') }}</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0);">{{ __('Edit Question') }}</a></li>
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
                        <form action="{{route('question.update',encryptor('encrypt', $question->id))}}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="uptoken" value="{{encryptor('encrypt',$question->id)}}">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Quiz') }}</label>
                                        <select class="form-control" name="quizId">
                                            @forelse ($quiz as $q)
                                            <option value="{{$q->id}}" {{old('quizId', $question->quiz_id) ==
                                                $q->id?'selected':''}}>
                                                {{$q->title}}</option>
                                            @empty
                                            <option value="">{{ __('No Quiz Found') }}</option>
                                            @endforelse
                                        </select>
                                    </div>
                                    @if($errors->has('quizId'))
                                    <span class="text-danger"> {{ $errors->first('quizId') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Qestion Type') }}</label>
                                        <select class="form-control" name="questionType">
                                            <option value="multiple_choice" @if(old('questionType', $question->type)=='multiple_choice' ) selected
                                                @endif>{{ __('Multiple Choice') }}
                                            </option>
                                            <option value="true_false" @if(old('questionType', $question->type)=='true_false' ) selected
                                                @endif>{{ __('True False') }}
                                            </option>
                                            <option value="short_answer" @if(old('questionType', $question->type)
                                                =='short_answer' )
                                                selected @endif>{{ __('Short Answer') }}</option>
                                        </select>
                                    </div>
                                    @if($errors->has('questionType'))
                                    <span class="text-danger"> {{ $errors->first('questionType') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Question Content') }}</label>
                                        <textarea class="form-control"
                                            name="questionContent">{{old('questionContent',$question->content)}}</textarea>
                                    </div>
                                    @if($errors->has('questionContent'))
                                    <span class="text-danger"> {{ $errors->first('questionContent') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Option A') }}</label>
                                        <input type="text" class="form-control" name="optionA" value="{{old('optionA',$question->option_a)}}">
                                    </div>
                                    @if($errors->has('optionA'))
                                    <span class="text-danger"> {{ $errors->first('optionA') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Option B') }}</label>
                                        <input type="text" class="form-control" name="optionB" value="{{old('optionB',$question->option_b)}}">
                                    </div>
                                    @if($errors->has('optionB'))
                                    <span class="text-danger"> {{ $errors->first('optionB') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Option C') }}</label>
                                        <input type="text" class="form-control" name="optionC" value="{{old('optionC',$question->option_c)}}">
                                    </div>
                                    @if($errors->has('optionC'))
                                    <span class="text-danger"> {{ $errors->first('optionC') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Option D') }}</label>
                                        <input type="text" class="form-control" name="optionD" value="{{old('optionD',$question->option_d)}}">
                                    </div>
                                    @if($errors->has('optionD'))
                                    <span class="text-danger"> {{ $errors->first('optionD') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Correct Answer') }}</label>
                                        <select class="form-control" name="correctAnswer">
                                            <option value="a" @if(old('correctAnswer',$question->correct_answer)=='a' ) selected @endif>{{ __('Option A') }}</option>
                                            <option value="b" @if(old('correctAnswer',$question->correct_answer)=='b' ) selected @endif>{{ __('Option B') }}</option>
                                            <option value="c" @if(old('correctAnswer',$question->correct_answer)=='c' ) selected @endif>{{ __('Option C') }}</option>
                                            <option value="d" @if(old('correctAnswer',$question->correct_answer)=='d' ) selected @endif>{{ __('Option D') }}</option>
                                        </select>
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
