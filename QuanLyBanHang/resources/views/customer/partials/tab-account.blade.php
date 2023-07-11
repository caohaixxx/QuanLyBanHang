<div class="col-lg-3 col-md-4">
    <div class="myaccount-tab-menu nav" role="tablist">
        <a href="#dashboad" class="active" data-bs-toggle="tab">Dashboard</a>
        <a href="#account_info" id="account" data-bs-toggle="tab">{{trans('language.account_detail')}}</a>
        <a href="#address-edit" data-bs-toggle="tab">{{trans('language.address')}}</a>
        <a href="#orders" data-bs-toggle="tab">{{trans('language.order_history')}}</a>
        <a href="#password_change" data-bs-toggle="tab">{{trans('language.change_password')}}</a>
        <a href="login-register.html">{{trans('language.logout')}}</a>
    </div>
    <input name="href-tab" type="hidden" value="{{session('tab')}}">
</div>