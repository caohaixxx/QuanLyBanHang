@extends('layout.master')

@section('addcss')
    <style>
        .cart-name {
            min-width: 250px;
        }

        .cart-color {
            min-width: 120px;
        }
        .info{
            font-weight: bold;
            font-size: 20px
        }
        .infomation{
            font-weight: normal;
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
                <h2>Chi tiết lịch sử đơn hàng</h2>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><i class="ti-angle-right"></i></li>
                    <li>Chi tiết lịch sử đơn hàng</li>
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
    @dump($details)

    <div class="cart-area pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cart-table-content">
                        <div class="table-content table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="width-thumbnail text-center"></th>
                                        <th class="cart-name ">Product</th>
                                        <th class="cart-color text-center">Color</th>
                                        <th class="width-price text-center "> Price</th>
                                        <th class="cart-color text-center">Quantity</th>
                                        <th class="width-subtotal text-center">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($details as $detail)
                                        <tr>
                                            <td class="product-thumbnail text-center">
                                                @php
                                                    $images = App\Models\Product::find($detail->product_id);
                                                @endphp
                                                <a
                                                    href="{{ route('front.product', ['id' => $detail->product_detail_id]) }}">
                                                    <img src="{{ asset($images->images[0]) }}" alt="">
                                                </a>
                                            </td>
                                            <td class="product-name">
                                                <h5>
                                                    <a
                                                        href="{{ route('front.product', ['id' => $detail->product_detail_id]) }}">{{ $detail->product_name }}</a>
                                                </h5>
                                            </td>
                                            <td class="product-cart-price text-center"><span
                                                    class="amount">{{ $detail->color }}</span>
                                            </td>
                                            <td class="product-cart-price text-center">
                                                <span class="amount">{{ number_format($detail->price) }}₫</span>
                                            </td>
                                            <td class="text-center">
                                                <span class="text-center">{{ $detail->quantity }}</span>
                                            </td>
                                            @php
                                                $subtotal = $detail->price * $detail->quantity;
                                                $sum += $subtotal;
                                            @endphp
                                            <td class="product-total text-center">
                                                <span class="cart-pro-subtotal">{{ number_format($sum) }}₫</span>
                                            </td>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="cart-shiping-update-wrapper">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="grand-total-wrap">
                        <div class="grand-total-content">
                            <div class="contact-us-info-wrap mb-30 aos-init aos-animate" data-aos="fade-up" data-aos-delay="400">
                                <div class="contact-us-info">
                                    <p>{{trans('language.address')}}:</p>
                                    <span>{{ $historyDetail->address }}, {{ $historyDetail->name_ward }}, <br>
                                        {{ $historyDetail->name_district }}, {{ $historyDetail->name_city }}</span>
                                </div>
                                <div class="contact-us-info">
                                    <p>{{trans('language.number_phone')}}:</p>
                                    <span>{{$historyDetail->phone}}</span>
                                </div>
                                <div class="contact-us-info">
                                    <p>{{trans('language.email')}}:</p>
                                    <span>{{$historyDetail->email}}</span>
                                </div>
                                <div class="contact-us-info">
                                    <p>{{trans('language.payments')}}:</p>
                                    <span>{!! \App\Models\Order::checkPaymets($historyDetail->payments) !!}</span>
                                </div>
                                <div class="contact-us-info">
                                    <p>{{trans('language.status')}}:</p>
                                    <span>{!! \App\Models\Order::checkStatus($historyDetail->status) !!}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-12">
                    <div class="cart-calculate-discount-wrap mb-40">
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-12">
                    <div class="grand-total-wrap">
                        @php
                            $coupon = App\Models\Coupon::find($historyDetail->coupon_id);
                            if($coupon){
                            $coupon = $coupon->value;
                            }
                        @endphp
                        <div class="grand-total-content">
                            <h3>Subtotal: <span class="sumCart">{{ number_format($sum) }}₫</span></h3>
                            <div class="grand-shipping">
                                <span style="display: flex; justify-content: space-between;">Discount:
                                    <span class="value-coupon">{{ number_format(($sum * $coupon) / 100) }}₫</span></span>
                            </div>
                            <div class="grand-total">
                                <h4>Total <span class="total-coupon">{{ number_format($sum - ($sum * $coupon) / 100) }}₫</span>
                                </h4>
                            </div>
                        </div>
                        <div class="grand-total-btn btn-hover">
                            <a class="btn theme-color submit-cp">Mua lại</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('addjs')
@endsection
