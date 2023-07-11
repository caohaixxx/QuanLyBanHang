@extends('layout.master')

@section('addcss')
    <style>
        .cart-name {
            min-width: 250px;
        }

        .cart-color {
            min-width: 120px;
        }
    </style>
@endsection

@section('body')
    @php
        $sum = 0;
    @endphp
    <div class="breadcrumb-area bg-gray-4 breadcrumb-padding-1">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h2>{{ trans('language.cart') }}</h2>
                <ul>
                    <li><a href="{{route('home')}}">{{ trans('language.home') }}</a></li>
                    <li><i class="ti-angle-right"></i></li>
                    <li>{{ trans('language.cart') }}</li>
                </ul>
            </div>
        </div>
        <div class="breadcrumb-img-1">
            <img src="assets/images/banner/breadcrumb-1.png" alt="">
        </div>
        <div class="breadcrumb-img-2">
            <img src="assets/images/banner/breadcrumb-2.png" alt="">
        </div>
    </div>

    @if (isset($carts) && count($carts) > 0)
    <div class="cart-area pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cart-table-content">
                        <div class="table-content table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" name="" id=""></th>
                                        <th class="width-thumbnail"></th>
                                        <th class="cart-name">{{ trans('language.product') }}</th>
                                        <th class="cart-color">{{ trans('language.color') }}</th>
                                        <th class="width-price"> {{ trans('language.price') }}</th>
                                        <th class="width-quantity">{{ trans('language.qty') }}</th>
                                        <th class="width-subtotal">{{ trans('language.subtotal') }}</th>
                                        <th class="width-remove"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($carts as $cart)
                                        <tr>
                                            <td><input type="checkbox" class="check_item" name="check" data-item="{{$cart->cartDetailId}}" id="{{ $cart->cartDetailId }}">
                                            <td class="product-thumbnail">
                                                <a href="{{ route('front.product', ['id' => $cart->product_id]) }}"><img
                                                        src="{{ asset($cart->images) }}" alt=""></a>
                                            </td>
                                            <td class="product-name">
                                                <h5>
                                                    <a
                                                        href="{{ route('front.product', ['id' => $cart->product_id]) }}">{{ $cart->product_name }}</a>
                                                </h5>
                                            </td>
                                            <td class="product-cart-price"><span class="amount">{{ $cart->color }}</span>
                                            </td>
                                            <td class="product-cart-price"><span
                                                    class="amount">{{ number_format($cart->price) }}₫</span></td>
                                            <td class="cart-quality">
                                                <div class="product-quality">
                                                    <input class="cart-plus-minus-box input-text qty text" name="qtybutton"
                                                        value="{{ $cart->quantity }}" data-id="{{ $cart->cartDetailId }}"
                                                        data-price="{{ $cart->price }}" id="qtyCart">
                                                </div>
                                            </td>
                                            @php
                                                $subtotal = $cart->price * $cart->quantity;
                                                $sum += $subtotal;
                                            @endphp
                                            <td class="product-total">
                                                <span class="cart-pro-subtotal">{{ number_format($subtotal) }}₫</span>
                                            </td>

                                            <td class="product-remove">
                                                <form action="{{ route('delete.cart', ['id' => $cart->cartDetailId]) }}"
                                                    method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit">
                                                        <i class=" ti-trash "></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="cart-shiping-update-wrapper">
                                <div class="cart-shiping-update btn-hover">
                                    <a href="{{ route('shop') }}">{{trans('language.continue_shopping')}}</a>
                                </div>
                                <div class="cart-clear-wrap">
                                    <div class="cart-clear btn-hover">
                                    </div>
                                    <div class="cart-clear btn-hover">
                                        <a href="{{ route('destroy.cart') }}">{{trans('language.clear_cart')}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="cart-calculate-discount-wrap mb-40">
                        <h4></h4>
                        <div class="calculate-discount-content">
                            <div class="select-style mb-15">
                            </div>
                            <div class="select-style mb-15">
                            </div>
                            <div class="input-style">
                            </div>
                            <div class="input-style">
                            </div>
                            <div class="calculate-discount-btn btn-hover">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-12">
                    <div class="cart-calculate-discount-wrap mb-40">
                        <h4>Coupon Discount </h4>
                        <div class="calculate-discount-content">
                                @csrf
                                <p>{{trans('language.coupon')}}</p>
                                <div class="input-style">
                                    <input type="text" placeholder="Coupon code" name="coupon_code">
                                </div>
                                <div class="calculate-discount-btn btn-hover">
                                    <a class="btn theme-color add-coupon">{{trans('language.apply_coupon')}}</a>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-12">
                    <div class="grand-total-wrap">

                        <div class="grand-total-content">
                            <h3>{{trans('language.subtotal')}}: <span class="sumCart">0 ₫</span></h3>
                            <div class="grand-shipping">
                                <span
                                    style="display: flex;
                                justify-content: space-between;">{{trans('language.discount')}}:
                                    <span class="value-coupon">0 ₫</span></span>
                            </div>
                            <div class="grand-total">
                                <h4>{{trans('language.total')}} <span class="total-coupon">0 ₫</span></h4>
                            </div>
                        </div>
                        @php
                            $request = request();
                        @endphp
                        <div class="grand-total-btn btn-hover">
                            <a href="{{route('checkout')}}" class="btn theme-color submit-cp">{{trans('language.checkout')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@else
<div class="cart-area pt-100 pb-100">
<div class="container">
    <div class="row align-items-center flex-row-reverse">
        <div class="col-lg-12">
            <div class="about-content" style="display: flex; flex-direction: column;align-items: center;">
                <h3>{{trans('language.not_cart_item') }}</h3>
                <p>{{trans('language.please_add_product') }}</p>
                <img class="" src="{{ asset('/images/empty-cart.png') }}"alt="">
            </div>
        </div>
    </div>
</div>
</div>
@endif
@endsection

@section('addjs')
    <script src="{{ asset('assets/js/cart.js') }}"></script>
@endsection
