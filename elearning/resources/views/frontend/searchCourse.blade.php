@extends('frontend.layouts.app')
@section('title', 'Courses')
@section('body-attr') style="background-color: #ebebf2;" @endsection

@push('styles')
<link rel="stylesheet" href="{{asset('public/frontend/src/scss/vendors/plugin/css/jquery-ui.css')}}" />
@endpush

@section('content')
<!-- Breadcrumb Starts Here -->
<div class="event-sub-section event-sub-section--spaceY eventsearch-sub-section">
    <div class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb align-items-center bg-transparent p-0 mb-0">
                <li class="breadcrumb-item">
                    <a href="{{route('home')}}" class="fs-6 text-secondary">{{__('Homepage')}}</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{route('searchCourse')}}" class="fs-6 text-secondary">{{__('Courses')}}</a>
                </li>
            </ol>
        </nav>
    </div>
</div>
<!-- Breadcrumb Ends Here -->

<!-- Event Search Starts Here -->
<section class="section event-search">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 mx-auto">
                <div class="event-search-bar">
                    <form action="{{ route('home.Search') }}" method="post">
                        @csrf
                        <div class="form-input-group">
                            <input type="text" id="search" name="search" class="form-control" placeholder="{{__('Search Course...')}}" />
                            <button class="button button-lg button--primary" type="submit" id="button-addon2">
                                {{__('Search')}}
                            </button>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-search">
                                <circle cx="11" cy="11" r="8"></circle>
                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                            </svg>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 d-none d-lg-block">
                <div class="accordion sidebar-filter" id="sidebarFilter">
                    <!-- Search by Category  -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="categoryAcc">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#categoryCollapse" aria-expanded="true"
                                aria-controls="categoryCollapse">
                                {{__('Category')}}
                            </button>
                        </h2>
                        <div id="categoryCollapse" class="accordion-collapse collapse show"
                            aria-labelledby="categoryAcc" data-bs-parent="#sidebarFilter">
                            <div class="accordion-body">
                                <form action="{{route('searchCourse')}}" method="get">
                                    @csrf
                                    <div class="accordion-body__item">
                                        <div class="check-box">
                                            <input type="checkbox" class="checkbox-primary" name="category" value=""
                                                {{!$selectedCategories ? 'checked' : '' }}>
                                            <label> {{__('All')}} </label>
                                        </div>
                                        <p class="check-details">
                                            {{$allCourse->count()}}
                                        </p>
                                    </div>
                                    @forelse($category as $cat)
                                    @php
                                    $courseCount = $cat->course()->where('status', 2)->count();
                                    @endphp
                                    <div class="accordion-body__item">
                                        <div class="check-box">
                                            <input type="checkbox" class="checkbox-primary" name="categories[]" value="{{ $cat->id }}" {{ in_array($cat->id,
                                            (array)$selectedCategories) ? 'checked' : '' }}>
                                            <label> {{$cat->category_name}} </label>
                                        </div>
                                        <p class="check-details">
                                            {{$courseCount}}
                                        </p>
                                    </div>
                                    @empty
                                    @endforelse
                                    <button type="submit" class="btn btn-primary">{{__('Apply Filter')}}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Search by Level  -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="levelAcc">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#levelCollapse" aria-expanded="false" aria-controls="levelCollapse">
                                {{__('Level')}}
                            </button>
                        </h2>
                        <div id="levelCollapse" class="accordion-collapse collapse" aria-labelledby="levelAcc"
                            data-bs-parent="#sidebarFilter">
                            <div class="accordion-body">
                                <form action="{{route('searchCourse')}}" method="get">
                                    @csrf
                                    <div class="accordion-body__item">
                                        <div class="check-box">
                                            <input type="checkbox" class="checkbox-primary" name="difficulty" value=""
                                                {{!$selectedDifficulty ? 'checked' : '' }}>
                                            <label> {{__('All')}} </label>
                                        </div>
                                        <p class="check-details">
                                            {{$allCourse->count()}}
                                        </p>
                                    </div>
                                    @forelse($DifficultyAll as $diff)
                                        <div class="accordion-body__item">
                                            <div class="check-box">
                                                <input type="checkbox" class="checkbox-primary" name="difficulty[]" value="{{ $diff->difficulty }}"
                                                    {{ in_array($diff->difficulty, (array) $selectedDifficulty, true) ? 'checked' : '' }}>
                                                <label> @switch($diff->difficulty)
                                                        @case('beginner')
                                                            {{ __('Beginner') }}
                                                            @break
                                                        @case('intermediate')
                                                            {{ __('Intermediate') }}
                                                            @break
                                                        @case('advanced')
                                                            {{ __('Advanced') }}
                                                            @break
                                                        @default
                                                            {{ __('unknown') }} <!-- Opcional: si no se encuentra un valor de dificultad -->
                                                    @endswitch </label>
                                            </div>
                                            <p class="check-details">
                                                {{$diff->count}} <!-- Muestra el conteo de cursos para esta dificultad -->
                                            </p>
                                        </div>
                                    @empty
                                    @endforelse
                                    <button type="submit" class="btn btn-primary">{{__('Apply Filter')}}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Search by Typepayment  -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="levelAcc">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#TypepaymentCollapse" aria-expanded="false" aria-controls="TypepaymentCollapse">
                                {{__('Typepayment')}}
                            </button>
                        </h2>
                        <div id="TypepaymentCollapse" class="accordion-collapse collapse" aria-labelledby="levelAcc"
                             data-bs-parent="#sidebarFilter">
                            <div class="accordion-body">
                                <form action="{{ route('searchCourse') }}" method="get">
                                    @csrf
                                    <div class="accordion-body__item">
                                        <div class="check-box">
                                            <input type="checkbox" class="checkbox-primary" name="typepayment" value=""
                                                {{ !$selectedTypepayment ? 'checked' : '' }}>
                                            <label>{{ __('All') }}</label>
                                        </div>
                                        <p class="check-details">
                                            {{ $allCourse->count() }}
                                        </p>
                                    </div>
                                    @forelse($TypepaymentAll as $type)
                                        <div class="accordion-body__item">
                                            <div class="check-box">
                                                <input type="checkbox" class="checkbox-primary" name="typepayment[]" value="{{ $type['typepayment_id'] }}"
                                                    {{ in_array($type['typepayment_id'], (array) $selectedTypepayment, true) ? 'checked' : '' }}>
                                                <label>@switch($type['typepayment_plan'])
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
                                                    @endswitch</label>
                                            </div>
                                            <p class="check-details">
                                                {{ $type['count'] }} <!-- Muestra el conteo de cursos para esta modalidad -->
                                            </p>
                                        </div>
                                    @empty
                                    @endforelse
                                    <button type="submit" class="btn btn-primary">{{ __('Apply Filter') }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="event-search-results">
                    <div class="event-search-results-heading">
{{--                        <div class="nice-select" tabindex="0">--}}
{{--                            <span class="current">{{__('Most Viewed')}}</span>--}}
{{--                            <ul class="list">--}}
{{--                                <li data-value="Nothing" data-display="category" class="option selected focus">--}}
{{--                                    {{__('Nothing')}}--}}
{{--                                </li>--}}
{{--                                <li data-value="1" class="option">{{__('Some option')}}</li>--}}
{{--                                <li data-value="2" class="option">{{__('Another option')}}</li>--}}
{{--                                <li data-value="4" class="option">Potato</li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
                        <p>{{$course->count()}} {{__('results found.')}}</p>
                        <button class="button button-lg button--primary button--primary-filter d-lg-none" id="filter">
                            <span>
                                <svg width="19" height="16" viewBox="0 0 19 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3.3335 14.9999V9.55554" stroke="white" stroke-width="1.7"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M3.3335 6.4444V1" stroke="white" stroke-width="1.7" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                    <path d="M9.55469 14.9999V8" stroke="white" stroke-width="1.7"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M9.55469 4.88886V1" stroke="white" stroke-width="1.7"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M15.7773 14.9999V11.1111" stroke="white" stroke-width="1.7"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M15.7773 7.99995V1" stroke="white" stroke-width="1.7"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M1 9.55554H5.66663" stroke="white" stroke-width="1.7"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M7.22217 4.88867H11.8888" stroke="white" stroke-width="1.7"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M13.4443 11.1111H18.111" stroke="white" stroke-width="1.7"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </span>
                            {{__('Filter')}}
                        </button>
                    </div>
                </div>

                {{-- Courses --}}
                <div class="row event-search-content">
                    @forelse ($filteredCourses  as $c)
                    <div class="col-md-6 mb-4">
                        <div class="contentCard contentCard--course">
                            <div class="contentCard-top">
                                <a href="{{route('courseDetails', encryptor('encrypt', $c->id))}}"><img
                                        src="{{asset('public/uploads/courses/'.$c->image)}}" alt="images"
                                        class="img-fluid" /></a>
                            </div>
                            <div class="contentCard-bottom">
                                <h5>
                                    <a href="{{route('courseDetails', ['id' => encryptor('encrypt', $c->id)])}}"
                                        class="font-title--card">{{$c->title_en}}</a>
                                </h5>
                                <div class="contentCard-info d-flex align-items-center justify-content-between">
                                    <a href="{{route('instructorProfile', encryptor('encrypt', $c->instructor?->id))}}"
                                        class="contentCard-user d-flex align-items-center">
                                        <img src="{{asset('public/uploads/users/'.$c->instructor?->image)}}"
                                            alt="Instructor Image" class="rounded-circle" height="34" width="34" />
                                        <p class="font-para--md">{{$c->instructor->name .' '. $c->instructor->lastname}}</p>
                                    </a>
                                    <div class="price">
                                        @php
                                            $subscriptionPrice = $c->full_course_subscription
                                                ?? $c->annual_subscription
                                                ?? $c->weekly_subscription
                                                ?? $c->daily_subscription
                                                ?? __('Free');
                                        @endphp
                                        {{$subscriptionPrice !== __('Free') ? 'Bs'.$subscriptionPrice : $subscriptionPrice}}
{{--                                        <del>{{$c->old_price?'Bs'.$c->old_price:''}}</del>--}}
                                    </div>
                                </div>
                                <div class="contentCard-more">
                                    <div class="d-flex align-items-center">
                                        <div class="icon">
                                            <img src="{{asset('public/frontend/dist/images/icon/star.png')}}"
                                                alt="star" />
                                        </div>
                                        <span>
                                        @switch($c->difficulty)
                                                @case('beginner')
                                                    {{ __('Beginner') }}
                                                    @break
                                                @case('intermediate')
                                                    {{ __('Intermediate') }}
                                                    @break
                                                @case('advanced')
                                                    {{ __('Advanced') }}
                                                    @break
                                                @default
                                                    {{ __('unknown') }} <!-- Opcional: si no se encuentra un valor de dificultad -->
                                            @endswitch
                                    </span>
                                    </div>

                                    <div class="book d-flex align-items-center">
                                        <div class="icon">
                                            <img src="{{asset('public/frontend/dist/images/icon/book.png')}}"
                                                alt="location" />
                                        </div>
                                        <span>{{$c->lesson == null? 0 :$c->lesson }} {{__('Lessons')}}</span>
                                    </div>
                                    <div class="clock d-flex align-items-center">
                                        <div class="icon">
                                            <img src="{{asset('public/frontend/dist/images/icon/Clock.png')}}"
                                                alt="clock" />
                                        </div>
                                        <span>{{$c->duration == null? 0 : $c->duration}} {{__('Hours')}}</span>
                                    </div>
                                </div>
                                <div class="contentCard-more" style="place-content: center;">
                                <div class="eye d-flex align-items-center" >
                                    <div class="icon">
                                        <img src="{{asset('public/frontend/dist/images/icon/eye.png')}}"
                                             alt="eye" />
                                    </div>
                                    <span> @switch($c->typepayment->typepayment_plan)
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
                                        @endswitch
                                            </span>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-md-6 mb-4">
                        <div class="contentCard contentCard--course">
                            <h3>{{__('No Course Found')}}</h3>
                        </div>
                    </div>
                    @endforelse
                </div>

                <div class="pagination-group mt-lg-5 mt-2">
                    <a href="#" class="p_prev">
                        <svg xmlns="http://www.w3.org/2000/svg" width="9.414" height="16.828"
                            viewBox="0 0 9.414 16.828">
                            <path data-name="Icon feather-chevron-left" d="M20.5,23l-7-7,7-7"
                                transform="translate(-12.5 -7.586)" fill="none" stroke="#1a2224" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2"></path>
                        </svg>
                    </a>
                    <a href="#!1" class="cdp_i active">01</a>
                    <a href="#!2" class="cdp_i">02</a>
                    <a href="#!3" class="cdp_i">03</a>

                    <a href="#!+1" class="p_next">
                        <svg width="10" height="16" viewBox="0 0 10 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.5 1L8.5 8L1.5 15" stroke="#35343E" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection


@push('scripts')
<script src="{{asset('public/frontend/src/scss/vendors/plugin/js/price_range_script.js')}}"></script>
<script src="{{asset('public/frontend/src/scss/vendors/plugin/js/jquery-ui.min.js')}}"></script>
<script>
    const filterBtn = document.querySelector("#filter");
            const cross = document.querySelector(".filter--cross");

            filterBtn.addEventListener("click", function () {
                let sidebar = document.querySelector(".filter-sidebar");
                sidebar.classList.toggle("active");
            });

            cross.addEventListener("click", function () {
                let sidebar = document.querySelector(".filter-sidebar");
                sidebar.classList.remove("active");
            });
</script>

@endpush
