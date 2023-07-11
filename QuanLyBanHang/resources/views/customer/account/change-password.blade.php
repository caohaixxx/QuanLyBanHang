<div class="tab-pane fade" id="password_change" role="tabpanel">
    <div class="myaccount-content">
        <h3>{{trans('language.change_password')}}</h3>
        <div class="account-details-form">
            <form action="{{route("customer.changePasswword")}}" method="POST">
                @csrf
                    <div class="single-input-item">
                        <label for="current-pwd" class="required">{{trans('language.current_password')}}</label>
                        <input type="password" name="current_password" required/>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="single-input-item">
                                <label for="new-pwd" class="required">{{trans('language.new_password')}}</label>
                                <input type="password" name="new_password" required id="password"/>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="single-input-item">
                                <label for="confirm-pwd" class="required">{{trans('language.confirm_password')}}</label>
                                <input type="password" name="confirm_password" required id="confirm_password"/>
                            </div>
                        </div>
                    </div>
                <div class="single-input-item btn-hover">
                    <button type="submit" class="check-btn sqr-btn">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>