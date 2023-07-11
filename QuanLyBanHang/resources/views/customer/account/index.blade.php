@extends('layout.master')

@section('addcss')
@endsection

@section('body')
@include('partials.banner', ['item' => 'Tài khoản'])
    <div class="my-account-wrapper pb-100 pt-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- My Account Page Start -->
                    <div class="myaccount-page-wrapper">
                        <!-- My Account Tab Menu Start -->
                        <div class="row">
                            @include('customer.partials.tab-account')
                            <!-- My Account Tab Menu End -->
                            <div class="col-lg-9 col-md-8">
                                <div class="tab-content" id="myaccountContent">
                                    <!-- Dashboard -->
                                    @include('customer.account.dashboard')
                                    <!-- Dashboard End -->
                                    <!-- Account Detail -->
                                    @include('customer.account.account-detail')
                                    <!-- Account Detail End-->
                                    <!-- Address -->
                                    @include('customer.account.address')
                                    <!-- Address End-->
                                    <!-- Order-->
                                    @include('customer.account.history')
                                    <!-- Order End-->
                                    @include('customer.account.change-password')
                                </div>
                            </div>
                        </div>
                    </div> <!-- My Account Page End -->
                </div>
            </div>
        </div>
    </div>
@endsection
@section('addjs')
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/account.js') }}"></script>
@endsection
