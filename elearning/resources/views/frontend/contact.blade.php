@extends('frontend.layouts.app')
@section('title', 'Contact Us')
@section('header-attr') class="nav-shadow" @endsection

@section('content')

<!-- Breadcrumb Starts Here -->
<div class="py-0 section--bg-white">
    <div class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb pb-0 mb-0">
                <li class="breadcrumb-item"><a href="{{route('home')}}" class="fs-6 text-secondary">{{__('Homepage')}}</a></li>
                <li class="breadcrumb-item active"><a href="{{route('contact')}}" class="fs-6 text-secondary">{{__('Contact')}}</a></li>
            </ol>
        </nav>
    </div>
</div>
<!-- Breadcrumb Ends Here -->

<!-- Contact Hero Area Starts Here -->
<section class="section section--bg-white hero hero--one">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="hero__img-content">
                    <div class="hero__img-content--main">
                        <img src="{{asset('public/frontend/dist/images/contact/image.jpg')}}" alt="image" />
                    </div>
                    <img src="{{asset('public/frontend/dist/images/shape/dots/dots-img-02.png')}}" alt="shape"
                        class="hero__img-content--shape-01" />
                    <img src="{{asset('public/frontend/dist/images/shape/rec05.png')}}" alt="shape"
                        class="hero__img-content--shape-02" />
                </div>
            </div>
            <div class="col-lg-6">
                <div class="hero__content-info">
                    <h2 class="font-title--md mb-0">{{__('Our Branches')}}</h2>
                    <p class="font-para--lg">
                        {{__('At iLearn Academy, we are proud to have a global presence with branches located in various regions. Each branch is dedicated to delivering quality education and support tailored to the local communitys needs. Whether you are looking for in-person classes, workshops, or online courses, our branches are equipped to provide a comprehensive learning experience.')}}
                    </p>
                    <ul class="hero__content-location">
                        <li>
                            <span><i class="fas fa-map-marker-alt fa-2x"></i></span>
                            <p>{{__('Cochabamba')}}</p>
                        </li>
                        <li>
                            <span><i class="fas fa-map-marker-alt fa-2x"></i></span>
                            <p>{{__('La Paz')}}</p>
                        </li>
                        <li>
                            <span><i class="fas fa-map-marker-alt fa-2x"></i></span>
                            <p>{{__('Santa Cruz')}}</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Get in Touch Area Starts Here -->
<section class="section getin-touch overflow-hidden"
    style="background-image: url({{asset('public/frontend/dist/images/contactController/bg.png')}});">
    <div class="container">
        <div class="row">
            <h2 class="font-title--md text-center">{{__('Get in Touch')}}</h2>
            <div class="col-lg-5 pe-lg-4 position-relative mb-4 mb-lg-0">
                <div class="contact-feature d-flex align-items-center">
                    <div class="contact-feature-icon primary-bg">
                     <i class="fas fa-map-marked-alt fa-2x"></i>
                    </div>
                    <div class="contact-feature-text">
                        <h6>{{__('Address')}}</h6>
                        <p>P. Sherman Calle Wallaby</p>
                        <p>#42, Sidney</p>
                    </div>
                </div>

                <div class="contact-feature d-flex align-items-center my-lg-4 my-3">
                    <div class="contact-feature-icon tertiary-bg">
                        <i class="far fa-envelope fa-2x"></i>
                    </div>
                    <div class="contact-feature-text">
                        <h6>{{__('Email')}}</h6>
                        <h5>ilearning-academy@gmail.com</h5>
                    </div>
                </div>

                <div class="contact-feature d-flex align-items-center">
                    <div class="contact-feature-icon success-bg">
                       <i class="fas fa-phone-alt fa-2x"></i>
                    </div>
                    <div class="contact-feature-text">
                        <h6>{{__('Phone')}}</h6>
                        <h5>+1202-555-0621</h5>
                    </div>
                </div>
                <img src="{{asset('public/frontend/dist/images/shape/dots/dots-img-03.png')}}" alt="Shape"
                    class="img-fluid contact-feature-shape" />
            </div>
            <div class="col-lg-7 form-area">
                <form action="#">
                    <div class="row g-3">
                        <div class="col-lg-6">
                            <label for="name">{{__('Name')}}</label>
                            <input type="text" class="form-control form-control--focused" placeholder="{{__('Type here...')}}"
                                id="name" />
                        </div>
                        <div class="col-lg-6">
                            <label for="email">{{__('Email')}}</label>
                            <input type="email" class="form-control" placeholder="{{__('Type here...')}}" id="email" />
                        </div>
                    </div>
                    <div class="row my-lg-2 my-2">
                        <div class="col-12">
                            <label for="subject">{{__('Subject')}}</label>
                            <input type="text" id="subject" class="form-control" placeholder="{{__('Type here...')}}" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label for="message">{{__('Messages')}}</label>
                            <textarea id="message" placeholder="{{__('Type here...')}}" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="text-end">
                            <button type="submit" class="button button-lg button--primary fw-normal">{{__('Send Message')}}</button>
                        </div>
                    </div>
                </form>
                <div class="form-area-shape">
                    <img src="{{asset('public/frontend/dist/images/shape/circle3.png')}}" alt="Shape"
                        class="img-fluid shape-01" />
                    <img src="{{asset('public/frontend/dist/images/shape/circle5.png')}}" alt="Shape"
                        class="img-fluid shape-02" />
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Get in Touch Area Ends Here -->

<!-- Map Area Starts Here -->
<div class="map-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="map-area-frame">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d1694.7385826167244!2d-66.15760774669558!3d-17.388931919022227!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2sbo!4v1730619901137!5m2!1ses!2sbo" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Map Area Ends Here -->

@endsection
