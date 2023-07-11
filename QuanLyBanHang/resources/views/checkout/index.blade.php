@extends('layout.master')

@section('addcss')
@endsection

@section('body')
    @include('partials.banner', ['item' => 'Thanh toán'])
    <div class="checkout-main-area pb-100 pt-100">
        <div class="container">
            <div class="customer-zone mb-20">
                <div class="checkout-wrap pt-30">
                    <form action="{{ route('checkout.addorder') }}" method="post" class="checkoutVali">
                        @csrf
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="billing-info-wrap">
                                    <h3>{{trans('language.order_detail')}}</h3>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="billing-info mb-20">
                                                <label>{{trans('language.full_name')}} <abbr class="required" title="required">*</abbr></label>
                                                <input type="text" name="fullname">
                                                @error('fullname')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <div class="billing-info mb-20">
                                                <label>{{trans('language.number_phone')}} <abbr class="required" title="required">*</abbr></label>
                                                <input type="text" name="phone">
                                                @error('phone')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <div class="billing-info mb-20">
                                                <label>{{trans('language.email')}} <abbr class="required"
                                                        title="required">*</abbr></label>
                                                <input type="email" name="email">
                                                @error('email')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="billing-select select-style mb-20">
                                                <label>Tỉnh/ Thành phố <abbr class="required" title="required">*</abbr></label>
                                                <select class="select-two-active choose city" name="city" id="city">
                                                    <option value="">-Select city-</option>
                                                    @foreach ($cities as $key => $city)
                                                        <option name="namecity" value="{{ $city->matp }}">
                                                            {{ $city->name_city }}</option>
                                                    @endforeach
                                                </select>
                                                @error('city')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="billing-select select-style mb-20">
                                                <label>Quận/ Huyện <abbr class="required" title="required">*</abbr></label>
                                                <select class="select-two-active choose district " name="district"
                                                    id="district">
                                                    <option name="namedistrict" value="">-Select district-</option>
                                                </select>
                                                @error('district')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="billing-select select-style mb-20">
                                                <label>Phường/ Xã <abbr class="required" title="required">*</abbr></label>
                                                <select class="select-two-active wards" id="wards" name="wards">
                                                    <option name="namewards" value="">-Select wards-</option>
                                                </select>
                                                @error('wards')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="billing-info mb-20">
                                                <label>{{trans('language.address_detail')}}<abbr class="required"
                                                        title="required">*</abbr></label>
                                                <input class="billing-address" placeholder="" type="text" name="address">
                                                @error('address')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="additional-info-wrap">
                                        <label>{{trans('language.note')}}</label>
                                        <textarea placeholder="" name="message" name="note"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="your-order-area">
                                    <h3>{{trans('language.your_order')}}</h3>
                                    <div class="your-order-wrap gray-bg-4">
                                        <div class="your-order-info-wrap">
                                            <div class="your-order-info">
                                                <ul>
                                                    <li>{{trans('language.product')}} <span>{{trans('language.price')}}</span></li>
                                                </ul>
                                            </div>
                                            @php
                                                $sum = 0;
                                            @endphp
                                            <div class="your-order-middle">
                                                <ul>
                                                </ul>
                                            </div>
                                            <div class="your-order-info order-subtotal">
                                                <ul>
                                                    <li>{{trans('language.subtotal')}} <span>{{ number_format($sum) }}₫ </span></li>
                                                </ul>
                                            </div>
                                            <div class="your-order-info order-shipping">
                                                <ul>
                                                    <li>{{trans('language.discount')}} <p>0 ₫</p>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="your-order-info order-total">
                                                <ul>
                                                    <li>{{trans('language.total')}} <span class="total-checkout">0 ₫ </span></li>
                                                    <input name="total" type="hidden" value="">
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="payment-method">
                                            <div class="pay-top sin-payment">
                                                <input id="payment-method-2" class="input-radio" type="radio"
                                                    value="1" name="payment_method" checked>
                                                <label for="payment-method-2">Thanh toán khi nhận hàng</label>
                                            </div>
                                            <div class="pay-top sin-payment">
                                                <input id="payment-method-3" class="input-radio" type="radio"
                                                    value="2" name="payment_method">
                                                <label for="payment-method-3">Chuyển khoản </label>
                                            </div>
                                            <div class="pay-top sin-payment sin-payment-3">
                                                <input id="payment-method-4" class="input-radio" type="radio"
                                                    value="3" name="payment_method">
                                                <label for="payment-method-4">PayPal <img alt=""
                                                        src="assets/images/icon-img/payment.png"></label>
                                                <div class="payment-box payment_method_bacs">
                                                    <div id="paypal-button-container"></div>
                                                    @php
                                                        $vnd = 90;
                                                    @endphp
                                                    <div id="paypal-button-container"></div>
                                                    <input name="vnd" type="hidden" id="vnd" value="1">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="Place-order btn-hover">
                                        <button type="submit">{{trans('language.place_order')}}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('addjs')
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/checkout.js') }}"></script>
    
@endsection
