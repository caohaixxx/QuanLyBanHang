<div class="tab-pane fade" id="orders" role="tabpanel">
    <div class="myaccount-content">
        @if(isset($histories) && count($histories) > 0)
        <h3>{{trans('language.order_history')}}</h3>
        <div class="myaccount-table table-responsive text-center">
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>{{trans('language.order')}}</th>
                        <th>{{trans('language.date_order')}}</th>
                        <th>{{trans('language.status')}}</th>
                        <th>{{trans('language.subtotal')}}</th>
                        <th>{{trans('language.action')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($histories as $item)
                    <tr>
                        <td>{{$item->code}}</td>
                        <td>{{date('d/m/Y H:i', strtotime($item->created_at))}}</td>
                        <td>{!! \App\Models\Order::checkStatus($item->status) !!}</td>
                        <td>{{number_format($item->total)}}₫</td>
                        <td><a href="{{route('customer.history', ['code' => $item->code])}}" class="check-btn sqr-btn ">{{trans('language.detail')}}</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="d-flex" style="flex-direction: column;align-items: center;">
            <img class="text-center" src="{{ asset('/images/order-empty.png') }}"alt=""
                style="width: 155px; height:155px">
            <p class="text-center">{{ trans('language.not_order') }}</p>
        </div>
        @endif
    </div>
</div>