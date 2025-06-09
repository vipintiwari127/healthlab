@extends('website.layout.header')
@section('main-content')
    <style>
        .mobile-footer-nav {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            height: 60px;
            background-color: #FEC107;
            border-top: 1px solid #ddd;
            display: flex;
            justify-content: space-around;
            align-items: center;
            z-index: 999;
            box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.1);
        }

        .mobile-footer-nav a {
            flex: 1;
            text-align: center;
            text-decoration: none;
            color: #333;
            font-size: 12px;
        }

        .mobile-footer-nav i {
            display: block;
            font-size: 18px;
            margin-bottom: 2px;
        }

        @media (min-width: 769px) {
            .mobile-footer-nav {
                display: none;
            }
        }
    </style>

    <!--==============================
                Breadcumb
            ============================== -->
    <div class="breadcumb-wrapper ">
        <div class="parallax" data-parallax-image="{{ asset('website/assets/img/breadcurmb/breadcurmb-1-1.jpg') }}"></div>
        <div class="container z-index-common">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Shopping Cart</h1>
                <div class="breadcumb-menu-wrap">
                    <i class="far fa-home-lg"></i>
                    <ul class="breadcumb-menu">
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Shopping Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--==============================
                Cart Area
                ==============================-->
    <div class="vs-cart-wrapper  space-top space-md-bottom">
        <div class="container">
            <div class="woocommerce-notices-wrapper">
                <div class="woocommerce-message">Shipping costs updated.</div>
            </div>
            <form action="#" class="woocommerce-cart-form">
                <table class="cart_table">
                    <thead>
                        <tr>
                            <th class="cart-col-image">Image</th>
                            <th class="cart-col-productname">Product Name</th>
                            <th class="cart-col-price">Price</th>
                            <th class="cart-col-quantity">Quantity</th>
                            <th class="cart-col-total">Total</th>
                            <th class="cart-col-remove">Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="cart_item">
                            <td data-title="Product">
                                <a class="cart-productimage" href="#"><img width="91" height="91"
                                        src="{{ asset('website/assets/img/product/cart-1.jpg') }}" alt="Image"></a>
                            </td>
                            <td data-title="Name">
                                <a class="cart-productname" href="#">Ibuprofen</a>
                            </td>
                            <td data-title="Price">
                                <span class="amount"><bdi><span>$</span>18</bdi></span>
                            </td>
                            <td data-title="Quantity">
                                <div class="quantity">
                                    <button class="quantity-minus qut-btn"><i class="far fa-minus"></i></button>
                                    <input type="number" class="qty-input" value="1" min="1" max="99">
                                    <button class="quantity-plus qut-btn"><i class="far fa-plus"></i></button>
                                </div>
                            </td>
                            <td data-title="Total">
                                <span class="amount"><bdi><span>$</span>18</bdi></span>
                            </td>
                            <td data-title="Remove">
                                <a href="#" class="remove"><i class="fal fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        <tr class="cart_item">
                            <td data-title="Product">
                                <a class="cart-productimage" href="#"><img width="91" height="91"
                                        src="{{ asset('website/assets/img/product/cart-2.jpg') }}" alt="Image"></a>
                            </td>
                            <td data-title="Name">
                                <a class="cart-productname" href="#">Doxycycline</a>
                            </td>
                            <td data-title="Price">
                                <span class="amount"><bdi><span>$</span>22</bdi></span>
                            </td>
                            <td data-title="Quantity">
                                <div class="quantity">
                                    <button class="quantity-minus qut-btn"><i class="far fa-minus"></i></button>
                                    <input type="number" class="qty-input" value="1" min="1" max="99">
                                    <button class="quantity-plus qut-btn"><i class="far fa-plus"></i></button>
                                </div>
                            </td>
                            <td data-title="Total">
                                <span class="amount"><bdi><span>$</span>22</bdi></span>
                            </td>
                            <td data-title="Remove">
                                <a href="#" class="remove"><i class="fal fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        <tr class="cart_item">
                            <td data-title="Product">
                                <a class="cart-productimage" href="#"><img width="91" height="91"
                                        src="{{ asset('website/assets/img/product/cart-3.jpg') }}" alt="Image"></a>
                            </td>
                            <td data-title="Name">
                                <a class="cart-productname" href="#">Kevzara</a>
                            </td>
                            <td data-title="Price">
                                <span class="amount"><bdi><span>$</span>55</bdi></span>
                            </td>
                            <td data-title="Quantity">
                                <div class="quantity">
                                    <button class="quantity-minus qut-btn"><i class="far fa-minus"></i></button>
                                    <input type="number" class="qty-input" value="1" min="1"
                                        max="99">
                                    <button class="quantity-plus qut-btn"><i class="far fa-plus"></i></button>
                                </div>
                            </td>
                            <td data-title="Total">
                                <span class="amount"><bdi><span>$</span>55</bdi></span>
                            </td>
                            <td data-title="Remove">
                                <a href="#" class="remove"><i class="fal fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="6" class="actions">
                                <div class="vs-cart-coupon">
                                    <input type="text" class="form-control" placeholder="Coupon Code...">
                                    <button type="submit" class="vs-btn rounded-1 shadow-none">Apply Coupon</button>
                                </div>
                                <button type="submit" class="vs-btn rounded-1 shadow-none">Update cart</button>
                                <a href="#" class="vs-btn rounded-1 shadow-none">Continue Shopping</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
            <div class="row justify-content-end">
                <div class="col-md-8 col-lg-7 col-xl-6">
                    <h2 class="h4 summary-title">Cart Totals</h2>
                    <table class="cart_totals">
                        <tbody>
                            <tr>
                                <td>Cart Subtotal</td>
                                <td data-title="Cart Subtotal">
                                    <span class="amount"><bdi><span>$</span>47</bdi></span>
                                </td>
                            </tr>
                            <tr class="shipping">
                                <th>Shipping and Handling</th>
                                <td data-title="Shipping and Handling">
                                    <ul class="woocommerce-shipping-methods list-unstyled">
                                        <li>
                                            <input type="radio" id="free_shipping" name="shipping_method"
                                                class="shipping_method">
                                            <label for="free_shipping">Free shipping</label>
                                        </li>
                                        <li>
                                            <input type="radio" id="flat_rate" name="shipping_method"
                                                class="shipping_method" checked="checked">
                                            <label for="flat_rate">Flat rate</label>
                                        </li>
                                    </ul>
                                    <p class="woocommerce-shipping-destination">
                                        Shipping options will be updated during checkout.
                                    </p>
                                    <form action="#" method="post">
                                        <a href="#" class="shipping-calculator-button">Change address</a>
                                        <div class="shipping-calculator-form">
                                            <p class="form-row">
                                                <select class="form-select">
                                                    <option value="AR">Argentina</option>
                                                    <option value="AM">Armenia</option>
                                                    <option value="BD" selected="selected">Bangladesh</option>
                                                </select>
                                            </p>
                                            <p>
                                                <select class="form-select">
                                                    <option value="">Select an option…</option>
                                                    <option value="BD-05">Bagerhat</option>
                                                    <option value="BD-01">Bandarban</option>
                                                    <option value="BD-02">Barguna</option>
                                                    <option value="BD-06">Barishal</option>
                                                </select>
                                            </p>
                                            <p class="form-row">
                                                <input type="text" class="form-control" placeholder="Town / City">
                                            </p>
                                            <p class="form-row">
                                                <input type="text" class="form-control" placeholder="Postcode / ZIP">
                                            </p>
                                            <p>
                                                <button class="vs-btn shadow-none rounded-1">Update</button>
                                            </p>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr class="order-total">
                                <td>Order Total</td>
                                <td data-title="Total">
                                    <strong><span class="amount"><bdi><span>$</span>47</bdi></span></strong>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                    <div class="wc-proceed-to-checkout mb-30">
                        <a href="checkout.html" class="vs-btn rounded-1 shadow-none">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
