<div class="tab-pane fade" id="account_info" role="tabpanel">
    <div class="myaccount-content">
        <h3>{{trans('language.account_detail')}}</h3>
        <div class="account-details-form">
            <form action="{{route('customer.updateAccount')}}" method="POST" class="accountInfoVali">
                @csrf
                <div class="single-input-item">
                    <label for="display-name" class="required">{{trans('language.full_name')}}</label>
                    <input type="text" name="full_name" value="{{ old('full_name') ? old('full_name') : (isset($customer->name) ? $customer->name : '') }}" required/>
                    @error('full_name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="single-input-item">
                            <label for="first-name" class="required">{{trans('language.email')}}</label>
                            <input type="email" name="email" value="{{ old('email') ? old('email') : (isset($customer->email) ? $customer->email : '') }}" required/>
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="single-input-item">
                            <label for="last-name" class="required">{{trans('language.number_phone')}}</label>
                            <input type="text" name="phone" value="{{ old('phone') ? old('phone') : (isset($customer->phone) ? $customer->phone : '') }}" required/>
                            @error('phone')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
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