@extends('layout.master')

@section('addcss')
@endsection

@section('body')
@include('partials.banner', ['item' => 'Đăng nhập'])
    <div class="login-register-area pb-100 pt-95">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 offset-lg-2">
                    <div class="login-register-wrapper">
                        <div class="login-register-tab-list nav">
                            <a class="active" href="{{ route('customer.auth') }}">
                                <h4> login </h4>
                            </a>
                            <a href="{{ route('customer.viewRegister') }}">
                                <h4> register </h4>
                            </a>
                        </div>
                        <div class="tab-content">
                            <div id="lg1" class="tab-pane active">
                                <div class="login-form-container">
                                    @error('error')
                                        <div class="alert alert-danger text-center" id="login-alert" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <div class="login-register-form">
                                        <form action="{{ route('customer.login') }}" method="post" class="customerLoginVali">
                                            @csrf
                                            <input type="text" name="email" placeholder="Email">
                                            @error('email')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                            <input type="password" name="password" placeholder="Password">
                                            @error('password')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror

                                            <input type="hidden" name="redirectTo" value="{{ url()->previous() }}">
                                            <div class="login-toggle-btn">
                                                <input type="checkbox">
                                                <label>Remember me</label>
                                                <a href="#">Forgot Password?</a>
                                            </div>
                                            <div class="button-box btn-hover">
                                                <button type="submit">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('addjs')
    <script src="{{ asset('assets/js/vendor/bootstrap.min.js') }}"></script>
    <script type="text/javascript">
        $("#login-alert").fadeTo(2000, 500).slideUp(500, function() {
            $("#login-alert").slideUp(500);
        });
    </script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{asset('assets/js/customerLogin.js')}}"></script>

@endsection
