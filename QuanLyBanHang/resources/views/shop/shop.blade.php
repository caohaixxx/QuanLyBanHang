@extends('layout.master')

@section('addcss')
<link rel="stylesheet" href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" >
@endsection

@section('body')
@include('partials.banner', ['item' => 'Giỏ hàng'])
    <div class="shop-area shop-page-responsive pt-100 pb-100">
        <form action="">
            <div class="container">
                <div class="row flex-row-reverse">
                    <div class="col-lg-9">
                        <div class="shop-topbar-wrapper mb-40">
                            <div class="shop-topbar-left" data-aos="fade-up" data-aos-delay="200">

                            </div>
                            <div class="shop-topbar-right" data-aos="fade-up" data-aos-delay="400">

                                <div class="shop-sorting-area">
                                    <select name="sort_by" class="nice-select nice-select-style-1"
                                        onchange="this.form.submit();">
                                        <option {{ request('sort_by') == 'latest' ? 'selected' : '' }} value="latest">
                                            Default</option>
                                        <option {{ request('sort_by') == 'oldest' ? 'selected' : '' }} value="oldest">Oldest
                                        </option>
                                        <option {{ request('sort_by') == 'name-asc' ? 'selected' : '' }} value="name-asc">
                                            Name: A->Z</option>
                                        <option {{ request('sort_by') == 'name-desc' ? 'selected' : '' }} value="name-desc">
                                            Name: Z->A</option>
                                        <option {{ request('sort_by') == 'price-asc' ? 'selected' : '' }} value="price-asc">
                                            Price Ascending</option>
                                        <option {{ request('sort_by') == 'price-desc' ? 'selected' : '' }}
                                            value="price-desc">Price Decrease</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                        <div class="shop-bottom-area">
                            <div class="tab-content jump">
                                <div id="shop-1" class="tab-pane active">
                                    <div class="row">
                                        @foreach ($products as $product)
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="product-wrap mb-35" data-aos="fade-up" data-aos-delay="200">
                                                    @include('partials.product-item')
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    {{ $products->withQueryString()->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="sidebar-wrapper">

                            <div class="sidebar-widget mb-40" data-aos="fade-up" data-aos-delay="200">
                                <div class="search-wrap-2">
                                </div>
                            </div>
                            <div class="sidebar-widget sidebar-widget-border mb-40 pb-35" data-aos="fade-up"
                                data-aos-delay="200">
                                <div class="sidebar-widget-title mb-25">
                                    <h3>Danh mục</h3>
                                </div>
                                <div class="sidebar-list-style">
                                    <ul>
                                        @foreach ($categorys as $category)
                                            @php
                                                $count_cate_product = App\Models\ProductCategory::where('category_id', $category->id)
                                                    ->groupBy('category_id')
                                                    ->count();
                                            @endphp
                                            <li><p class="hai">{{ $category->name }}<span><input type="checkbox"
                                                name="cate[{{ $category->id }}]"
                                                {{ (request('cate')[$category->id] ?? '') == 'on' ? 'checked' : '' }}
                                                onchange="this.form.submit()"></span></p></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            <div class="sidebar-widget sidebar-widget-border mb-40 pb-35" data-aos="fade-up"
                                data-aos-delay="200">
                                <div class="sidebar-widget-title mb-30">
                                    <h3>Lọc theo giá tiền</h3>
                                </div>
                                <div class="price-filter">
                                    <div id="slider-range"></div>
                                    <div class="price-slider-amount">
                                        <div class="label-input">
                                            <label>Giá tiền:</label>
                                            <input type="text" id="amount" name="price"
                                                placeholder="Add Your Price" />
                                            <input type="hidden" name="start_price" id="start_price">
                                            <input type="hidden" name="end_price" id="end_price">
                                        </div>
                                        <button type="submit">Lọc</button>
                                    </div>
                                </div>
                            </div>
                            <div class="sidebar-widget sidebar-widget-border mb-40 pb-35" data-aos="fade-up"
                                data-aos-delay="200">
                                <div class="sidebar-widget-title mb-25">
                                    <h3>Thương hiệu</h3>
                                </div>
                                <div class="sidebar-list-style">
                                    <ul>
                                        @foreach ($brands as $brand)
                                            <li>
                                                <p class="hai">{{ $brand->name }}<span><input type="checkbox" name="brand[{{ $brand->id }}]" {{ (request('brand')[$brand->id] ?? '') == 'on' ? 'checked' : '' }}
                                                            onchange="this.form.submit()"></span></p>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            <div class="sidebar-widget" data-aos="fade-up" data-aos-delay="200">
                                <div class="sidebar-widget-title mb-25">
                                    <h3>Tags</h3>
                                </div>
                                <div class="sidebar-widget-tag">
                                    <a href="#">All, </a>
                                    <a href="#">Clothing, </a>
                                    <a href="#"> Kids, </a>
                                    <a href="#">Accessories, </a>
                                    <a href="#">Stationery, </a>
                                    <a href="#">Homelife, </a>
                                    <a href="#">Appliances, </a>
                                    <a href="#">Clothing, </a>
                                    <a href="#">Baby, </a>
                                    <a href="#">Beauty </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('addjs')
    <script src="{{asset('assets/js/main.js')}}"></script>
@endsection