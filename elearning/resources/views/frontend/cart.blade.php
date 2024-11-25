@extends('frontend.layouts.app')
@section('title', 'Cart')
@section('body-attr')style="background-color: #ebebf2;"@endsection

@section('content')
<!-- Breadcrumb Starts Here -->
<div class="py-0">
    <div class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb align-items-center bg-transparent mb-0">
                <li class="breadcrumb-item"><a href="{{route('home')}}" class="fs-6 text-secondary">{{ __('Homepage') }}</a></li>
                <li class="breadcrumb-item active"><a href="cart.html" class="fs-6 text-secondary">{{ __('Cart') }}</a></li>
            </ol>
        </nav>
    </div>
</div>
<!-- Breadcrumb Ends Here -->

<!-- Cart Section Starts Here -->
<section class="section cart-area pb-0">
    <div class="container">
        @if (session('cart'))
        <div class="row">
            <div class="col-lg-8">
                <h6 class="cart-area__label">{{count(session('cart', []))}} {{__('Courses in Cart')}}</h6>
                @php $total = 0 @endphp
                @if (session('cart'))
                @foreach (session('cart') as $id => $details)
                @php $total += $details['price'] * $details['quantity'] @endphp
                <div class="cart-wizard-area">
                    <div class="image">
                        <img src="{{asset('public/uploads/courses/' . $details['image'])}}" alt="course image" />
                    </div>
                    <div class="text">
                        <h6><a href="{{route('courseDetails', encryptor('encrypt', $id))}}">{{$details['title_en']}}</a>
                        </h6>
                        <p>{{"Instructor"}} <a href="{{route('instructorProfile', encryptor('encrypt', $details['instructor_id']))}}">{{$details['instructor']}}</a></p>
                        <p><a>
                                @switch($details['typepayment'])
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
                            </a></p>
                        <div class="bottom-wizard d-flex justify-content-between align-items-center">
                            <p>
                                {{$details['price'] ? 'Bs' . $details['price'] : __('Free')}}
                            </p>
                            <div class="trash-icon">
                                <a href="#" class="remove-from-cart" data-id="{{$id}}">
                                    <i class="far fa-trash-alt remove-from-cart"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
            <div class="col-lg-4">
                <h6 class="cart-area__label">{{__('Summary')}}</h6>
                <div class="summery-wizard">
                    <div class="summery-wizard-text pt-0">
                        <h6>{{__('Subtotal')}}</h6>
                        <p> {{'Bs' . number_format((float) session('cart_details')['cart_total'] , 2)}}</p>
                    </div>
                    <div class="summery-wizard-text">
                        <h6>{{__('Coupon Discount')}} ({{session('cart_details')['discount'] ?? 0.00}}%)</h6>
                        <p>{{'Bs' . number_format((float) isset(session('cart_details')['discount_amount']) ? session('cart_details')['discount_amount']: 0.00 , 2)}}</p>
                    </div>
{{--                    <div class="summery-wizard-text">--}}
{{--                        <h6>{{__('Taxes (15%)')}}</h6>--}}
{{--                        <p> {{'৳' . number_format((float) session('cart_details')['tax'] , 2)}}</p>--}}
{{--                    </div>--}}
                    <div class="total-wizard">
                        <h6 class="font-title--card">{{__('Total:')}}</h6>
                        <p class="font-title--card">{{'Bs' . number_format((float) session('cart_details')['total_amount'] , 2)}}</p>
                    </div>
                    <form action="{{route('coupon_check')}}" method="post">
                        @csrf
                        <a href="{{route('checkout')}}"
                            class="button button-lg button--primary form-control mb-lg-3">{{__('Checkout')}}</a>
                        <label for="coupon">{{__('Apply Coupon')}}</label>
                        <div class="cart-input">
                            <input type="text" name="coupon" class="form-control" placeholder="{{__('Coupon Code')}}" id="coupon" />
                            <button type="submit" class="sm-button">{{__('Apply')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @else
        <section class="section cart-area pb-0">
            <div class="container text-center">
                <h1>{{__('Your Cart is Empty')}}</h1>
                <h5>{{__('No Courses in Your Cart Yet')}}</h5>
            </div>
        </section>
        @endif
    </div>
</section>
<!-- Cart Section Ends Here -->
@endsection


@push('scripts')
<script>
    $(".remove-from-cart").click(function(e) {
            e.preventDefault();

            var ele = $(this);

            if (confirm("Are you sure want to remove?")) {
                $.ajax({
                    url: '{{route('remove.from.cart')}}',
                    method: "DELETE",
                    data: {
                        _token: '{{csrf_token()}}',
                        id: ele.data('id') // Use data-id attribute
                    },
                    success: function(response) {
                        window.location.reload();
                    }
                });
            }
        });
</script>
@endpush
