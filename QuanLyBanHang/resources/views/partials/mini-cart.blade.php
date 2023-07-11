@if (isset($carts) && count($carts) > 0)
    <ul class="mini-cart">
        @foreach ($carts as $cart)
            <li>
                <div class="cart-img">
                    <a href="{{ route('front.product', ['id' => $cart->id]) }}"><img src="{{ asset($cart->images) }}"
                            alt=""></a>
                </div>
                <div class="cart-title">
                    <h4><a href="{{ route('front.product', ['id' => $cart->id]) }}">{{ $cart->product_name }}<span>
                                ({{ $cart->color }})
                            </span></a></h4>
                    <span class="mini-qty">{{ $cart->quantity }} </span><span>x {{ number_format($cart->price) }}₫
                    </span>
                </div>
                <div class="cart-delete">
                    <form action="{{ route('delete.cart', ['id' => $cart->cartDetailId]) }}" method="post">
                        @method('delete')
                        @csrf
                        <button type="submit">×</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>

    @php
        $sumMini = 0;
        foreach ($carts as $cart) {
            $miniSubtotal = $cart->quantity * $cart->price;
            $sumMini += $miniSubtotal;
        }
    @endphp
    <div class="cart-total">
        <h4>{{ trans('language.subtotal') }}: <span class="mini-cart-subtotal">{{ number_format($sumMini) }}đ</span>
        </h4>
    </div>
    <div class="cart-btn btn-hover">
        <a class="theme-color" href="{{ route('cart') }}">{{ trans('language.view_cart') }}</a>
    </div>
@else
    <div class="d-flex" style="flex-direction: column;align-items: center;">
        <img class="text-center" src="{{ asset('/images/car-mini-empty.png') }}"alt=""
            style="width: 155px; height:155px">
        <p class="text-center">{{ trans('language.please_add_product') }}</p>
    </div>
@endif
