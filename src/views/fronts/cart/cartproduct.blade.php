@extends('fronts.layouts.app')
@section('title',"Mua hàng")
@section('content')
@if(Auth::user())
    <main id="main" class="">
        <div id="box">
            <div class="checkout-page-title page-title">
                <div class="page-title-inner flex-row medium-flex-wrap container">
                    <div class="flex-col flex-grow medium-text-center">
                        <nav class="breadcrumbs heading-font checkout-breadcrumbs text-center h2 strong">
                            <a href="https://www.noithatgiakhanh.com/cart/" class="current">Shopping Cart</a>
                            <span class="divider hide-for-small"><i class="icon-angle-right"></i></span>
                            <a href="https://www.noithatgiakhanh.com/checkout/" class="hide-for-small">Checkout details</a>
                            <span class="divider hide-for-small"><i class="icon-angle-right"></i></span>
                            <a href="#" class="no-click hide-for-small">Order Complete</a>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="woocommerce">
                    <div class="woocommerce row row-large row-divided">
                        <div class="col-sm-8 pb-0 ">
                            <form id="cartForm" name="cartForm" class="form-horizontal">
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="product_name" value="{{$product->productInfor[0]->name}}">
                                <div class="cart-wrapper sm-touch-scroll">
                                    <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th class="product-name" colspan="3">Sản phẩm</th>
                                            <th class="product-price">Giá</th>
                                            <th class="product-quantity">Số lượng</th>
                                            <th class="product-subtotal">Tổng</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="woocommerce-cart-form__cart-item cart_item">
                                            <td class="product-remove">
                                                <a href="https://www.noithatgiakhanh.com/cart/?remove_item=fc723a87e241c9b3c2e5fd4df4ff8e9d&amp;_wpnonce=6e1bcca90b" class="remove" aria-label="Xóa sản phẩm này" data-product_id="42863" data-product_sku="">×</a> </td>
                                            <td class="product-thumbnail col-sm-1">
                                                <div class="flickity-viewport" style="height: 489.359px; touch-action: pan-y;">
                                                    <div class="flickity-slider" style="left: 0px; transform: translateX(0%);">
                                                        @foreach($product->getMedia('product') as $key => $image)
                                                            @if($key == 0)
                                                                <div :data-thumb="product_image" class="woocommerce-product-gallery__image slide first is-selected" aria-selected="true" style="position: absolute; left: 0%;">
                                                                    <a href="{{ $image->getFullUrl() }}">
                                                                        <img width="100%" height="400vh" src="{{ $image->getFullUrl() }}" class="" alt="" title=""
                                                                             data-caption="" data-src="" data-large_image="" data-large_image_width="1600" data-large_image_height="1200">
                                                                    </a>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="product-name" data-title="Sản phẩm">
                                                <a href="https://www.noithatgiakhanh.com/san-pham/bo-giuong-ngu-tan-co-dien-mbk311bg/">{{ $product->productInfor[0]->name }}</a>
                                                <div class="show-for-small mobile-product-price">
                                                    <span class="mobile-product-price__qty">1 x </span>
                                                    <span class="woocommerce-Price-amount amount" id="price">&nbsp{{ $product->price }}<span class="woocommerce-Price-currencySymbol">$</span></span>
                                                </div>
                                            </td>

                                            <td class="product-price" data-title="Giá">
                                                <input type="hidden" name="price" value="{{ $product->price }}">
                                                <span class="woocommerce-Price-amount amount">{{ $product->price }}&nbsp;<span class="woocommerce-Price-currencySymbol">$</span></span>
                                            </td>
                                            <td class="product-quantity" data-title="Số lượng">
                                                <div class="quantity buttons_added">
                                                    <label class="screen-reader-text" for="quantity">Số lượng</label>
                                                    <input type="button" value="-" class="minus button is-form" id="minus-qty">
                                                    <input type="text" id="quantity" class="input-text qty text" name="qty" value="1" title="SL" size="4" inputmode="numeric">
                                                    <input type="button" value="+" class="plus button is-form" id="plus-qty">
                                                </div>
                                            </td>

                                            <td class="product-subtotal" data-title="Tổng">
                                                <input type="hidden" name="total_money" id="total_money" value="{{ $product->price }}">
                                                <span class="woocommerce-Price-amount amount" id="total-money">{{ $product->price }}&nbsp;<span class="woocommerce-Price-currencySymbol">$</span></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="6" class="actions clear">

                                                <div class="continue-shopping pull-left text-left">
                                                    <a class="button-continue-shopping button primary is-outline" href="{{ route('home') }}">
                                                        ← Tiếp tục xem sản phẩm
                                                    </a>
                                                </div>
                                                <button type="submit" class="button primary mt-0 pull-left small" name="update_cart" value="Cập nhật giỏ hàng" disabled="">Cập nhật giỏ hàng</button>
                                                <input type="hidden" id="woocommerce-cart-nonce" name="woocommerce-cart-nonce" value="6e1bcca90b">
                                                <input type="hidden" name="_wp_http_referer" value="/cart/?removed_item=1">
                                                <div class="float-right">
                                                    <button type="submit" class="btn btn-danger" id="addCart">Thêm vào giỏ hàng</button>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-4">
                            <div class="cart-sidebar col-inner ">
                                <div class="cart_totals calculated_shipping">
                                    <table cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th class="product-name" colspan="2" style="border-width:3px;">Cộng giỏ hàng</th>
                                        </tr>
                                        </thead>
                                    </table>
                                    <h2>Cộng giỏ hàng</h2>

                                    <table cellspacing="0" class="shop_table shop_table_responsive">
                                        <tbody>
                                        <tr class="cart-subtotal">
                                            <th>Tạm tính</th>
                                            <td data-title="Tạm tính"><span class="woocommerce-Price-amount amount" id="total-cost-one">{{ $product->price }}&nbsp;<span class="woocommerce-Price-currencySymbol">$</span></span>
                                            </td>
                                        </tr>
                                        <tr class="woocommerce-shipping-totals shipping ">
                                            <td class="shipping__inner" colspan="2">
                                                <table class="shipping__table ">
                                                    <tbody>
                                                    <tr>
                                                        <th>Giao hàng</th>
                                                        <td data-title="Giao hàng">
                                                            <ul id="shipping_method" class="shipping__list woocommerce-shipping-methods">
                                                                <li class="shipping__list_item">
                                                                    <input type="hidden" name="shipping_method[0]" data-index="0" id="shipping_method_0_free_shipping1" value="free_shipping:1" class="shipping_method">
                                                                    <label class="shipping__list_label" for="shipping_method_0_free_shipping1">Giao hàng miễn phí</label>
                                                                </li>
                                                            </ul>
                                                            <p>Mọi thông tin về việc giao hàng quý khách và cửa hàng sẽ thống nhất tại buổi xem mẫu nội thất tại công ty.</p>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr class="order-total">
                                            <th>Tổng</th>
                                            <td data-title="Tổng">
                                                <strong>
                                                <span class="woocommerce-Price-amount amount" id="total-cost">{{ $product->price }}&nbsp;<span class="woocommerce-Price-currencySymbol">$</span>
                                                </span>
                                                </strong>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="cart-sidebar-content relative"></div>
                            </div>
                        </div>
                    </div>
                    <div class="cart-footer-content after-cart-content relative"></div>
                </div>
            </div>
        </div>
    </main>
@else
    <div class="col-sm-6">
        <span>Bạn hãy đăng nhập để đặt hàng</span>
        <span><a href="{{ route('dang-nhap') }}">Đăng nhập</a></span>
    </div>
@endif
@endsection

@section('page-scripts')
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(document).on('click', '#addCart', function (e) {
                e.preventDefault();
                $.ajax({
                    data: $('#cartForm').serialize(),
                    url: '{{ route('orders.store') }}',
                    type: 'POST',
                    dataType: 'json',
                    success: function (data) {
                        if(Object.values(data.data).length != 0) {
                            $('#count-cart').text(Object.values(data.data).length)
                        }
                        $.each(Object.values(data.data), function (index, value) {
                            console.log(value.id)
                        })
                        window.location.href = '{{ route('home') }}'
                    },
                    error: function (data) {
                        console.log("Error:")
                    }
                })
            });
        });
        let price = {{ $product->price }}
        $(document).on('click', '#plus-qty', function (event) {
            var value = parseInt($('#quantity').val());
            $('#quantity').val(value + 1);
            let vl_new = parseInt($('#quantity').val());
            $('#total-money').text(vl_new * parseInt(price) + '$');
            $('#total-cost').text(vl_new * parseInt(price) + '$');
            $('#total-cost-one').text(vl_new * parseInt(price) + '$');
        });

        $(document).on('click', '#minus-qty', function (event) {
            var value = parseInt($('#quantity').val());
            $('#quantity').val(value - 1);
            let vl_new = parseInt($('#quantity').val());
            $('#total-money').text(vl_new * parseInt(price) + '$');
            $('#total-cost').text(vl_new * parseInt(price) + '$');
            $('#total-cost-one').text(vl_new * parseInt(price) + '$');
        })
    </script>
@endsection
