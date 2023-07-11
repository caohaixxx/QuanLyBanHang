<div class="product-img img-zoom mb-25">
    <a href="{{ route('front.product', ['id' => $product->id]) }}">
        <img src={{ asset($product->images[0]) }}>
    </a>
    <div class="product-action-wrap">
        
    </div>
    <div class="product-action-2-wrap">
        <button type="button" data-id="{{ $product->id }}" class="product-action-btn-2 btn-detail preview-product"
            title="Add To Cart" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                class="pe-7s-cart"></i>{{trans('language.view_product')}}</button>
    </div>
</div>
<div class="product-content">
    <h3><a href="{{ route('front.product', ['id' => $product->id]) }}">{{ $product->name }}</a></h3>
    <div class="product-price">
        @if ($product->price_dc != null)
            <span class="old-price"> {{ number_format($product->price) }}đ </span>
            <span class="new-price"> {{ number_format($product->price_dc) }}đ </span>
        @else
            <span> {{ number_format($product->minPrice) }}đ - {{number_format($product->maxPrice) }}đ </span>
        @endif
    </div>
</div>
