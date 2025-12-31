<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Laravel API Documentation</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .bash-example code { display: none; }
                    body .content .javascript-example code { display: none; }
            </style>

    <script>
        var tryItOutBaseUrl = "http://localhost:8000";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("/vendor/scribe/js/tryitout-5.6.0.js") }}"></script>

    <script src="{{ asset("/vendor/scribe/js/theme-default-5.6.0.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("/vendor/scribe/images/navbar.png") }}" alt="navbar-image"/>
    </span>
</a>
<div class="tocify-wrapper">
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                    <ul id="tocify-header-introduction" class="tocify-header">
                <li class="tocify-item level-1" data-unique="introduction">
                    <a href="#introduction">Introduction</a>
                </li>
                            </ul>
                    <ul id="tocify-header-authenticating-requests" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authenticating-requests">
                    <a href="#authenticating-requests">Authenticating requests</a>
                </li>
                            </ul>
                    <ul id="tocify-header-addresses" class="tocify-header">
                <li class="tocify-item level-1" data-unique="addresses">
                    <a href="#addresses">Addresses</a>
                </li>
                                    <ul id="tocify-subheader-addresses" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="addresses-GETv1-addresses">
                                <a href="#addresses-GETv1-addresses">Get user's addresses.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="addresses-POSTv1-addresses">
                                <a href="#addresses-POSTv1-addresses">Store a new address.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="addresses-GETv1-addresses--address_id-">
                                <a href="#addresses-GETv1-addresses--address_id-">Display the specified address.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="addresses-PUTv1-addresses--address_id-">
                                <a href="#addresses-PUTv1-addresses--address_id-">Update the specified address.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="addresses-DELETEv1-addresses--address_id-">
                                <a href="#addresses-DELETEv1-addresses--address_id-">Remove the specified address.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="addresses-PATCHv1-addresses--address_id--set-default">
                                <a href="#addresses-PATCHv1-addresses--address_id--set-default">Set address as default.</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-admin-brands" class="tocify-header">
                <li class="tocify-item level-1" data-unique="admin-brands">
                    <a href="#admin-brands">Admin - Brands</a>
                </li>
                                    <ul id="tocify-subheader-admin-brands" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="admin-brands-POSTv1-admin-brands">
                                <a href="#admin-brands-POSTv1-admin-brands">Store a newly created brand.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="admin-brands-PUTv1-admin-brands--brand_id-">
                                <a href="#admin-brands-PUTv1-admin-brands--brand_id-">Update the specified brand.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="admin-brands-PATCHv1-admin-brands--brand_id--status">
                                <a href="#admin-brands-PATCHv1-admin-brands--brand_id--status">Update brand status.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="admin-brands-DELETEv1-admin-brands--brand_id-">
                                <a href="#admin-brands-DELETEv1-admin-brands--brand_id-">Remove the specified brand.</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-admin-categories" class="tocify-header">
                <li class="tocify-item level-1" data-unique="admin-categories">
                    <a href="#admin-categories">Admin - Categories</a>
                </li>
                                    <ul id="tocify-subheader-admin-categories" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="admin-categories-POSTv1-admin-categories">
                                <a href="#admin-categories-POSTv1-admin-categories">Create a new category.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="admin-categories-PUTv1-admin-categories-edit--category_id-">
                                <a href="#admin-categories-PUTv1-admin-categories-edit--category_id-">Update category.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="admin-categories-PATCHv1-admin-categories--category_id--status">
                                <a href="#admin-categories-PATCHv1-admin-categories--category_id--status">Update category status.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="admin-categories-DELETEv1-admin-categories--category_id-">
                                <a href="#admin-categories-DELETEv1-admin-categories--category_id-">Delete category.</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-admin-coupons" class="tocify-header">
                <li class="tocify-item level-1" data-unique="admin-coupons">
                    <a href="#admin-coupons">Admin - Coupons</a>
                </li>
                                    <ul id="tocify-subheader-admin-coupons" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="admin-coupons-GETv1-admin-coupons">
                                <a href="#admin-coupons-GETv1-admin-coupons">Get all coupons (Admin only).</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="admin-coupons-POSTv1-admin-coupons">
                                <a href="#admin-coupons-POSTv1-admin-coupons">Create coupon (Admin only).</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="admin-coupons-GETv1-admin-coupons--coupon_id-">
                                <a href="#admin-coupons-GETv1-admin-coupons--coupon_id-">Get coupon details (Admin only).</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="admin-coupons-PUTv1-admin-coupons--coupon_id-">
                                <a href="#admin-coupons-PUTv1-admin-coupons--coupon_id-">Update coupon (Admin only).</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="admin-coupons-DELETEv1-admin-coupons--coupon_id-">
                                <a href="#admin-coupons-DELETEv1-admin-coupons--coupon_id-">Delete coupon (Admin only).</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-admin-payments" class="tocify-header">
                <li class="tocify-item level-1" data-unique="admin-payments">
                    <a href="#admin-payments">Admin - Payments</a>
                </li>
                                    <ul id="tocify-subheader-admin-payments" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="admin-payments-PATCHv1-admin-payments--payment_id--refund">
                                <a href="#admin-payments-PATCHv1-admin-payments--payment_id--refund">Process refund (Admin only - will be in admin routes).</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-admin-products" class="tocify-header">
                <li class="tocify-item level-1" data-unique="admin-products">
                    <a href="#admin-products">Admin - Products</a>
                </li>
                                    <ul id="tocify-subheader-admin-products" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="admin-products-POSTv1-admin-products">
                                <a href="#admin-products-POSTv1-admin-products">Store a newly created product.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="admin-products-PUTv1-admin-products--product_id-">
                                <a href="#admin-products-PUTv1-admin-products--product_id-">Update the specified product.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="admin-products-PATCHv1-admin-products--product_id--status">
                                <a href="#admin-products-PATCHv1-admin-products--product_id--status">Toggle product status between active and inactive.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="admin-products-DELETEv1-admin-products--product_id-">
                                <a href="#admin-products-DELETEv1-admin-products--product_id-">Remove the specified product.</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-admin-reviews" class="tocify-header">
                <li class="tocify-item level-1" data-unique="admin-reviews">
                    <a href="#admin-reviews">Admin - Reviews</a>
                </li>
                                    <ul id="tocify-subheader-admin-reviews" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="admin-reviews-GETv1-admin-reviews">
                                <a href="#admin-reviews-GETv1-admin-reviews">Get all reviews (Admin only).</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="admin-reviews-PATCHv1-admin-reviews--review_id--approve">
                                <a href="#admin-reviews-PATCHv1-admin-reviews--review_id--approve">Approve review (Admin only).</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="admin-reviews-PATCHv1-admin-reviews--review_id--reject">
                                <a href="#admin-reviews-PATCHv1-admin-reviews--review_id--reject">Reject review (Admin only).</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-admin-shipping-methods" class="tocify-header">
                <li class="tocify-item level-1" data-unique="admin-shipping-methods">
                    <a href="#admin-shipping-methods">Admin - Shipping Methods</a>
                </li>
                                    <ul id="tocify-subheader-admin-shipping-methods" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="admin-shipping-methods-GETv1-admin-shipping-methods">
                                <a href="#admin-shipping-methods-GETv1-admin-shipping-methods">Get all shipping methods (Admin only).</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="admin-shipping-methods-POSTv1-admin-shipping-methods">
                                <a href="#admin-shipping-methods-POSTv1-admin-shipping-methods">Create shipping method (Admin only).</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="admin-shipping-methods-GETv1-admin-shipping-methods--shippingMethod_id-">
                                <a href="#admin-shipping-methods-GETv1-admin-shipping-methods--shippingMethod_id-">Get shipping method details (Admin only).</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="admin-shipping-methods-PUTv1-admin-shipping-methods--shippingMethod_id-">
                                <a href="#admin-shipping-methods-PUTv1-admin-shipping-methods--shippingMethod_id-">Update shipping method (Admin only).</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="admin-shipping-methods-DELETEv1-admin-shipping-methods--shippingMethod_id-">
                                <a href="#admin-shipping-methods-DELETEv1-admin-shipping-methods--shippingMethod_id-">Delete shipping method (Admin only).</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-admin-users" class="tocify-header">
                <li class="tocify-item level-1" data-unique="admin-users">
                    <a href="#admin-users">Admin - Users</a>
                </li>
                                    <ul id="tocify-subheader-admin-users" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="admin-users-GETv1-admin-users">
                                <a href="#admin-users-GETv1-admin-users">Display a listing of users.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="admin-users-POSTv1-admin-users">
                                <a href="#admin-users-POSTv1-admin-users">Store a newly created user (Admin only).</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="admin-users-GETv1-admin-users--user_id-">
                                <a href="#admin-users-GETv1-admin-users--user_id-">Display the specified user.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="admin-users-PUTv1-admin-users--user_id-">
                                <a href="#admin-users-PUTv1-admin-users--user_id-">Update the specified user.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="admin-users-DELETEv1-admin-users--user_id-">
                                <a href="#admin-users-DELETEv1-admin-users--user_id-">Delete user.</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-authentication" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authentication">
                    <a href="#authentication">Authentication</a>
                </li>
                                    <ul id="tocify-subheader-authentication" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="authentication-POSTv1-auth-register">
                                <a href="#authentication-POSTv1-auth-register">Handle user registration.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="authentication-POSTv1-auth-login">
                                <a href="#authentication-POSTv1-auth-login">Handle user login.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="authentication-POSTv1-auth-forgot-password">
                                <a href="#authentication-POSTv1-auth-forgot-password">Send password reset link.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="authentication-POSTv1-auth-reset-password">
                                <a href="#authentication-POSTv1-auth-reset-password">Reset password.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="authentication-GETv1-auth-google">
                                <a href="#authentication-GETv1-auth-google">Redirect to Google OAuth.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="authentication-GETv1-auth-google-callback">
                                <a href="#authentication-GETv1-auth-google-callback">Handle Google OAuth callback.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="authentication-POSTv1-auth-logout">
                                <a href="#authentication-POSTv1-auth-logout">Handle user logout.</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-brands" class="tocify-header">
                <li class="tocify-item level-1" data-unique="brands">
                    <a href="#brands">Brands</a>
                </li>
                                    <ul id="tocify-subheader-brands" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="brands-GETv1-brands">
                                <a href="#brands-GETv1-brands">Get all brands.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="brands-GETv1-brands--brand_id-">
                                <a href="#brands-GETv1-brands--brand_id-">Display the specified brand.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="brands-GETv1-admin-brands">
                                <a href="#brands-GETv1-admin-brands">Get all brands.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="brands-GETv1-admin-brands--brand_id-">
                                <a href="#brands-GETv1-admin-brands--brand_id-">Display the specified brand.</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-cart" class="tocify-header">
                <li class="tocify-item level-1" data-unique="cart">
                    <a href="#cart">Cart</a>
                </li>
                                    <ul id="tocify-subheader-cart" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="cart-GETv1-cart">
                                <a href="#cart-GETv1-cart">Get user's cart.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="cart-POSTv1-cart">
                                <a href="#cart-POSTv1-cart">Add item to cart.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="cart-PUTv1-cart--cartItem-">
                                <a href="#cart-PUTv1-cart--cartItem-">Update cart item quantity.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="cart-DELETEv1-cart--cartItem-">
                                <a href="#cart-DELETEv1-cart--cartItem-">Remove item from cart.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="cart-DELETEv1-cart">
                                <a href="#cart-DELETEv1-cart">Clear entire cart.</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-categories" class="tocify-header">
                <li class="tocify-item level-1" data-unique="categories">
                    <a href="#categories">Categories</a>
                </li>
                                    <ul id="tocify-subheader-categories" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="categories-GETv1-categories">
                                <a href="#categories-GETv1-categories">Get all categories.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="categories-GETv1-categories-parent-categories">
                                <a href="#categories-GETv1-categories-parent-categories">Get parent categories.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="categories-GETv1-categories--category_id-">
                                <a href="#categories-GETv1-categories--category_id-">Get category details.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="categories-GETv1-admin-categories">
                                <a href="#categories-GETv1-admin-categories">Get all categories.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="categories-GETv1-admin-categories-parent-categories">
                                <a href="#categories-GETv1-admin-categories-parent-categories">Get parent categories.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="categories-GETv1-admin-categories--category_id-">
                                <a href="#categories-GETv1-admin-categories--category_id-">Get category details.</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-coupons" class="tocify-header">
                <li class="tocify-item level-1" data-unique="coupons">
                    <a href="#coupons">Coupons</a>
                </li>
                                    <ul id="tocify-subheader-coupons" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="coupons-POSTv1-coupons-validate">
                                <a href="#coupons-POSTv1-coupons-validate">Validate coupon code.</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-orders" class="tocify-header">
                <li class="tocify-item level-1" data-unique="orders">
                    <a href="#orders">Orders</a>
                </li>
                                    <ul id="tocify-subheader-orders" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="orders-GETv1-orders">
                                <a href="#orders-GETv1-orders">Get user's orders.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="orders-POSTv1-orders">
                                <a href="#orders-POSTv1-orders">Create new order from cart.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="orders-GETv1-orders--order_id-">
                                <a href="#orders-GETv1-orders--order_id-">Get order details.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="orders-PATCHv1-orders--order_id--cancel">
                                <a href="#orders-PATCHv1-orders--order_id--cancel">Cancel order.</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-payments" class="tocify-header">
                <li class="tocify-item level-1" data-unique="payments">
                    <a href="#payments">Payments</a>
                </li>
                                    <ul id="tocify-subheader-payments" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="payments-POSTv1-payments">
                                <a href="#payments-POSTv1-payments">Process payment for an order.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="payments-GETv1-payments--payment_id-">
                                <a href="#payments-GETv1-payments--payment_id-">Get payment details.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="payments-GETv1-payments-order--order_id-">
                                <a href="#payments-GETv1-payments-order--order_id-">Get order payments.</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-products" class="tocify-header">
                <li class="tocify-item level-1" data-unique="products">
                    <a href="#products">Products</a>
                </li>
                                    <ul id="tocify-subheader-products" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="products-GETv1-products">
                                <a href="#products-GETv1-products">Get all products.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="products-GETv1-products-form-data">
                                <a href="#products-GETv1-products-form-data">Get form data (categories and brands).</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="products-GETv1-products--product_id-">
                                <a href="#products-GETv1-products--product_id-">Get product details.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="products-GETv1-admin-products">
                                <a href="#products-GETv1-admin-products">Get all products.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="products-GETv1-admin-products-form-data">
                                <a href="#products-GETv1-admin-products-form-data">Get form data (categories and brands).</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="products-GETv1-admin-products--product_id-">
                                <a href="#products-GETv1-admin-products--product_id-">Get product details.</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-profile" class="tocify-header">
                <li class="tocify-item level-1" data-unique="profile">
                    <a href="#profile">Profile</a>
                </li>
                                    <ul id="tocify-subheader-profile" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="profile-GETv1-profile">
                                <a href="#profile-GETv1-profile">Get authenticated user profile.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="profile-PUTv1-profile">
                                <a href="#profile-PUTv1-profile">Update authenticated user profile.</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-reviews" class="tocify-header">
                <li class="tocify-item level-1" data-unique="reviews">
                    <a href="#reviews">Reviews</a>
                </li>
                                    <ul id="tocify-subheader-reviews" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="reviews-GETv1-products--product_id--reviews">
                                <a href="#reviews-GETv1-products--product_id--reviews">Get product reviews.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="reviews-POSTv1-reviews">
                                <a href="#reviews-POSTv1-reviews">Create a review.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="reviews-PUTv1-reviews--review_id-">
                                <a href="#reviews-PUTv1-reviews--review_id-">Update review.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="reviews-DELETEv1-reviews--review_id-">
                                <a href="#reviews-DELETEv1-reviews--review_id-">Delete review.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="reviews-POSTv1-reviews--review_id--helpful">
                                <a href="#reviews-POSTv1-reviews--review_id--helpful">Mark review as helpful.</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-shipping-methods" class="tocify-header">
                <li class="tocify-item level-1" data-unique="shipping-methods">
                    <a href="#shipping-methods">Shipping Methods</a>
                </li>
                                    <ul id="tocify-subheader-shipping-methods" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="shipping-methods-GETv1-shipping-methods">
                                <a href="#shipping-methods-GETv1-shipping-methods">Get active shipping methods (Public).</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-wishlist" class="tocify-header">
                <li class="tocify-item level-1" data-unique="wishlist">
                    <a href="#wishlist">Wishlist</a>
                </li>
                                    <ul id="tocify-subheader-wishlist" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="wishlist-GETv1-wishlist">
                                <a href="#wishlist-GETv1-wishlist">Get user's wishlist.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="wishlist-POSTv1-wishlist">
                                <a href="#wishlist-POSTv1-wishlist">Add product to wishlist.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="wishlist-DELETEv1-wishlist--wishlist-">
                                <a href="#wishlist-DELETEv1-wishlist--wishlist-">Remove product from wishlist.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="wishlist-GETv1-wishlist-check--product-">
                                <a href="#wishlist-GETv1-wishlist-check--product-">Check if product is in wishlist.</a>
                            </li>
                                                                        </ul>
                            </ul>
            </div>

    <ul class="toc-footer" id="toc-footer">
                    <li style="padding-bottom: 5px;"><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li style="padding-bottom: 5px;"><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
    </ul>

    <ul class="toc-footer" id="last-updated">
        <li>Last updated: December 31, 2025</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<p>ShopHub API - E-commerce backend API for Angular frontend</p>
<aside>
    <strong>Base URL</strong>: <code>http://localhost:8000</code>
</aside>
<pre><code>This documentation aims to provide all the information you need to work with our API.

&lt;aside&gt;As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).&lt;/aside&gt;</code></pre>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>To authenticate requests, include an <strong><code>Authorization</code></strong> header with the value <strong><code>"Bearer Bearer {YOUR_TOKEN}"</code></strong>.</p>
<p>All authenticated endpoints are marked with a <code>requires authentication</code> badge in the documentation below.</p>
<p>You can retrieve your token by logging in via <code>POST /auth/login</code> endpoint. Include the token in the Authorization header as: <code>Bearer {token}</code>.</p>

        <h1 id="addresses">Addresses</h1>

    

                                <h2 id="addresses-GETv1-addresses">Get user&#039;s addresses.</h2>

<p>
</p>



<span id="example-requests-GETv1-addresses">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/v1/addresses" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/addresses"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETv1-addresses">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETv1-addresses" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETv1-addresses"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETv1-addresses"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETv1-addresses" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETv1-addresses">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETv1-addresses" data-method="GET"
      data-path="v1/addresses"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETv1-addresses', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETv1-addresses"
                    onclick="tryItOut('GETv1-addresses');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETv1-addresses"
                    onclick="cancelTryOut('GETv1-addresses');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETv1-addresses"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>v1/addresses</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETv1-addresses"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETv1-addresses"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="addresses-POSTv1-addresses">Store a new address.</h2>

<p>
</p>



<span id="example-requests-POSTv1-addresses">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/v1/addresses" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"type\": \"billing\",
    \"label\": \"b\",
    \"first_name\": \"n\",
    \"last_name\": \"g\",
    \"phone\": \"zmiyvdljnikhwayk\",
    \"email\": \"lyric80@example.com\",
    \"street_line_1\": \"p\",
    \"street_line_2\": \"w\",
    \"city\": \"l\",
    \"state_province\": \"v\",
    \"postal_code\": \"qwrsitcpscqldzsn\",
    \"country\": \"rw\",
    \"delivery_instructions\": \"t\",
    \"is_default\": true
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/addresses"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "type": "billing",
    "label": "b",
    "first_name": "n",
    "last_name": "g",
    "phone": "zmiyvdljnikhwayk",
    "email": "lyric80@example.com",
    "street_line_1": "p",
    "street_line_2": "w",
    "city": "l",
    "state_province": "v",
    "postal_code": "qwrsitcpscqldzsn",
    "country": "rw",
    "delivery_instructions": "t",
    "is_default": true
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTv1-addresses">
</span>
<span id="execution-results-POSTv1-addresses" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTv1-addresses"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTv1-addresses"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTv1-addresses" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTv1-addresses">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTv1-addresses" data-method="POST"
      data-path="v1/addresses"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTv1-addresses', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTv1-addresses"
                    onclick="tryItOut('POSTv1-addresses');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTv1-addresses"
                    onclick="cancelTryOut('POSTv1-addresses');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTv1-addresses"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>v1/addresses</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTv1-addresses"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTv1-addresses"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>type</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="type"                data-endpoint="POSTv1-addresses"
               value="billing"
               data-component="body">
    <br>
<p>Example: <code>billing</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>shipping</code></li> <li><code>billing</code></li> <li><code>both</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>label</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="label"                data-endpoint="POSTv1-addresses"
               value="b"
               data-component="body">
    <br>
<p>Must not be greater than 50 characters. Example: <code>b</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>first_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="first_name"                data-endpoint="POSTv1-addresses"
               value="n"
               data-component="body">
    <br>
<p>Must not be greater than 100 characters. Example: <code>n</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>last_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="last_name"                data-endpoint="POSTv1-addresses"
               value="g"
               data-component="body">
    <br>
<p>Must not be greater than 100 characters. Example: <code>g</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>phone</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="phone"                data-endpoint="POSTv1-addresses"
               value="zmiyvdljnikhwayk"
               data-component="body">
    <br>
<p>Must not be greater than 20 characters. Example: <code>zmiyvdljnikhwayk</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTv1-addresses"
               value="lyric80@example.com"
               data-component="body">
    <br>
<p>Must be a valid email address. Must not be greater than 255 characters. Example: <code>lyric80@example.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>street_line_1</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="street_line_1"                data-endpoint="POSTv1-addresses"
               value="p"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>p</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>street_line_2</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="street_line_2"                data-endpoint="POSTv1-addresses"
               value="w"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>w</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>city</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="city"                data-endpoint="POSTv1-addresses"
               value="l"
               data-component="body">
    <br>
<p>Must not be greater than 100 characters. Example: <code>l</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>state_province</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="state_province"                data-endpoint="POSTv1-addresses"
               value="v"
               data-component="body">
    <br>
<p>Must not be greater than 100 characters. Example: <code>v</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>postal_code</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="postal_code"                data-endpoint="POSTv1-addresses"
               value="qwrsitcpscqldzsn"
               data-component="body">
    <br>
<p>Must not be greater than 20 characters. Example: <code>qwrsitcpscqldzsn</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>country</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="country"                data-endpoint="POSTv1-addresses"
               value="rw"
               data-component="body">
    <br>
<p>Must be 2 characters. Example: <code>rw</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>delivery_instructions</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="delivery_instructions"                data-endpoint="POSTv1-addresses"
               value="t"
               data-component="body">
    <br>
<p>Must not be greater than 500 characters. Example: <code>t</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_default</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="POSTv1-addresses" style="display: none">
            <input type="radio" name="is_default"
                   value="true"
                   data-endpoint="POSTv1-addresses"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="POSTv1-addresses" style="display: none">
            <input type="radio" name="is_default"
                   value="false"
                   data-endpoint="POSTv1-addresses"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Example: <code>true</code></p>
        </div>
        </form>

                    <h2 id="addresses-GETv1-addresses--address_id-">Display the specified address.</h2>

<p>
</p>



<span id="example-requests-GETv1-addresses--address_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/v1/addresses/16" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/addresses/16"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETv1-addresses--address_id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETv1-addresses--address_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETv1-addresses--address_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETv1-addresses--address_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETv1-addresses--address_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETv1-addresses--address_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETv1-addresses--address_id-" data-method="GET"
      data-path="v1/addresses/{address_id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETv1-addresses--address_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETv1-addresses--address_id-"
                    onclick="tryItOut('GETv1-addresses--address_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETv1-addresses--address_id-"
                    onclick="cancelTryOut('GETv1-addresses--address_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETv1-addresses--address_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>v1/addresses/{address_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETv1-addresses--address_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETv1-addresses--address_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>address_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="address_id"                data-endpoint="GETv1-addresses--address_id-"
               value="16"
               data-component="url">
    <br>
<p>The ID of the address. Example: <code>16</code></p>
            </div>
                    </form>

                    <h2 id="addresses-PUTv1-addresses--address_id-">Update the specified address.</h2>

<p>
</p>



<span id="example-requests-PUTv1-addresses--address_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/v1/addresses/16" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"type\": \"shipping\",
    \"label\": \"b\",
    \"first_name\": \"n\",
    \"last_name\": \"g\",
    \"phone\": \"zmiyvdljnikhwayk\",
    \"email\": \"lyric80@example.com\",
    \"street_line_1\": \"p\",
    \"street_line_2\": \"w\",
    \"city\": \"l\",
    \"state_province\": \"v\",
    \"postal_code\": \"qwrsitcpscqldzsn\",
    \"country\": \"rw\",
    \"delivery_instructions\": \"t\",
    \"is_default\": false
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/addresses/16"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "type": "shipping",
    "label": "b",
    "first_name": "n",
    "last_name": "g",
    "phone": "zmiyvdljnikhwayk",
    "email": "lyric80@example.com",
    "street_line_1": "p",
    "street_line_2": "w",
    "city": "l",
    "state_province": "v",
    "postal_code": "qwrsitcpscqldzsn",
    "country": "rw",
    "delivery_instructions": "t",
    "is_default": false
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTv1-addresses--address_id-">
</span>
<span id="execution-results-PUTv1-addresses--address_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTv1-addresses--address_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTv1-addresses--address_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTv1-addresses--address_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTv1-addresses--address_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTv1-addresses--address_id-" data-method="PUT"
      data-path="v1/addresses/{address_id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTv1-addresses--address_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTv1-addresses--address_id-"
                    onclick="tryItOut('PUTv1-addresses--address_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTv1-addresses--address_id-"
                    onclick="cancelTryOut('PUTv1-addresses--address_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTv1-addresses--address_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>v1/addresses/{address_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTv1-addresses--address_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTv1-addresses--address_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>address_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="address_id"                data-endpoint="PUTv1-addresses--address_id-"
               value="16"
               data-component="url">
    <br>
<p>The ID of the address. Example: <code>16</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>type</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="type"                data-endpoint="PUTv1-addresses--address_id-"
               value="shipping"
               data-component="body">
    <br>
<p>Example: <code>shipping</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>shipping</code></li> <li><code>billing</code></li> <li><code>both</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>label</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="label"                data-endpoint="PUTv1-addresses--address_id-"
               value="b"
               data-component="body">
    <br>
<p>Must not be greater than 50 characters. Example: <code>b</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>first_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="first_name"                data-endpoint="PUTv1-addresses--address_id-"
               value="n"
               data-component="body">
    <br>
<p>Must not be greater than 100 characters. Example: <code>n</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>last_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="last_name"                data-endpoint="PUTv1-addresses--address_id-"
               value="g"
               data-component="body">
    <br>
<p>Must not be greater than 100 characters. Example: <code>g</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>phone</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="phone"                data-endpoint="PUTv1-addresses--address_id-"
               value="zmiyvdljnikhwayk"
               data-component="body">
    <br>
<p>Must not be greater than 20 characters. Example: <code>zmiyvdljnikhwayk</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="PUTv1-addresses--address_id-"
               value="lyric80@example.com"
               data-component="body">
    <br>
<p>Must be a valid email address. Must not be greater than 255 characters. Example: <code>lyric80@example.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>street_line_1</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="street_line_1"                data-endpoint="PUTv1-addresses--address_id-"
               value="p"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>p</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>street_line_2</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="street_line_2"                data-endpoint="PUTv1-addresses--address_id-"
               value="w"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>w</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>city</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="city"                data-endpoint="PUTv1-addresses--address_id-"
               value="l"
               data-component="body">
    <br>
<p>Must not be greater than 100 characters. Example: <code>l</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>state_province</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="state_province"                data-endpoint="PUTv1-addresses--address_id-"
               value="v"
               data-component="body">
    <br>
<p>Must not be greater than 100 characters. Example: <code>v</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>postal_code</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="postal_code"                data-endpoint="PUTv1-addresses--address_id-"
               value="qwrsitcpscqldzsn"
               data-component="body">
    <br>
<p>Must not be greater than 20 characters. Example: <code>qwrsitcpscqldzsn</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>country</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="country"                data-endpoint="PUTv1-addresses--address_id-"
               value="rw"
               data-component="body">
    <br>
<p>Must be 2 characters. Example: <code>rw</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>delivery_instructions</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="delivery_instructions"                data-endpoint="PUTv1-addresses--address_id-"
               value="t"
               data-component="body">
    <br>
<p>Must not be greater than 500 characters. Example: <code>t</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_default</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="PUTv1-addresses--address_id-" style="display: none">
            <input type="radio" name="is_default"
                   value="true"
                   data-endpoint="PUTv1-addresses--address_id-"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="PUTv1-addresses--address_id-" style="display: none">
            <input type="radio" name="is_default"
                   value="false"
                   data-endpoint="PUTv1-addresses--address_id-"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Example: <code>false</code></p>
        </div>
        </form>

                    <h2 id="addresses-DELETEv1-addresses--address_id-">Remove the specified address.</h2>

<p>
</p>



<span id="example-requests-DELETEv1-addresses--address_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/v1/addresses/16" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/addresses/16"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEv1-addresses--address_id-">
</span>
<span id="execution-results-DELETEv1-addresses--address_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEv1-addresses--address_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEv1-addresses--address_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEv1-addresses--address_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEv1-addresses--address_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEv1-addresses--address_id-" data-method="DELETE"
      data-path="v1/addresses/{address_id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEv1-addresses--address_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEv1-addresses--address_id-"
                    onclick="tryItOut('DELETEv1-addresses--address_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEv1-addresses--address_id-"
                    onclick="cancelTryOut('DELETEv1-addresses--address_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEv1-addresses--address_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>v1/addresses/{address_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEv1-addresses--address_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEv1-addresses--address_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>address_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="address_id"                data-endpoint="DELETEv1-addresses--address_id-"
               value="16"
               data-component="url">
    <br>
<p>The ID of the address. Example: <code>16</code></p>
            </div>
                    </form>

                    <h2 id="addresses-PATCHv1-addresses--address_id--set-default">Set address as default.</h2>

<p>
</p>



<span id="example-requests-PATCHv1-addresses--address_id--set-default">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PATCH \
    "http://localhost:8000/v1/addresses/16/set-default" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/addresses/16/set-default"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PATCH",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PATCHv1-addresses--address_id--set-default">
</span>
<span id="execution-results-PATCHv1-addresses--address_id--set-default" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PATCHv1-addresses--address_id--set-default"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PATCHv1-addresses--address_id--set-default"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PATCHv1-addresses--address_id--set-default" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PATCHv1-addresses--address_id--set-default">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PATCHv1-addresses--address_id--set-default" data-method="PATCH"
      data-path="v1/addresses/{address_id}/set-default"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PATCHv1-addresses--address_id--set-default', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PATCHv1-addresses--address_id--set-default"
                    onclick="tryItOut('PATCHv1-addresses--address_id--set-default');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PATCHv1-addresses--address_id--set-default"
                    onclick="cancelTryOut('PATCHv1-addresses--address_id--set-default');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PATCHv1-addresses--address_id--set-default"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>v1/addresses/{address_id}/set-default</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PATCHv1-addresses--address_id--set-default"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PATCHv1-addresses--address_id--set-default"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>address_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="address_id"                data-endpoint="PATCHv1-addresses--address_id--set-default"
               value="16"
               data-component="url">
    <br>
<p>The ID of the address. Example: <code>16</code></p>
            </div>
                    </form>

                <h1 id="admin-brands">Admin - Brands</h1>

    

                                <h2 id="admin-brands-POSTv1-admin-brands">Store a newly created brand.</h2>

<p>
</p>



<span id="example-requests-POSTv1-admin-brands">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/v1/admin/brands" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/admin/brands"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTv1-admin-brands">
</span>
<span id="execution-results-POSTv1-admin-brands" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTv1-admin-brands"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTv1-admin-brands"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTv1-admin-brands" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTv1-admin-brands">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTv1-admin-brands" data-method="POST"
      data-path="v1/admin/brands"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTv1-admin-brands', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTv1-admin-brands"
                    onclick="tryItOut('POSTv1-admin-brands');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTv1-admin-brands"
                    onclick="cancelTryOut('POSTv1-admin-brands');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTv1-admin-brands"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>v1/admin/brands</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTv1-admin-brands"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTv1-admin-brands"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="admin-brands-PUTv1-admin-brands--brand_id-">Update the specified brand.</h2>

<p>
</p>



<span id="example-requests-PUTv1-admin-brands--brand_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/v1/admin/brands/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/admin/brands/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTv1-admin-brands--brand_id-">
</span>
<span id="execution-results-PUTv1-admin-brands--brand_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTv1-admin-brands--brand_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTv1-admin-brands--brand_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTv1-admin-brands--brand_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTv1-admin-brands--brand_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTv1-admin-brands--brand_id-" data-method="PUT"
      data-path="v1/admin/brands/{brand_id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTv1-admin-brands--brand_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTv1-admin-brands--brand_id-"
                    onclick="tryItOut('PUTv1-admin-brands--brand_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTv1-admin-brands--brand_id-"
                    onclick="cancelTryOut('PUTv1-admin-brands--brand_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTv1-admin-brands--brand_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>v1/admin/brands/{brand_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTv1-admin-brands--brand_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTv1-admin-brands--brand_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>brand_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="brand_id"                data-endpoint="PUTv1-admin-brands--brand_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the brand. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="admin-brands-PATCHv1-admin-brands--brand_id--status">Update brand status.</h2>

<p>
</p>



<span id="example-requests-PATCHv1-admin-brands--brand_id--status">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PATCH \
    "http://localhost:8000/v1/admin/brands/1/status" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/admin/brands/1/status"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PATCH",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PATCHv1-admin-brands--brand_id--status">
</span>
<span id="execution-results-PATCHv1-admin-brands--brand_id--status" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PATCHv1-admin-brands--brand_id--status"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PATCHv1-admin-brands--brand_id--status"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PATCHv1-admin-brands--brand_id--status" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PATCHv1-admin-brands--brand_id--status">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PATCHv1-admin-brands--brand_id--status" data-method="PATCH"
      data-path="v1/admin/brands/{brand_id}/status"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PATCHv1-admin-brands--brand_id--status', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PATCHv1-admin-brands--brand_id--status"
                    onclick="tryItOut('PATCHv1-admin-brands--brand_id--status');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PATCHv1-admin-brands--brand_id--status"
                    onclick="cancelTryOut('PATCHv1-admin-brands--brand_id--status');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PATCHv1-admin-brands--brand_id--status"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>v1/admin/brands/{brand_id}/status</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PATCHv1-admin-brands--brand_id--status"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PATCHv1-admin-brands--brand_id--status"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>brand_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="brand_id"                data-endpoint="PATCHv1-admin-brands--brand_id--status"
               value="1"
               data-component="url">
    <br>
<p>The ID of the brand. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="admin-brands-DELETEv1-admin-brands--brand_id-">Remove the specified brand.</h2>

<p>
</p>



<span id="example-requests-DELETEv1-admin-brands--brand_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/v1/admin/brands/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/admin/brands/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEv1-admin-brands--brand_id-">
</span>
<span id="execution-results-DELETEv1-admin-brands--brand_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEv1-admin-brands--brand_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEv1-admin-brands--brand_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEv1-admin-brands--brand_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEv1-admin-brands--brand_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEv1-admin-brands--brand_id-" data-method="DELETE"
      data-path="v1/admin/brands/{brand_id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEv1-admin-brands--brand_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEv1-admin-brands--brand_id-"
                    onclick="tryItOut('DELETEv1-admin-brands--brand_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEv1-admin-brands--brand_id-"
                    onclick="cancelTryOut('DELETEv1-admin-brands--brand_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEv1-admin-brands--brand_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>v1/admin/brands/{brand_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEv1-admin-brands--brand_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEv1-admin-brands--brand_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>brand_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="brand_id"                data-endpoint="DELETEv1-admin-brands--brand_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the brand. Example: <code>1</code></p>
            </div>
                    </form>

                <h1 id="admin-categories">Admin - Categories</h1>

    

                                <h2 id="admin-categories-POSTv1-admin-categories">Create a new category.</h2>

<p>
</p>



<span id="example-requests-POSTv1-admin-categories">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/v1/admin/categories" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "name=b"\
    --form "description=Eius et animi quos velit et."\
    --form "status=inactive"\
    --form "image=@/tmp/phpp1ofl9abv51l6eMSd0U" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/admin/categories"
);

const headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('name', 'b');
body.append('description', 'Eius et animi quos velit et.');
body.append('status', 'inactive');
body.append('image', document.querySelector('input[name="image"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTv1-admin-categories">
</span>
<span id="execution-results-POSTv1-admin-categories" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTv1-admin-categories"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTv1-admin-categories"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTv1-admin-categories" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTv1-admin-categories">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTv1-admin-categories" data-method="POST"
      data-path="v1/admin/categories"
      data-authed="0"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTv1-admin-categories', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTv1-admin-categories"
                    onclick="tryItOut('POSTv1-admin-categories');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTv1-admin-categories"
                    onclick="cancelTryOut('POSTv1-admin-categories');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTv1-admin-categories"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>v1/admin/categories</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTv1-admin-categories"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTv1-admin-categories"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTv1-admin-categories"
               value="b"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>b</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="POSTv1-admin-categories"
               value="Eius et animi quos velit et."
               data-component="body">
    <br>
<p>Example: <code>Eius et animi quos velit et.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>parent_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="parent_id"                data-endpoint="POSTv1-admin-categories"
               value=""
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the categories table.</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>image</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="image"                data-endpoint="POSTv1-admin-categories"
               value=""
               data-component="body">
    <br>
<p>Must be an image. Must not be greater than 2048 kilobytes. Example: <code>/tmp/phpp1ofl9abv51l6eMSd0U</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="POSTv1-admin-categories"
               value="inactive"
               data-component="body">
    <br>
<p>Example: <code>inactive</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>active</code></li> <li><code>inactive</code></li></ul>
        </div>
        </form>

                    <h2 id="admin-categories-PUTv1-admin-categories-edit--category_id-">Update category.</h2>

<p>
</p>



<span id="example-requests-PUTv1-admin-categories-edit--category_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/v1/admin/categories/edit/1" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "description=Eius et animi quos velit et."\
    --form "status=active"\
    --form "image=@/tmp/phpffpl6jk5a9kvcSgGz9V" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/admin/categories/edit/1"
);

const headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('description', 'Eius et animi quos velit et.');
body.append('status', 'active');
body.append('image', document.querySelector('input[name="image"]').files[0]);

fetch(url, {
    method: "PUT",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTv1-admin-categories-edit--category_id-">
</span>
<span id="execution-results-PUTv1-admin-categories-edit--category_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTv1-admin-categories-edit--category_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTv1-admin-categories-edit--category_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTv1-admin-categories-edit--category_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTv1-admin-categories-edit--category_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTv1-admin-categories-edit--category_id-" data-method="PUT"
      data-path="v1/admin/categories/edit/{category_id}"
      data-authed="0"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTv1-admin-categories-edit--category_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTv1-admin-categories-edit--category_id-"
                    onclick="tryItOut('PUTv1-admin-categories-edit--category_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTv1-admin-categories-edit--category_id-"
                    onclick="cancelTryOut('PUTv1-admin-categories-edit--category_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTv1-admin-categories-edit--category_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>v1/admin/categories/edit/{category_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTv1-admin-categories-edit--category_id-"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTv1-admin-categories-edit--category_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>category_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="category_id"                data-endpoint="PUTv1-admin-categories-edit--category_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the category. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTv1-admin-categories-edit--category_id-"
               value=""
               data-component="body">
    <br>

        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="PUTv1-admin-categories-edit--category_id-"
               value="Eius et animi quos velit et."
               data-component="body">
    <br>
<p>Must not be greater than 500 characters. Example: <code>Eius et animi quos velit et.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>parent_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="parent_id"                data-endpoint="PUTv1-admin-categories-edit--category_id-"
               value=""
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the categories table.</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>image</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="image"                data-endpoint="PUTv1-admin-categories-edit--category_id-"
               value=""
               data-component="body">
    <br>
<p>Must be an image. Must not be greater than 2048 kilobytes. Example: <code>/tmp/phpffpl6jk5a9kvcSgGz9V</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="PUTv1-admin-categories-edit--category_id-"
               value="active"
               data-component="body">
    <br>
<p>Example: <code>active</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>active</code></li> <li><code>inactive</code></li></ul>
        </div>
        </form>

                    <h2 id="admin-categories-PATCHv1-admin-categories--category_id--status">Update category status.</h2>

<p>
</p>



<span id="example-requests-PATCHv1-admin-categories--category_id--status">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PATCH \
    "http://localhost:8000/v1/admin/categories/1/status" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"status\": \"inactive\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/admin/categories/1/status"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "status": "inactive"
};

fetch(url, {
    method: "PATCH",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PATCHv1-admin-categories--category_id--status">
</span>
<span id="execution-results-PATCHv1-admin-categories--category_id--status" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PATCHv1-admin-categories--category_id--status"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PATCHv1-admin-categories--category_id--status"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PATCHv1-admin-categories--category_id--status" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PATCHv1-admin-categories--category_id--status">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PATCHv1-admin-categories--category_id--status" data-method="PATCH"
      data-path="v1/admin/categories/{category_id}/status"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PATCHv1-admin-categories--category_id--status', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PATCHv1-admin-categories--category_id--status"
                    onclick="tryItOut('PATCHv1-admin-categories--category_id--status');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PATCHv1-admin-categories--category_id--status"
                    onclick="cancelTryOut('PATCHv1-admin-categories--category_id--status');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PATCHv1-admin-categories--category_id--status"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>v1/admin/categories/{category_id}/status</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PATCHv1-admin-categories--category_id--status"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PATCHv1-admin-categories--category_id--status"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>category_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="category_id"                data-endpoint="PATCHv1-admin-categories--category_id--status"
               value="1"
               data-component="url">
    <br>
<p>The ID of the category. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="PATCHv1-admin-categories--category_id--status"
               value="inactive"
               data-component="body">
    <br>
<p>Example: <code>inactive</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>active</code></li> <li><code>inactive</code></li></ul>
        </div>
        </form>

                    <h2 id="admin-categories-DELETEv1-admin-categories--category_id-">Delete category.</h2>

<p>
</p>



<span id="example-requests-DELETEv1-admin-categories--category_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/v1/admin/categories/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/admin/categories/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEv1-admin-categories--category_id-">
</span>
<span id="execution-results-DELETEv1-admin-categories--category_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEv1-admin-categories--category_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEv1-admin-categories--category_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEv1-admin-categories--category_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEv1-admin-categories--category_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEv1-admin-categories--category_id-" data-method="DELETE"
      data-path="v1/admin/categories/{category_id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEv1-admin-categories--category_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEv1-admin-categories--category_id-"
                    onclick="tryItOut('DELETEv1-admin-categories--category_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEv1-admin-categories--category_id-"
                    onclick="cancelTryOut('DELETEv1-admin-categories--category_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEv1-admin-categories--category_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>v1/admin/categories/{category_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEv1-admin-categories--category_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEv1-admin-categories--category_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>category_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="category_id"                data-endpoint="DELETEv1-admin-categories--category_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the category. Example: <code>1</code></p>
            </div>
                    </form>

                <h1 id="admin-coupons">Admin - Coupons</h1>

    

                                <h2 id="admin-coupons-GETv1-admin-coupons">Get all coupons (Admin only).</h2>

<p>
</p>



<span id="example-requests-GETv1-admin-coupons">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/v1/admin/coupons" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/admin/coupons"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETv1-admin-coupons">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETv1-admin-coupons" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETv1-admin-coupons"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETv1-admin-coupons"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETv1-admin-coupons" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETv1-admin-coupons">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETv1-admin-coupons" data-method="GET"
      data-path="v1/admin/coupons"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETv1-admin-coupons', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETv1-admin-coupons"
                    onclick="tryItOut('GETv1-admin-coupons');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETv1-admin-coupons"
                    onclick="cancelTryOut('GETv1-admin-coupons');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETv1-admin-coupons"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>v1/admin/coupons</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETv1-admin-coupons"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETv1-admin-coupons"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="admin-coupons-POSTv1-admin-coupons">Create coupon (Admin only).</h2>

<p>
</p>



<span id="example-requests-POSTv1-admin-coupons">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/v1/admin/coupons" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"code\": \"b\",
    \"description\": \"Et animi quos velit et fugiat.\",
    \"type\": \"fixed\",
    \"value\": 42,
    \"min_purchase\": 37,
    \"max_discount\": 9,
    \"usage_limit\": 2,
    \"per_user_limit\": 35,
    \"valid_from\": \"2025-12-31T10:52:53\",
    \"valid_to\": \"2052-01-24\",
    \"is_active\": false
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/admin/coupons"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "code": "b",
    "description": "Et animi quos velit et fugiat.",
    "type": "fixed",
    "value": 42,
    "min_purchase": 37,
    "max_discount": 9,
    "usage_limit": 2,
    "per_user_limit": 35,
    "valid_from": "2025-12-31T10:52:53",
    "valid_to": "2052-01-24",
    "is_active": false
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTv1-admin-coupons">
</span>
<span id="execution-results-POSTv1-admin-coupons" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTv1-admin-coupons"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTv1-admin-coupons"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTv1-admin-coupons" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTv1-admin-coupons">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTv1-admin-coupons" data-method="POST"
      data-path="v1/admin/coupons"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTv1-admin-coupons', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTv1-admin-coupons"
                    onclick="tryItOut('POSTv1-admin-coupons');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTv1-admin-coupons"
                    onclick="cancelTryOut('POSTv1-admin-coupons');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTv1-admin-coupons"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>v1/admin/coupons</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTv1-admin-coupons"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTv1-admin-coupons"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>code</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="code"                data-endpoint="POSTv1-admin-coupons"
               value="b"
               data-component="body">
    <br>
<p>Must not be greater than 50 characters. Example: <code>b</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="POSTv1-admin-coupons"
               value="Et animi quos velit et fugiat."
               data-component="body">
    <br>
<p>Must not be greater than 500 characters. Example: <code>Et animi quos velit et fugiat.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>type</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="type"                data-endpoint="POSTv1-admin-coupons"
               value="fixed"
               data-component="body">
    <br>
<p>Example: <code>fixed</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>percentage</code></li> <li><code>fixed</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>value</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="value"                data-endpoint="POSTv1-admin-coupons"
               value="42"
               data-component="body">
    <br>
<p>Must be at least 0. Example: <code>42</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>min_purchase</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="min_purchase"                data-endpoint="POSTv1-admin-coupons"
               value="37"
               data-component="body">
    <br>
<p>Must be at least 0. Example: <code>37</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>max_discount</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="max_discount"                data-endpoint="POSTv1-admin-coupons"
               value="9"
               data-component="body">
    <br>
<p>Must be at least 0. Example: <code>9</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>usage_limit</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="usage_limit"                data-endpoint="POSTv1-admin-coupons"
               value="2"
               data-component="body">
    <br>
<p>Must be at least 1. Example: <code>2</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>per_user_limit</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="per_user_limit"                data-endpoint="POSTv1-admin-coupons"
               value="35"
               data-component="body">
    <br>
<p>Must be at least 1. Example: <code>35</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>valid_from</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="valid_from"                data-endpoint="POSTv1-admin-coupons"
               value="2025-12-31T10:52:53"
               data-component="body">
    <br>
<p>Must be a valid date. Example: <code>2025-12-31T10:52:53</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>valid_to</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="valid_to"                data-endpoint="POSTv1-admin-coupons"
               value="2052-01-24"
               data-component="body">
    <br>
<p>Must be a valid date. Must be a date after <code>valid_from</code>. Example: <code>2052-01-24</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_active</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="POSTv1-admin-coupons" style="display: none">
            <input type="radio" name="is_active"
                   value="true"
                   data-endpoint="POSTv1-admin-coupons"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="POSTv1-admin-coupons" style="display: none">
            <input type="radio" name="is_active"
                   value="false"
                   data-endpoint="POSTv1-admin-coupons"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Example: <code>false</code></p>
        </div>
        </form>

                    <h2 id="admin-coupons-GETv1-admin-coupons--coupon_id-">Get coupon details (Admin only).</h2>

<p>
</p>



<span id="example-requests-GETv1-admin-coupons--coupon_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/v1/admin/coupons/16" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/admin/coupons/16"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETv1-admin-coupons--coupon_id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETv1-admin-coupons--coupon_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETv1-admin-coupons--coupon_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETv1-admin-coupons--coupon_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETv1-admin-coupons--coupon_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETv1-admin-coupons--coupon_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETv1-admin-coupons--coupon_id-" data-method="GET"
      data-path="v1/admin/coupons/{coupon_id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETv1-admin-coupons--coupon_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETv1-admin-coupons--coupon_id-"
                    onclick="tryItOut('GETv1-admin-coupons--coupon_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETv1-admin-coupons--coupon_id-"
                    onclick="cancelTryOut('GETv1-admin-coupons--coupon_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETv1-admin-coupons--coupon_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>v1/admin/coupons/{coupon_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETv1-admin-coupons--coupon_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETv1-admin-coupons--coupon_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>coupon_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="coupon_id"                data-endpoint="GETv1-admin-coupons--coupon_id-"
               value="16"
               data-component="url">
    <br>
<p>The ID of the coupon. Example: <code>16</code></p>
            </div>
                    </form>

                    <h2 id="admin-coupons-PUTv1-admin-coupons--coupon_id-">Update coupon (Admin only).</h2>

<p>
</p>



<span id="example-requests-PUTv1-admin-coupons--coupon_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/v1/admin/coupons/16" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"code\": \"b\",
    \"description\": \"Et animi quos velit et fugiat.\",
    \"type\": \"percentage\",
    \"value\": 42,
    \"min_purchase\": 37,
    \"max_discount\": 9,
    \"usage_limit\": 2,
    \"per_user_limit\": 35,
    \"valid_from\": \"2025-12-31T10:52:53\",
    \"valid_to\": \"2052-01-24\",
    \"is_active\": false
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/admin/coupons/16"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "code": "b",
    "description": "Et animi quos velit et fugiat.",
    "type": "percentage",
    "value": 42,
    "min_purchase": 37,
    "max_discount": 9,
    "usage_limit": 2,
    "per_user_limit": 35,
    "valid_from": "2025-12-31T10:52:53",
    "valid_to": "2052-01-24",
    "is_active": false
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTv1-admin-coupons--coupon_id-">
</span>
<span id="execution-results-PUTv1-admin-coupons--coupon_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTv1-admin-coupons--coupon_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTv1-admin-coupons--coupon_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTv1-admin-coupons--coupon_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTv1-admin-coupons--coupon_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTv1-admin-coupons--coupon_id-" data-method="PUT"
      data-path="v1/admin/coupons/{coupon_id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTv1-admin-coupons--coupon_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTv1-admin-coupons--coupon_id-"
                    onclick="tryItOut('PUTv1-admin-coupons--coupon_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTv1-admin-coupons--coupon_id-"
                    onclick="cancelTryOut('PUTv1-admin-coupons--coupon_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTv1-admin-coupons--coupon_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>v1/admin/coupons/{coupon_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTv1-admin-coupons--coupon_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTv1-admin-coupons--coupon_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>coupon_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="coupon_id"                data-endpoint="PUTv1-admin-coupons--coupon_id-"
               value="16"
               data-component="url">
    <br>
<p>The ID of the coupon. Example: <code>16</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>code</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="code"                data-endpoint="PUTv1-admin-coupons--coupon_id-"
               value="b"
               data-component="body">
    <br>
<p>Must not be greater than 50 characters. Example: <code>b</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="PUTv1-admin-coupons--coupon_id-"
               value="Et animi quos velit et fugiat."
               data-component="body">
    <br>
<p>Must not be greater than 500 characters. Example: <code>Et animi quos velit et fugiat.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>type</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="type"                data-endpoint="PUTv1-admin-coupons--coupon_id-"
               value="percentage"
               data-component="body">
    <br>
<p>Example: <code>percentage</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>percentage</code></li> <li><code>fixed</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>value</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="value"                data-endpoint="PUTv1-admin-coupons--coupon_id-"
               value="42"
               data-component="body">
    <br>
<p>Must be at least 0. Example: <code>42</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>min_purchase</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="min_purchase"                data-endpoint="PUTv1-admin-coupons--coupon_id-"
               value="37"
               data-component="body">
    <br>
<p>Must be at least 0. Example: <code>37</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>max_discount</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="max_discount"                data-endpoint="PUTv1-admin-coupons--coupon_id-"
               value="9"
               data-component="body">
    <br>
<p>Must be at least 0. Example: <code>9</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>usage_limit</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="usage_limit"                data-endpoint="PUTv1-admin-coupons--coupon_id-"
               value="2"
               data-component="body">
    <br>
<p>Must be at least 1. Example: <code>2</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>per_user_limit</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="per_user_limit"                data-endpoint="PUTv1-admin-coupons--coupon_id-"
               value="35"
               data-component="body">
    <br>
<p>Must be at least 1. Example: <code>35</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>valid_from</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="valid_from"                data-endpoint="PUTv1-admin-coupons--coupon_id-"
               value="2025-12-31T10:52:53"
               data-component="body">
    <br>
<p>Must be a valid date. Example: <code>2025-12-31T10:52:53</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>valid_to</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="valid_to"                data-endpoint="PUTv1-admin-coupons--coupon_id-"
               value="2052-01-24"
               data-component="body">
    <br>
<p>Must be a valid date. Must be a date after <code>valid_from</code>. Example: <code>2052-01-24</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_active</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="PUTv1-admin-coupons--coupon_id-" style="display: none">
            <input type="radio" name="is_active"
                   value="true"
                   data-endpoint="PUTv1-admin-coupons--coupon_id-"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="PUTv1-admin-coupons--coupon_id-" style="display: none">
            <input type="radio" name="is_active"
                   value="false"
                   data-endpoint="PUTv1-admin-coupons--coupon_id-"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Example: <code>false</code></p>
        </div>
        </form>

                    <h2 id="admin-coupons-DELETEv1-admin-coupons--coupon_id-">Delete coupon (Admin only).</h2>

<p>
</p>



<span id="example-requests-DELETEv1-admin-coupons--coupon_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/v1/admin/coupons/16" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/admin/coupons/16"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEv1-admin-coupons--coupon_id-">
</span>
<span id="execution-results-DELETEv1-admin-coupons--coupon_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEv1-admin-coupons--coupon_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEv1-admin-coupons--coupon_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEv1-admin-coupons--coupon_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEv1-admin-coupons--coupon_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEv1-admin-coupons--coupon_id-" data-method="DELETE"
      data-path="v1/admin/coupons/{coupon_id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEv1-admin-coupons--coupon_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEv1-admin-coupons--coupon_id-"
                    onclick="tryItOut('DELETEv1-admin-coupons--coupon_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEv1-admin-coupons--coupon_id-"
                    onclick="cancelTryOut('DELETEv1-admin-coupons--coupon_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEv1-admin-coupons--coupon_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>v1/admin/coupons/{coupon_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEv1-admin-coupons--coupon_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEv1-admin-coupons--coupon_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>coupon_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="coupon_id"                data-endpoint="DELETEv1-admin-coupons--coupon_id-"
               value="16"
               data-component="url">
    <br>
<p>The ID of the coupon. Example: <code>16</code></p>
            </div>
                    </form>

                <h1 id="admin-payments">Admin - Payments</h1>

    

                                <h2 id="admin-payments-PATCHv1-admin-payments--payment_id--refund">Process refund (Admin only - will be in admin routes).</h2>

<p>
</p>



<span id="example-requests-PATCHv1-admin-payments--payment_id--refund">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PATCH \
    "http://localhost:8000/v1/admin/payments/16/refund" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/admin/payments/16/refund"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PATCH",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PATCHv1-admin-payments--payment_id--refund">
</span>
<span id="execution-results-PATCHv1-admin-payments--payment_id--refund" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PATCHv1-admin-payments--payment_id--refund"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PATCHv1-admin-payments--payment_id--refund"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PATCHv1-admin-payments--payment_id--refund" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PATCHv1-admin-payments--payment_id--refund">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PATCHv1-admin-payments--payment_id--refund" data-method="PATCH"
      data-path="v1/admin/payments/{payment_id}/refund"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PATCHv1-admin-payments--payment_id--refund', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PATCHv1-admin-payments--payment_id--refund"
                    onclick="tryItOut('PATCHv1-admin-payments--payment_id--refund');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PATCHv1-admin-payments--payment_id--refund"
                    onclick="cancelTryOut('PATCHv1-admin-payments--payment_id--refund');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PATCHv1-admin-payments--payment_id--refund"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>v1/admin/payments/{payment_id}/refund</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PATCHv1-admin-payments--payment_id--refund"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PATCHv1-admin-payments--payment_id--refund"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>payment_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="payment_id"                data-endpoint="PATCHv1-admin-payments--payment_id--refund"
               value="16"
               data-component="url">
    <br>
<p>The ID of the payment. Example: <code>16</code></p>
            </div>
                    </form>

                <h1 id="admin-products">Admin - Products</h1>

    

                                <h2 id="admin-products-POSTv1-admin-products">Store a newly created product.</h2>

<p>
</p>



<span id="example-requests-POSTv1-admin-products">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/v1/admin/products" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "name=b"\
    --form "description=Eius et animi quos velit et."\
    --form "category_id=architecto"\
    --form "brand_id=architecto"\
    --form "price=39"\
    --form "discount_price=84"\
    --form "stock=12"\
    --form "sku=architecto"\
    --form "status=active"\
    --form "image_url=@/tmp/php2irqr82c08m22b3ggeu" \
    --form "gallery[]=@/tmp/phpj78qbne1li40dozrXk7" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/admin/products"
);

const headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('name', 'b');
body.append('description', 'Eius et animi quos velit et.');
body.append('category_id', 'architecto');
body.append('brand_id', 'architecto');
body.append('price', '39');
body.append('discount_price', '84');
body.append('stock', '12');
body.append('sku', 'architecto');
body.append('status', 'active');
body.append('image_url', document.querySelector('input[name="image_url"]').files[0]);
body.append('gallery[]', document.querySelector('input[name="gallery[]"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTv1-admin-products">
</span>
<span id="execution-results-POSTv1-admin-products" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTv1-admin-products"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTv1-admin-products"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTv1-admin-products" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTv1-admin-products">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTv1-admin-products" data-method="POST"
      data-path="v1/admin/products"
      data-authed="0"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTv1-admin-products', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTv1-admin-products"
                    onclick="tryItOut('POSTv1-admin-products');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTv1-admin-products"
                    onclick="cancelTryOut('POSTv1-admin-products');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTv1-admin-products"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>v1/admin/products</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTv1-admin-products"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTv1-admin-products"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTv1-admin-products"
               value="b"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>b</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="POSTv1-admin-products"
               value="Eius et animi quos velit et."
               data-component="body">
    <br>
<p>Example: <code>Eius et animi quos velit et.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>category_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="category_id"                data-endpoint="POSTv1-admin-products"
               value="architecto"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the categories table. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>brand_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="brand_id"                data-endpoint="POSTv1-admin-products"
               value="architecto"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the brands table. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>price</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="price"                data-endpoint="POSTv1-admin-products"
               value="39"
               data-component="body">
    <br>
<p>Must be at least 0. Example: <code>39</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>discount_price</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="discount_price"                data-endpoint="POSTv1-admin-products"
               value="84"
               data-component="body">
    <br>
<p>Must be at least 0. Example: <code>84</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>stock</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="stock"                data-endpoint="POSTv1-admin-products"
               value="12"
               data-component="body">
    <br>
<p>Must be at least 0. Example: <code>12</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>sku</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="sku"                data-endpoint="POSTv1-admin-products"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>image_url</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="image_url"                data-endpoint="POSTv1-admin-products"
               value=""
               data-component="body">
    <br>
<p>Must be an image. Must not be greater than 2048 kilobytes. Example: <code>/tmp/php2irqr82c08m22b3ggeu</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="POSTv1-admin-products"
               value="active"
               data-component="body">
    <br>
<p>Example: <code>active</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>active</code></li> <li><code>inactive</code></li> <li><code>draft</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>gallery</code></b>&nbsp;&nbsp;
<small>file[]</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="gallery[0]"                data-endpoint="POSTv1-admin-products"
               data-component="body">
        <input type="file" style="display: none"
               name="gallery[1]"                data-endpoint="POSTv1-admin-products"
               data-component="body">
    <br>
<p>Must be an image. Must not be greater than 2048 kilobytes.</p>
        </div>
        </form>

                    <h2 id="admin-products-PUTv1-admin-products--product_id-">Update the specified product.</h2>

<p>
</p>



<span id="example-requests-PUTv1-admin-products--product_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/v1/admin/products/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"b\",
    \"description\": \"Eius et animi quos velit et.\",
    \"price\": 60,
    \"discount_price\": 42,
    \"stock\": 37,
    \"sku\": \"architecto\",
    \"image_url\": \"http:\\/\\/bailey.com\\/\",
    \"gallery\": [
        \"http:\\/\\/rempel.com\\/sunt-nihil-accusantium-harum-mollitia\"
    ],
    \"rating\": 0,
    \"status\": \"active\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/admin/products/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "b",
    "description": "Eius et animi quos velit et.",
    "price": 60,
    "discount_price": 42,
    "stock": 37,
    "sku": "architecto",
    "image_url": "http:\/\/bailey.com\/",
    "gallery": [
        "http:\/\/rempel.com\/sunt-nihil-accusantium-harum-mollitia"
    ],
    "rating": 0,
    "status": "active"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTv1-admin-products--product_id-">
</span>
<span id="execution-results-PUTv1-admin-products--product_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTv1-admin-products--product_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTv1-admin-products--product_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTv1-admin-products--product_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTv1-admin-products--product_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTv1-admin-products--product_id-" data-method="PUT"
      data-path="v1/admin/products/{product_id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTv1-admin-products--product_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTv1-admin-products--product_id-"
                    onclick="tryItOut('PUTv1-admin-products--product_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTv1-admin-products--product_id-"
                    onclick="cancelTryOut('PUTv1-admin-products--product_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTv1-admin-products--product_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>v1/admin/products/{product_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTv1-admin-products--product_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTv1-admin-products--product_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>product_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="product_id"                data-endpoint="PUTv1-admin-products--product_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the product. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTv1-admin-products--product_id-"
               value="b"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>b</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="PUTv1-admin-products--product_id-"
               value="Eius et animi quos velit et."
               data-component="body">
    <br>
<p>Example: <code>Eius et animi quos velit et.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>category_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="category_id"                data-endpoint="PUTv1-admin-products--product_id-"
               value=""
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the categories table.</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>brand_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="brand_id"                data-endpoint="PUTv1-admin-products--product_id-"
               value=""
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the brands table.</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>price</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="price"                data-endpoint="PUTv1-admin-products--product_id-"
               value="60"
               data-component="body">
    <br>
<p>Must be at least 0. Example: <code>60</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>discount_price</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="discount_price"                data-endpoint="PUTv1-admin-products--product_id-"
               value="42"
               data-component="body">
    <br>
<p>Must be at least 0. Example: <code>42</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>stock</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="stock"                data-endpoint="PUTv1-admin-products--product_id-"
               value="37"
               data-component="body">
    <br>
<p>Must be at least 0. Example: <code>37</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>sku</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="sku"                data-endpoint="PUTv1-admin-products--product_id-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>image_url</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="image_url"                data-endpoint="PUTv1-admin-products--product_id-"
               value="http://bailey.com/"
               data-component="body">
    <br>
<p>Must be a valid URL. Example: <code>http://bailey.com/</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>gallery</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="gallery[0]"                data-endpoint="PUTv1-admin-products--product_id-"
               data-component="body">
        <input type="text" style="display: none"
               name="gallery[1]"                data-endpoint="PUTv1-admin-products--product_id-"
               data-component="body">
    <br>
<p>Must be a valid URL.</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>rating</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="rating"                data-endpoint="PUTv1-admin-products--product_id-"
               value="0"
               data-component="body">
    <br>
<p>Must be between 0 and 5. Example: <code>0</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="PUTv1-admin-products--product_id-"
               value="active"
               data-component="body">
    <br>
<p>Example: <code>active</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>active</code></li> <li><code>inactive</code></li> <li><code>draft</code></li></ul>
        </div>
        </form>

                    <h2 id="admin-products-PATCHv1-admin-products--product_id--status">Toggle product status between active and inactive.</h2>

<p>
</p>



<span id="example-requests-PATCHv1-admin-products--product_id--status">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PATCH \
    "http://localhost:8000/v1/admin/products/1/status" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/admin/products/1/status"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PATCH",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PATCHv1-admin-products--product_id--status">
</span>
<span id="execution-results-PATCHv1-admin-products--product_id--status" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PATCHv1-admin-products--product_id--status"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PATCHv1-admin-products--product_id--status"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PATCHv1-admin-products--product_id--status" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PATCHv1-admin-products--product_id--status">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PATCHv1-admin-products--product_id--status" data-method="PATCH"
      data-path="v1/admin/products/{product_id}/status"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PATCHv1-admin-products--product_id--status', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PATCHv1-admin-products--product_id--status"
                    onclick="tryItOut('PATCHv1-admin-products--product_id--status');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PATCHv1-admin-products--product_id--status"
                    onclick="cancelTryOut('PATCHv1-admin-products--product_id--status');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PATCHv1-admin-products--product_id--status"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>v1/admin/products/{product_id}/status</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PATCHv1-admin-products--product_id--status"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PATCHv1-admin-products--product_id--status"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>product_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="product_id"                data-endpoint="PATCHv1-admin-products--product_id--status"
               value="1"
               data-component="url">
    <br>
<p>The ID of the product. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="admin-products-DELETEv1-admin-products--product_id-">Remove the specified product.</h2>

<p>
</p>



<span id="example-requests-DELETEv1-admin-products--product_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/v1/admin/products/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/admin/products/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEv1-admin-products--product_id-">
</span>
<span id="execution-results-DELETEv1-admin-products--product_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEv1-admin-products--product_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEv1-admin-products--product_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEv1-admin-products--product_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEv1-admin-products--product_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEv1-admin-products--product_id-" data-method="DELETE"
      data-path="v1/admin/products/{product_id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEv1-admin-products--product_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEv1-admin-products--product_id-"
                    onclick="tryItOut('DELETEv1-admin-products--product_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEv1-admin-products--product_id-"
                    onclick="cancelTryOut('DELETEv1-admin-products--product_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEv1-admin-products--product_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>v1/admin/products/{product_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEv1-admin-products--product_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEv1-admin-products--product_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>product_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="product_id"                data-endpoint="DELETEv1-admin-products--product_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the product. Example: <code>1</code></p>
            </div>
                    </form>

                <h1 id="admin-reviews">Admin - Reviews</h1>

    

                                <h2 id="admin-reviews-GETv1-admin-reviews">Get all reviews (Admin only).</h2>

<p>
</p>



<span id="example-requests-GETv1-admin-reviews">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/v1/admin/reviews" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/admin/reviews"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETv1-admin-reviews">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETv1-admin-reviews" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETv1-admin-reviews"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETv1-admin-reviews"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETv1-admin-reviews" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETv1-admin-reviews">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETv1-admin-reviews" data-method="GET"
      data-path="v1/admin/reviews"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETv1-admin-reviews', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETv1-admin-reviews"
                    onclick="tryItOut('GETv1-admin-reviews');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETv1-admin-reviews"
                    onclick="cancelTryOut('GETv1-admin-reviews');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETv1-admin-reviews"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>v1/admin/reviews</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETv1-admin-reviews"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETv1-admin-reviews"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="admin-reviews-PATCHv1-admin-reviews--review_id--approve">Approve review (Admin only).</h2>

<p>
</p>



<span id="example-requests-PATCHv1-admin-reviews--review_id--approve">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PATCH \
    "http://localhost:8000/v1/admin/reviews/16/approve" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/admin/reviews/16/approve"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PATCH",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PATCHv1-admin-reviews--review_id--approve">
</span>
<span id="execution-results-PATCHv1-admin-reviews--review_id--approve" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PATCHv1-admin-reviews--review_id--approve"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PATCHv1-admin-reviews--review_id--approve"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PATCHv1-admin-reviews--review_id--approve" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PATCHv1-admin-reviews--review_id--approve">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PATCHv1-admin-reviews--review_id--approve" data-method="PATCH"
      data-path="v1/admin/reviews/{review_id}/approve"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PATCHv1-admin-reviews--review_id--approve', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PATCHv1-admin-reviews--review_id--approve"
                    onclick="tryItOut('PATCHv1-admin-reviews--review_id--approve');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PATCHv1-admin-reviews--review_id--approve"
                    onclick="cancelTryOut('PATCHv1-admin-reviews--review_id--approve');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PATCHv1-admin-reviews--review_id--approve"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>v1/admin/reviews/{review_id}/approve</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PATCHv1-admin-reviews--review_id--approve"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PATCHv1-admin-reviews--review_id--approve"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>review_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="review_id"                data-endpoint="PATCHv1-admin-reviews--review_id--approve"
               value="16"
               data-component="url">
    <br>
<p>The ID of the review. Example: <code>16</code></p>
            </div>
                    </form>

                    <h2 id="admin-reviews-PATCHv1-admin-reviews--review_id--reject">Reject review (Admin only).</h2>

<p>
</p>



<span id="example-requests-PATCHv1-admin-reviews--review_id--reject">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PATCH \
    "http://localhost:8000/v1/admin/reviews/16/reject" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/admin/reviews/16/reject"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PATCH",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PATCHv1-admin-reviews--review_id--reject">
</span>
<span id="execution-results-PATCHv1-admin-reviews--review_id--reject" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PATCHv1-admin-reviews--review_id--reject"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PATCHv1-admin-reviews--review_id--reject"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PATCHv1-admin-reviews--review_id--reject" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PATCHv1-admin-reviews--review_id--reject">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PATCHv1-admin-reviews--review_id--reject" data-method="PATCH"
      data-path="v1/admin/reviews/{review_id}/reject"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PATCHv1-admin-reviews--review_id--reject', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PATCHv1-admin-reviews--review_id--reject"
                    onclick="tryItOut('PATCHv1-admin-reviews--review_id--reject');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PATCHv1-admin-reviews--review_id--reject"
                    onclick="cancelTryOut('PATCHv1-admin-reviews--review_id--reject');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PATCHv1-admin-reviews--review_id--reject"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>v1/admin/reviews/{review_id}/reject</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PATCHv1-admin-reviews--review_id--reject"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PATCHv1-admin-reviews--review_id--reject"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>review_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="review_id"                data-endpoint="PATCHv1-admin-reviews--review_id--reject"
               value="16"
               data-component="url">
    <br>
<p>The ID of the review. Example: <code>16</code></p>
            </div>
                    </form>

                <h1 id="admin-shipping-methods">Admin - Shipping Methods</h1>

    

                                <h2 id="admin-shipping-methods-GETv1-admin-shipping-methods">Get all shipping methods (Admin only).</h2>

<p>
</p>



<span id="example-requests-GETv1-admin-shipping-methods">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/v1/admin/shipping-methods" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/admin/shipping-methods"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETv1-admin-shipping-methods">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETv1-admin-shipping-methods" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETv1-admin-shipping-methods"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETv1-admin-shipping-methods"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETv1-admin-shipping-methods" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETv1-admin-shipping-methods">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETv1-admin-shipping-methods" data-method="GET"
      data-path="v1/admin/shipping-methods"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETv1-admin-shipping-methods', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETv1-admin-shipping-methods"
                    onclick="tryItOut('GETv1-admin-shipping-methods');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETv1-admin-shipping-methods"
                    onclick="cancelTryOut('GETv1-admin-shipping-methods');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETv1-admin-shipping-methods"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>v1/admin/shipping-methods</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETv1-admin-shipping-methods"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETv1-admin-shipping-methods"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="admin-shipping-methods-POSTv1-admin-shipping-methods">Create shipping method (Admin only).</h2>

<p>
</p>



<span id="example-requests-POSTv1-admin-shipping-methods">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/v1/admin/shipping-methods" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"b\",
    \"description\": \"Et animi quos velit et fugiat.\",
    \"cost\": 42,
    \"estimated_days_min\": 40,
    \"estimated_days_max\": 4,
    \"is_active\": false,
    \"sort_order\": 52
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/admin/shipping-methods"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "b",
    "description": "Et animi quos velit et fugiat.",
    "cost": 42,
    "estimated_days_min": 40,
    "estimated_days_max": 4,
    "is_active": false,
    "sort_order": 52
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTv1-admin-shipping-methods">
</span>
<span id="execution-results-POSTv1-admin-shipping-methods" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTv1-admin-shipping-methods"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTv1-admin-shipping-methods"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTv1-admin-shipping-methods" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTv1-admin-shipping-methods">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTv1-admin-shipping-methods" data-method="POST"
      data-path="v1/admin/shipping-methods"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTv1-admin-shipping-methods', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTv1-admin-shipping-methods"
                    onclick="tryItOut('POSTv1-admin-shipping-methods');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTv1-admin-shipping-methods"
                    onclick="cancelTryOut('POSTv1-admin-shipping-methods');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTv1-admin-shipping-methods"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>v1/admin/shipping-methods</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTv1-admin-shipping-methods"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTv1-admin-shipping-methods"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTv1-admin-shipping-methods"
               value="b"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>b</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="POSTv1-admin-shipping-methods"
               value="Et animi quos velit et fugiat."
               data-component="body">
    <br>
<p>Must not be greater than 500 characters. Example: <code>Et animi quos velit et fugiat.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>cost</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="cost"                data-endpoint="POSTv1-admin-shipping-methods"
               value="42"
               data-component="body">
    <br>
<p>Must be at least 0. Example: <code>42</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>estimated_days_min</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="estimated_days_min"                data-endpoint="POSTv1-admin-shipping-methods"
               value="40"
               data-component="body">
    <br>
<p>Must be at least 1. Example: <code>40</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>estimated_days_max</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="estimated_days_max"                data-endpoint="POSTv1-admin-shipping-methods"
               value="4"
               data-component="body">
    <br>
<p>Must be at least 1. Example: <code>4</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_active</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="POSTv1-admin-shipping-methods" style="display: none">
            <input type="radio" name="is_active"
                   value="true"
                   data-endpoint="POSTv1-admin-shipping-methods"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="POSTv1-admin-shipping-methods" style="display: none">
            <input type="radio" name="is_active"
                   value="false"
                   data-endpoint="POSTv1-admin-shipping-methods"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Example: <code>false</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>sort_order</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="sort_order"                data-endpoint="POSTv1-admin-shipping-methods"
               value="52"
               data-component="body">
    <br>
<p>Must be at least 0. Example: <code>52</code></p>
        </div>
        </form>

                    <h2 id="admin-shipping-methods-GETv1-admin-shipping-methods--shippingMethod_id-">Get shipping method details (Admin only).</h2>

<p>
</p>



<span id="example-requests-GETv1-admin-shipping-methods--shippingMethod_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/v1/admin/shipping-methods/16" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/admin/shipping-methods/16"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETv1-admin-shipping-methods--shippingMethod_id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETv1-admin-shipping-methods--shippingMethod_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETv1-admin-shipping-methods--shippingMethod_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETv1-admin-shipping-methods--shippingMethod_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETv1-admin-shipping-methods--shippingMethod_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETv1-admin-shipping-methods--shippingMethod_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETv1-admin-shipping-methods--shippingMethod_id-" data-method="GET"
      data-path="v1/admin/shipping-methods/{shippingMethod_id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETv1-admin-shipping-methods--shippingMethod_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETv1-admin-shipping-methods--shippingMethod_id-"
                    onclick="tryItOut('GETv1-admin-shipping-methods--shippingMethod_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETv1-admin-shipping-methods--shippingMethod_id-"
                    onclick="cancelTryOut('GETv1-admin-shipping-methods--shippingMethod_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETv1-admin-shipping-methods--shippingMethod_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>v1/admin/shipping-methods/{shippingMethod_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETv1-admin-shipping-methods--shippingMethod_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETv1-admin-shipping-methods--shippingMethod_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>shippingMethod_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="shippingMethod_id"                data-endpoint="GETv1-admin-shipping-methods--shippingMethod_id-"
               value="16"
               data-component="url">
    <br>
<p>The ID of the shippingMethod. Example: <code>16</code></p>
            </div>
                    </form>

                    <h2 id="admin-shipping-methods-PUTv1-admin-shipping-methods--shippingMethod_id-">Update shipping method (Admin only).</h2>

<p>
</p>



<span id="example-requests-PUTv1-admin-shipping-methods--shippingMethod_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/v1/admin/shipping-methods/16" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"b\",
    \"description\": \"Et animi quos velit et fugiat.\",
    \"cost\": 42,
    \"estimated_days_min\": 40,
    \"estimated_days_max\": 4,
    \"is_active\": true,
    \"sort_order\": 52
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/admin/shipping-methods/16"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "b",
    "description": "Et animi quos velit et fugiat.",
    "cost": 42,
    "estimated_days_min": 40,
    "estimated_days_max": 4,
    "is_active": true,
    "sort_order": 52
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTv1-admin-shipping-methods--shippingMethod_id-">
</span>
<span id="execution-results-PUTv1-admin-shipping-methods--shippingMethod_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTv1-admin-shipping-methods--shippingMethod_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTv1-admin-shipping-methods--shippingMethod_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTv1-admin-shipping-methods--shippingMethod_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTv1-admin-shipping-methods--shippingMethod_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTv1-admin-shipping-methods--shippingMethod_id-" data-method="PUT"
      data-path="v1/admin/shipping-methods/{shippingMethod_id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTv1-admin-shipping-methods--shippingMethod_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTv1-admin-shipping-methods--shippingMethod_id-"
                    onclick="tryItOut('PUTv1-admin-shipping-methods--shippingMethod_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTv1-admin-shipping-methods--shippingMethod_id-"
                    onclick="cancelTryOut('PUTv1-admin-shipping-methods--shippingMethod_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTv1-admin-shipping-methods--shippingMethod_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>v1/admin/shipping-methods/{shippingMethod_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTv1-admin-shipping-methods--shippingMethod_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTv1-admin-shipping-methods--shippingMethod_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>shippingMethod_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="shippingMethod_id"                data-endpoint="PUTv1-admin-shipping-methods--shippingMethod_id-"
               value="16"
               data-component="url">
    <br>
<p>The ID of the shippingMethod. Example: <code>16</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTv1-admin-shipping-methods--shippingMethod_id-"
               value="b"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>b</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="PUTv1-admin-shipping-methods--shippingMethod_id-"
               value="Et animi quos velit et fugiat."
               data-component="body">
    <br>
<p>Must not be greater than 500 characters. Example: <code>Et animi quos velit et fugiat.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>cost</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="cost"                data-endpoint="PUTv1-admin-shipping-methods--shippingMethod_id-"
               value="42"
               data-component="body">
    <br>
<p>Must be at least 0. Example: <code>42</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>estimated_days_min</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="estimated_days_min"                data-endpoint="PUTv1-admin-shipping-methods--shippingMethod_id-"
               value="40"
               data-component="body">
    <br>
<p>Must be at least 1. Example: <code>40</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>estimated_days_max</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="estimated_days_max"                data-endpoint="PUTv1-admin-shipping-methods--shippingMethod_id-"
               value="4"
               data-component="body">
    <br>
<p>Must be at least 1. Example: <code>4</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_active</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="PUTv1-admin-shipping-methods--shippingMethod_id-" style="display: none">
            <input type="radio" name="is_active"
                   value="true"
                   data-endpoint="PUTv1-admin-shipping-methods--shippingMethod_id-"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="PUTv1-admin-shipping-methods--shippingMethod_id-" style="display: none">
            <input type="radio" name="is_active"
                   value="false"
                   data-endpoint="PUTv1-admin-shipping-methods--shippingMethod_id-"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Example: <code>true</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>sort_order</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="sort_order"                data-endpoint="PUTv1-admin-shipping-methods--shippingMethod_id-"
               value="52"
               data-component="body">
    <br>
<p>Must be at least 0. Example: <code>52</code></p>
        </div>
        </form>

                    <h2 id="admin-shipping-methods-DELETEv1-admin-shipping-methods--shippingMethod_id-">Delete shipping method (Admin only).</h2>

<p>
</p>



<span id="example-requests-DELETEv1-admin-shipping-methods--shippingMethod_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/v1/admin/shipping-methods/16" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/admin/shipping-methods/16"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEv1-admin-shipping-methods--shippingMethod_id-">
</span>
<span id="execution-results-DELETEv1-admin-shipping-methods--shippingMethod_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEv1-admin-shipping-methods--shippingMethod_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEv1-admin-shipping-methods--shippingMethod_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEv1-admin-shipping-methods--shippingMethod_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEv1-admin-shipping-methods--shippingMethod_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEv1-admin-shipping-methods--shippingMethod_id-" data-method="DELETE"
      data-path="v1/admin/shipping-methods/{shippingMethod_id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEv1-admin-shipping-methods--shippingMethod_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEv1-admin-shipping-methods--shippingMethod_id-"
                    onclick="tryItOut('DELETEv1-admin-shipping-methods--shippingMethod_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEv1-admin-shipping-methods--shippingMethod_id-"
                    onclick="cancelTryOut('DELETEv1-admin-shipping-methods--shippingMethod_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEv1-admin-shipping-methods--shippingMethod_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>v1/admin/shipping-methods/{shippingMethod_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEv1-admin-shipping-methods--shippingMethod_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEv1-admin-shipping-methods--shippingMethod_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>shippingMethod_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="shippingMethod_id"                data-endpoint="DELETEv1-admin-shipping-methods--shippingMethod_id-"
               value="16"
               data-component="url">
    <br>
<p>The ID of the shippingMethod. Example: <code>16</code></p>
            </div>
                    </form>

                <h1 id="admin-users">Admin - Users</h1>

    

                                <h2 id="admin-users-GETv1-admin-users">Display a listing of users.</h2>

<p>
</p>



<span id="example-requests-GETv1-admin-users">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/v1/admin/users" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/admin/users"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETv1-admin-users">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETv1-admin-users" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETv1-admin-users"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETv1-admin-users"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETv1-admin-users" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETv1-admin-users">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETv1-admin-users" data-method="GET"
      data-path="v1/admin/users"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETv1-admin-users', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETv1-admin-users"
                    onclick="tryItOut('GETv1-admin-users');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETv1-admin-users"
                    onclick="cancelTryOut('GETv1-admin-users');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETv1-admin-users"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>v1/admin/users</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETv1-admin-users"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETv1-admin-users"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="admin-users-POSTv1-admin-users">Store a newly created user (Admin only).</h2>

<p>
</p>



<span id="example-requests-POSTv1-admin-users">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/v1/admin/users" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"first_name\": \"b\",
    \"last_name\": \"n\",
    \"email\": \"ashly64@example.com\",
    \"password\": \"pBNvYg\",
    \"gender\": \"female\",
    \"phone\": \"hwaykcmyuwpwlvqw\",
    \"birthday\": \"2022-01-23\",
    \"address\": \"n\",
    \"role\": \"admin\",
    \"is_active\": false
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/admin/users"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "first_name": "b",
    "last_name": "n",
    "email": "ashly64@example.com",
    "password": "pBNvYg",
    "gender": "female",
    "phone": "hwaykcmyuwpwlvqw",
    "birthday": "2022-01-23",
    "address": "n",
    "role": "admin",
    "is_active": false
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTv1-admin-users">
</span>
<span id="execution-results-POSTv1-admin-users" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTv1-admin-users"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTv1-admin-users"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTv1-admin-users" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTv1-admin-users">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTv1-admin-users" data-method="POST"
      data-path="v1/admin/users"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTv1-admin-users', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTv1-admin-users"
                    onclick="tryItOut('POSTv1-admin-users');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTv1-admin-users"
                    onclick="cancelTryOut('POSTv1-admin-users');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTv1-admin-users"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>v1/admin/users</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTv1-admin-users"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTv1-admin-users"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>first_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="first_name"                data-endpoint="POSTv1-admin-users"
               value="b"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>b</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>last_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="last_name"                data-endpoint="POSTv1-admin-users"
               value="n"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>n</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTv1-admin-users"
               value="ashly64@example.com"
               data-component="body">
    <br>
<p>Must be a valid email address. Must not be greater than 255 characters. Example: <code>ashly64@example.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTv1-admin-users"
               value="pBNvYg"
               data-component="body">
    <br>
<p>Must be at least 6 characters. Example: <code>pBNvYg</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>gender</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="gender"                data-endpoint="POSTv1-admin-users"
               value="female"
               data-component="body">
    <br>
<p>Example: <code>female</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>male</code></li> <li><code>female</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>phone</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="phone"                data-endpoint="POSTv1-admin-users"
               value="hwaykcmyuwpwlvqw"
               data-component="body">
    <br>
<p>Must be at least 8 characters. Must not be greater than 20 characters. Example: <code>hwaykcmyuwpwlvqw</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>birthday</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="birthday"                data-endpoint="POSTv1-admin-users"
               value="2022-01-23"
               data-component="body">
    <br>
<p>Must be a valid date. Must be a date before <code>today</code>. Example: <code>2022-01-23</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>address</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="address"                data-endpoint="POSTv1-admin-users"
               value="n"
               data-component="body">
    <br>
<p>Must not be greater than 500 characters. Example: <code>n</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>role</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="role"                data-endpoint="POSTv1-admin-users"
               value="admin"
               data-component="body">
    <br>
<p>Example: <code>admin</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>admin</code></li> <li><code>customer</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_active</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="POSTv1-admin-users" style="display: none">
            <input type="radio" name="is_active"
                   value="true"
                   data-endpoint="POSTv1-admin-users"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="POSTv1-admin-users" style="display: none">
            <input type="radio" name="is_active"
                   value="false"
                   data-endpoint="POSTv1-admin-users"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Example: <code>false</code></p>
        </div>
        </form>

                    <h2 id="admin-users-GETv1-admin-users--user_id-">Display the specified user.</h2>

<p>
</p>



<span id="example-requests-GETv1-admin-users--user_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/v1/admin/users/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/admin/users/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETv1-admin-users--user_id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETv1-admin-users--user_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETv1-admin-users--user_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETv1-admin-users--user_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETv1-admin-users--user_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETv1-admin-users--user_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETv1-admin-users--user_id-" data-method="GET"
      data-path="v1/admin/users/{user_id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETv1-admin-users--user_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETv1-admin-users--user_id-"
                    onclick="tryItOut('GETv1-admin-users--user_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETv1-admin-users--user_id-"
                    onclick="cancelTryOut('GETv1-admin-users--user_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETv1-admin-users--user_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>v1/admin/users/{user_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETv1-admin-users--user_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETv1-admin-users--user_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>user_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="user_id"                data-endpoint="GETv1-admin-users--user_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the user. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="admin-users-PUTv1-admin-users--user_id-">Update the specified user.</h2>

<p>
</p>



<span id="example-requests-PUTv1-admin-users--user_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/v1/admin/users/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"first_name\": \"b\",
    \"last_name\": \"n\",
    \"email\": \"ashly64@example.com\",
    \"gender\": \"male\",
    \"phone\": \"vdljnikhwaykcmyu\",
    \"birthday\": \"2025-12-31T10:52:53\",
    \"address\": \"w\",
    \"role\": \"admin\",
    \"is_active\": true
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/admin/users/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "first_name": "b",
    "last_name": "n",
    "email": "ashly64@example.com",
    "gender": "male",
    "phone": "vdljnikhwaykcmyu",
    "birthday": "2025-12-31T10:52:53",
    "address": "w",
    "role": "admin",
    "is_active": true
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTv1-admin-users--user_id-">
</span>
<span id="execution-results-PUTv1-admin-users--user_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTv1-admin-users--user_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTv1-admin-users--user_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTv1-admin-users--user_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTv1-admin-users--user_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTv1-admin-users--user_id-" data-method="PUT"
      data-path="v1/admin/users/{user_id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTv1-admin-users--user_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTv1-admin-users--user_id-"
                    onclick="tryItOut('PUTv1-admin-users--user_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTv1-admin-users--user_id-"
                    onclick="cancelTryOut('PUTv1-admin-users--user_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTv1-admin-users--user_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>v1/admin/users/{user_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTv1-admin-users--user_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTv1-admin-users--user_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>user_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="user_id"                data-endpoint="PUTv1-admin-users--user_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the user. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>first_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="first_name"                data-endpoint="PUTv1-admin-users--user_id-"
               value="b"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>b</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>last_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="last_name"                data-endpoint="PUTv1-admin-users--user_id-"
               value="n"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>n</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="PUTv1-admin-users--user_id-"
               value="ashly64@example.com"
               data-component="body">
    <br>
<p>Must be a valid email address. Must not be greater than 255 characters. Example: <code>ashly64@example.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>gender</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="gender"                data-endpoint="PUTv1-admin-users--user_id-"
               value="male"
               data-component="body">
    <br>
<p>Example: <code>male</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>male</code></li> <li><code>female</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>phone</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="phone"                data-endpoint="PUTv1-admin-users--user_id-"
               value="vdljnikhwaykcmyu"
               data-component="body">
    <br>
<p>Must not be greater than 20 characters. Example: <code>vdljnikhwaykcmyu</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>birthday</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="birthday"                data-endpoint="PUTv1-admin-users--user_id-"
               value="2025-12-31T10:52:53"
               data-component="body">
    <br>
<p>Must be a valid date. Example: <code>2025-12-31T10:52:53</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>address</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="address"                data-endpoint="PUTv1-admin-users--user_id-"
               value="w"
               data-component="body">
    <br>
<p>Must not be greater than 500 characters. Example: <code>w</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>role</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="role"                data-endpoint="PUTv1-admin-users--user_id-"
               value="admin"
               data-component="body">
    <br>
<p>Example: <code>admin</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>admin</code></li> <li><code>customer</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_active</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="PUTv1-admin-users--user_id-" style="display: none">
            <input type="radio" name="is_active"
                   value="true"
                   data-endpoint="PUTv1-admin-users--user_id-"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="PUTv1-admin-users--user_id-" style="display: none">
            <input type="radio" name="is_active"
                   value="false"
                   data-endpoint="PUTv1-admin-users--user_id-"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Example: <code>true</code></p>
        </div>
        </form>

                    <h2 id="admin-users-DELETEv1-admin-users--user_id-">Delete user.</h2>

<p>
</p>



<span id="example-requests-DELETEv1-admin-users--user_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/v1/admin/users/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/admin/users/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEv1-admin-users--user_id-">
</span>
<span id="execution-results-DELETEv1-admin-users--user_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEv1-admin-users--user_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEv1-admin-users--user_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEv1-admin-users--user_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEv1-admin-users--user_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEv1-admin-users--user_id-" data-method="DELETE"
      data-path="v1/admin/users/{user_id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEv1-admin-users--user_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEv1-admin-users--user_id-"
                    onclick="tryItOut('DELETEv1-admin-users--user_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEv1-admin-users--user_id-"
                    onclick="cancelTryOut('DELETEv1-admin-users--user_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEv1-admin-users--user_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>v1/admin/users/{user_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEv1-admin-users--user_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEv1-admin-users--user_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>user_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="user_id"                data-endpoint="DELETEv1-admin-users--user_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the user. Example: <code>1</code></p>
            </div>
                    </form>

                <h1 id="authentication">Authentication</h1>

    

                                <h2 id="authentication-POSTv1-auth-register">Handle user registration.</h2>

<p>
</p>



<span id="example-requests-POSTv1-auth-register">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/v1/auth/register" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"first_name\": \"b\",
    \"last_name\": \"n\",
    \"email\": \"ashly64@example.com\",
    \"gender\": \"male\",
    \"birthday\": \"2022-01-23\",
    \"phone\": \"ngzmiyvdljnikhwa\",
    \"password\": \"\\/#iw\\/kXaz\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/auth/register"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "first_name": "b",
    "last_name": "n",
    "email": "ashly64@example.com",
    "gender": "male",
    "birthday": "2022-01-23",
    "phone": "ngzmiyvdljnikhwa",
    "password": "\/#iw\/kXaz"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTv1-auth-register">
</span>
<span id="execution-results-POSTv1-auth-register" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTv1-auth-register"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTv1-auth-register"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTv1-auth-register" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTv1-auth-register">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTv1-auth-register" data-method="POST"
      data-path="v1/auth/register"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTv1-auth-register', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTv1-auth-register"
                    onclick="tryItOut('POSTv1-auth-register');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTv1-auth-register"
                    onclick="cancelTryOut('POSTv1-auth-register');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTv1-auth-register"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>v1/auth/register</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTv1-auth-register"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTv1-auth-register"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>first_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="first_name"                data-endpoint="POSTv1-auth-register"
               value="b"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>b</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>last_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="last_name"                data-endpoint="POSTv1-auth-register"
               value="n"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>n</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTv1-auth-register"
               value="ashly64@example.com"
               data-component="body">
    <br>
<p>Must be a valid email address. Must not be greater than 255 characters. Example: <code>ashly64@example.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>gender</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="gender"                data-endpoint="POSTv1-auth-register"
               value="male"
               data-component="body">
    <br>
<p>Example: <code>male</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>male</code></li> <li><code>female</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>birthday</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="birthday"                data-endpoint="POSTv1-auth-register"
               value="2022-01-23"
               data-component="body">
    <br>
<p>Must be a valid date. Must be a date before <code>today</code>. Example: <code>2022-01-23</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>phone</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="phone"                data-endpoint="POSTv1-auth-register"
               value="ngzmiyvdljnikhwa"
               data-component="body">
    <br>
<p>Must be at least 8 characters. Must not be greater than 20 characters. Example: <code>ngzmiyvdljnikhwa</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTv1-auth-register"
               value="/#iw/kXaz"
               data-component="body">
    <br>
<p>Must be at least 6 characters. Example: <code>/#iw/kXaz</code></p>
        </div>
        </form>

                    <h2 id="authentication-POSTv1-auth-login">Handle user login.</h2>

<p>
</p>



<span id="example-requests-POSTv1-auth-login">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/v1/auth/login" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"email\": \"gbailey@example.net\",
    \"password\": \"|]|{+-\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/auth/login"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "gbailey@example.net",
    "password": "|]|{+-"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTv1-auth-login">
</span>
<span id="execution-results-POSTv1-auth-login" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTv1-auth-login"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTv1-auth-login"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTv1-auth-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTv1-auth-login">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTv1-auth-login" data-method="POST"
      data-path="v1/auth/login"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTv1-auth-login', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTv1-auth-login"
                    onclick="tryItOut('POSTv1-auth-login');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTv1-auth-login"
                    onclick="cancelTryOut('POSTv1-auth-login');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTv1-auth-login"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>v1/auth/login</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTv1-auth-login"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTv1-auth-login"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTv1-auth-login"
               value="gbailey@example.net"
               data-component="body">
    <br>
<p>Must be a valid email address. Example: <code>gbailey@example.net</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTv1-auth-login"
               value="|]|{+-"
               data-component="body">
    <br>
<p>Example: <code>|]|{+-</code></p>
        </div>
        </form>

                    <h2 id="authentication-POSTv1-auth-forgot-password">Send password reset link.</h2>

<p>
</p>



<span id="example-requests-POSTv1-auth-forgot-password">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/v1/auth/forgot-password" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"email\": \"gbailey@example.net\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/auth/forgot-password"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "gbailey@example.net"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTv1-auth-forgot-password">
</span>
<span id="execution-results-POSTv1-auth-forgot-password" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTv1-auth-forgot-password"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTv1-auth-forgot-password"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTv1-auth-forgot-password" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTv1-auth-forgot-password">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTv1-auth-forgot-password" data-method="POST"
      data-path="v1/auth/forgot-password"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTv1-auth-forgot-password', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTv1-auth-forgot-password"
                    onclick="tryItOut('POSTv1-auth-forgot-password');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTv1-auth-forgot-password"
                    onclick="cancelTryOut('POSTv1-auth-forgot-password');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTv1-auth-forgot-password"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>v1/auth/forgot-password</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTv1-auth-forgot-password"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTv1-auth-forgot-password"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTv1-auth-forgot-password"
               value="gbailey@example.net"
               data-component="body">
    <br>
<p>Must be a valid email address. Example: <code>gbailey@example.net</code></p>
        </div>
        </form>

                    <h2 id="authentication-POSTv1-auth-reset-password">Reset password.</h2>

<p>
</p>



<span id="example-requests-POSTv1-auth-reset-password">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/v1/auth/reset-password" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"token\": \"architecto\",
    \"email\": \"zbailey@example.net\",
    \"password\": \"-0pBNvYgxw\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/auth/reset-password"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "token": "architecto",
    "email": "zbailey@example.net",
    "password": "-0pBNvYgxw"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTv1-auth-reset-password">
</span>
<span id="execution-results-POSTv1-auth-reset-password" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTv1-auth-reset-password"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTv1-auth-reset-password"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTv1-auth-reset-password" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTv1-auth-reset-password">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTv1-auth-reset-password" data-method="POST"
      data-path="v1/auth/reset-password"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTv1-auth-reset-password', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTv1-auth-reset-password"
                    onclick="tryItOut('POSTv1-auth-reset-password');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTv1-auth-reset-password"
                    onclick="cancelTryOut('POSTv1-auth-reset-password');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTv1-auth-reset-password"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>v1/auth/reset-password</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTv1-auth-reset-password"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTv1-auth-reset-password"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>token</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="token"                data-endpoint="POSTv1-auth-reset-password"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTv1-auth-reset-password"
               value="zbailey@example.net"
               data-component="body">
    <br>
<p>Must be a valid email address. Example: <code>zbailey@example.net</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTv1-auth-reset-password"
               value="-0pBNvYgxw"
               data-component="body">
    <br>
<p>Must be at least 8 characters. Example: <code>-0pBNvYgxw</code></p>
        </div>
        </form>

                    <h2 id="authentication-GETv1-auth-google">Redirect to Google OAuth.</h2>

<p>
</p>



<span id="example-requests-GETv1-auth-google">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/v1/auth/google" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/auth/google"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETv1-auth-google">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 10
x-ratelimit-remaining: 9
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;url&quot;: &quot;https://accounts.google.com/o/oauth2/v2/auth?client_id=270319989827-h5aa09un0albvl6ogpgfks60p8d7kks5.apps.googleusercontent.com&amp;redirect_uri=http%3A%2F%2Flocalhost%3A4200%2Fauth%2Fgoogle%2Fcallback&amp;response_type=code&amp;scope=openid+email+profile&amp;access_type=online&amp;prompt=select_account&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETv1-auth-google" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETv1-auth-google"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETv1-auth-google"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETv1-auth-google" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETv1-auth-google">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETv1-auth-google" data-method="GET"
      data-path="v1/auth/google"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETv1-auth-google', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETv1-auth-google"
                    onclick="tryItOut('GETv1-auth-google');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETv1-auth-google"
                    onclick="cancelTryOut('GETv1-auth-google');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETv1-auth-google"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>v1/auth/google</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETv1-auth-google"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETv1-auth-google"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="authentication-GETv1-auth-google-callback">Handle Google OAuth callback.</h2>

<p>
</p>



<span id="example-requests-GETv1-auth-google-callback">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/v1/auth/google/callback" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/auth/google/callback"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETv1-auth-google-callback">
            <blockquote>
            <p>Example response (400):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 10
x-ratelimit-remaining: 9
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: false,
    &quot;message&quot;: &quot;Authorization code not found&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETv1-auth-google-callback" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETv1-auth-google-callback"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETv1-auth-google-callback"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETv1-auth-google-callback" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETv1-auth-google-callback">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETv1-auth-google-callback" data-method="GET"
      data-path="v1/auth/google/callback"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETv1-auth-google-callback', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETv1-auth-google-callback"
                    onclick="tryItOut('GETv1-auth-google-callback');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETv1-auth-google-callback"
                    onclick="cancelTryOut('GETv1-auth-google-callback');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETv1-auth-google-callback"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>v1/auth/google/callback</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETv1-auth-google-callback"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETv1-auth-google-callback"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="authentication-POSTv1-auth-logout">Handle user logout.</h2>

<p>
</p>



<span id="example-requests-POSTv1-auth-logout">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/v1/auth/logout" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/auth/logout"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTv1-auth-logout">
</span>
<span id="execution-results-POSTv1-auth-logout" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTv1-auth-logout"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTv1-auth-logout"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTv1-auth-logout" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTv1-auth-logout">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTv1-auth-logout" data-method="POST"
      data-path="v1/auth/logout"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTv1-auth-logout', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTv1-auth-logout"
                    onclick="tryItOut('POSTv1-auth-logout');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTv1-auth-logout"
                    onclick="cancelTryOut('POSTv1-auth-logout');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTv1-auth-logout"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>v1/auth/logout</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTv1-auth-logout"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTv1-auth-logout"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                <h1 id="brands">Brands</h1>

    

                                <h2 id="brands-GETv1-brands">Get all brands.</h2>

<p>
</p>



<span id="example-requests-GETv1-brands">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/v1/brands" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/brands"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETv1-brands">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;current_page&quot;: 1,
        &quot;data&quot;: [
            {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Lehner-Lehner&quot;,
                &quot;slug&quot;: &quot;lehner-lehner&quot;,
                &quot;description&quot;: &quot;Velit id pariatur voluptas commodi voluptatibus aut.&quot;,
                &quot;logo_url&quot;: &quot;https://via.placeholder.com/200x200.png/008833?text=brands+incidunt&quot;,
                &quot;website&quot;: &quot;http://steuber.com/&quot;,
                &quot;status&quot;: &quot;active&quot;,
                &quot;created_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
                &quot;sort_order&quot;: 0,
                &quot;deleted_at&quot;: null
            },
            {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Blanda Inc&quot;,
                &quot;slug&quot;: &quot;blanda-inc&quot;,
                &quot;description&quot;: &quot;Totam inventore esse ipsum repellat et sapiente quod maiores.&quot;,
                &quot;logo_url&quot;: &quot;https://via.placeholder.com/200x200.png/001155?text=brands+voluptatem&quot;,
                &quot;website&quot;: &quot;http://corkery.com/et-tenetur-omnis-iste-optio.html&quot;,
                &quot;status&quot;: &quot;active&quot;,
                &quot;created_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
                &quot;sort_order&quot;: 0,
                &quot;deleted_at&quot;: null
            },
            {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Halvorson-Effertz&quot;,
                &quot;slug&quot;: &quot;halvorson-effertz&quot;,
                &quot;description&quot;: &quot;Quis doloribus deleniti maxime quia modi dolorum earum sapiente.&quot;,
                &quot;logo_url&quot;: &quot;https://via.placeholder.com/200x200.png/005588?text=brands+magnam&quot;,
                &quot;website&quot;: &quot;https://becker.org/recusandae-provident-sit-numquam-ut-similique-sunt-unde.html&quot;,
                &quot;status&quot;: &quot;active&quot;,
                &quot;created_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
                &quot;sort_order&quot;: 0,
                &quot;deleted_at&quot;: null
            },
            {
                &quot;id&quot;: 4,
                &quot;name&quot;: &quot;Cruickshank, Von and Schaden&quot;,
                &quot;slug&quot;: &quot;cruickshank-von-and-schaden&quot;,
                &quot;description&quot;: &quot;Esse repudiandae repudiandae eum laudantium molestias ullam consequatur a perferendis in.&quot;,
                &quot;logo_url&quot;: &quot;https://via.placeholder.com/200x200.png/006677?text=brands+officiis&quot;,
                &quot;website&quot;: &quot;http://franecki.biz/&quot;,
                &quot;status&quot;: &quot;active&quot;,
                &quot;created_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
                &quot;sort_order&quot;: 0,
                &quot;deleted_at&quot;: null
            },
            {
                &quot;id&quot;: 5,
                &quot;name&quot;: &quot;Feeney-Langosh&quot;,
                &quot;slug&quot;: &quot;feeney-langosh&quot;,
                &quot;description&quot;: &quot;Repellendus aut et quo vel ut hic praesentium quos eveniet.&quot;,
                &quot;logo_url&quot;: &quot;https://via.placeholder.com/200x200.png/007700?text=brands+omnis&quot;,
                &quot;website&quot;: &quot;http://www.lockman.org/voluptatum-aliquid-hic-et-quasi-eaque-voluptate.html&quot;,
                &quot;status&quot;: &quot;active&quot;,
                &quot;created_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
                &quot;sort_order&quot;: 0,
                &quot;deleted_at&quot;: null
            }
        ],
        &quot;first_page_url&quot;: &quot;http://localhost:8000/v1/brands?page=1&quot;,
        &quot;from&quot;: 1,
        &quot;last_page&quot;: 1,
        &quot;last_page_url&quot;: &quot;http://localhost:8000/v1/brands?page=1&quot;,
        &quot;links&quot;: [
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;&amp;laquo; Previous&quot;,
                &quot;page&quot;: null,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://localhost:8000/v1/brands?page=1&quot;,
                &quot;label&quot;: &quot;1&quot;,
                &quot;page&quot;: 1,
                &quot;active&quot;: true
            },
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;Next &amp;raquo;&quot;,
                &quot;page&quot;: null,
                &quot;active&quot;: false
            }
        ],
        &quot;next_page_url&quot;: null,
        &quot;path&quot;: &quot;http://localhost:8000/v1/brands&quot;,
        &quot;per_page&quot;: 10,
        &quot;prev_page_url&quot;: null,
        &quot;to&quot;: 5,
        &quot;total&quot;: 5
    },
    &quot;message&quot;: &quot;Brands retrieved successfully&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETv1-brands" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETv1-brands"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETv1-brands"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETv1-brands" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETv1-brands">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETv1-brands" data-method="GET"
      data-path="v1/brands"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETv1-brands', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETv1-brands"
                    onclick="tryItOut('GETv1-brands');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETv1-brands"
                    onclick="cancelTryOut('GETv1-brands');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETv1-brands"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>v1/brands</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETv1-brands"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETv1-brands"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="brands-GETv1-brands--brand_id-">Display the specified brand.</h2>

<p>
</p>



<span id="example-requests-GETv1-brands--brand_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/v1/brands/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/brands/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETv1-brands--brand_id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;name&quot;: &quot;Lehner-Lehner&quot;,
        &quot;slug&quot;: &quot;lehner-lehner&quot;,
        &quot;description&quot;: &quot;Velit id pariatur voluptas commodi voluptatibus aut.&quot;,
        &quot;logo_url&quot;: &quot;https://via.placeholder.com/200x200.png/008833?text=brands+incidunt&quot;,
        &quot;website&quot;: &quot;http://steuber.com/&quot;,
        &quot;status&quot;: &quot;active&quot;,
        &quot;created_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
        &quot;sort_order&quot;: 0,
        &quot;deleted_at&quot;: null
    },
    &quot;message&quot;: &quot;Brand retrieved successfully&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETv1-brands--brand_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETv1-brands--brand_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETv1-brands--brand_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETv1-brands--brand_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETv1-brands--brand_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETv1-brands--brand_id-" data-method="GET"
      data-path="v1/brands/{brand_id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETv1-brands--brand_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETv1-brands--brand_id-"
                    onclick="tryItOut('GETv1-brands--brand_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETv1-brands--brand_id-"
                    onclick="cancelTryOut('GETv1-brands--brand_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETv1-brands--brand_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>v1/brands/{brand_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETv1-brands--brand_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETv1-brands--brand_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>brand_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="brand_id"                data-endpoint="GETv1-brands--brand_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the brand. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="brands-GETv1-admin-brands">Get all brands.</h2>

<p>
</p>



<span id="example-requests-GETv1-admin-brands">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/v1/admin/brands" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/admin/brands"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETv1-admin-brands">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETv1-admin-brands" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETv1-admin-brands"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETv1-admin-brands"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETv1-admin-brands" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETv1-admin-brands">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETv1-admin-brands" data-method="GET"
      data-path="v1/admin/brands"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETv1-admin-brands', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETv1-admin-brands"
                    onclick="tryItOut('GETv1-admin-brands');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETv1-admin-brands"
                    onclick="cancelTryOut('GETv1-admin-brands');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETv1-admin-brands"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>v1/admin/brands</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETv1-admin-brands"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETv1-admin-brands"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="brands-GETv1-admin-brands--brand_id-">Display the specified brand.</h2>

<p>
</p>



<span id="example-requests-GETv1-admin-brands--brand_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/v1/admin/brands/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/admin/brands/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETv1-admin-brands--brand_id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETv1-admin-brands--brand_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETv1-admin-brands--brand_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETv1-admin-brands--brand_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETv1-admin-brands--brand_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETv1-admin-brands--brand_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETv1-admin-brands--brand_id-" data-method="GET"
      data-path="v1/admin/brands/{brand_id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETv1-admin-brands--brand_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETv1-admin-brands--brand_id-"
                    onclick="tryItOut('GETv1-admin-brands--brand_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETv1-admin-brands--brand_id-"
                    onclick="cancelTryOut('GETv1-admin-brands--brand_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETv1-admin-brands--brand_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>v1/admin/brands/{brand_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETv1-admin-brands--brand_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETv1-admin-brands--brand_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>brand_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="brand_id"                data-endpoint="GETv1-admin-brands--brand_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the brand. Example: <code>1</code></p>
            </div>
                    </form>

                <h1 id="cart">Cart</h1>

    

                                <h2 id="cart-GETv1-cart">Get user&#039;s cart.</h2>

<p>
</p>



<span id="example-requests-GETv1-cart">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/v1/cart" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/cart"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETv1-cart">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETv1-cart" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETv1-cart"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETv1-cart"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETv1-cart" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETv1-cart">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETv1-cart" data-method="GET"
      data-path="v1/cart"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETv1-cart', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETv1-cart"
                    onclick="tryItOut('GETv1-cart');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETv1-cart"
                    onclick="cancelTryOut('GETv1-cart');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETv1-cart"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>v1/cart</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETv1-cart"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETv1-cart"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="cart-POSTv1-cart">Add item to cart.</h2>

<p>
</p>



<span id="example-requests-POSTv1-cart">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/v1/cart" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"product_id\": 16,
    \"quantity\": 22
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/cart"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "product_id": 16,
    "quantity": 22
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTv1-cart">
</span>
<span id="execution-results-POSTv1-cart" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTv1-cart"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTv1-cart"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTv1-cart" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTv1-cart">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTv1-cart" data-method="POST"
      data-path="v1/cart"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTv1-cart', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTv1-cart"
                    onclick="tryItOut('POSTv1-cart');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTv1-cart"
                    onclick="cancelTryOut('POSTv1-cart');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTv1-cart"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>v1/cart</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTv1-cart"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTv1-cart"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>product_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="product_id"                data-endpoint="POSTv1-cart"
               value="16"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the products table. Example: <code>16</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>quantity</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="quantity"                data-endpoint="POSTv1-cart"
               value="22"
               data-component="body">
    <br>
<p>Must be at least 1. Must not be greater than 999. Example: <code>22</code></p>
        </div>
        </form>

                    <h2 id="cart-PUTv1-cart--cartItem-">Update cart item quantity.</h2>

<p>
</p>



<span id="example-requests-PUTv1-cart--cartItem-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/v1/cart/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"quantity\": 1
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/cart/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "quantity": 1
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTv1-cart--cartItem-">
</span>
<span id="execution-results-PUTv1-cart--cartItem-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTv1-cart--cartItem-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTv1-cart--cartItem-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTv1-cart--cartItem-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTv1-cart--cartItem-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTv1-cart--cartItem-" data-method="PUT"
      data-path="v1/cart/{cartItem}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTv1-cart--cartItem-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTv1-cart--cartItem-"
                    onclick="tryItOut('PUTv1-cart--cartItem-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTv1-cart--cartItem-"
                    onclick="cancelTryOut('PUTv1-cart--cartItem-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTv1-cart--cartItem-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>v1/cart/{cartItem}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTv1-cart--cartItem-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTv1-cart--cartItem-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>cartItem</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="cartItem"                data-endpoint="PUTv1-cart--cartItem-"
               value="architecto"
               data-component="url">
    <br>
<p>Example: <code>architecto</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>quantity</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="quantity"                data-endpoint="PUTv1-cart--cartItem-"
               value="1"
               data-component="body">
    <br>
<p>Must be at least 1. Must not be greater than 999. Example: <code>1</code></p>
        </div>
        </form>

                    <h2 id="cart-DELETEv1-cart--cartItem-">Remove item from cart.</h2>

<p>
</p>



<span id="example-requests-DELETEv1-cart--cartItem-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/v1/cart/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/cart/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEv1-cart--cartItem-">
</span>
<span id="execution-results-DELETEv1-cart--cartItem-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEv1-cart--cartItem-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEv1-cart--cartItem-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEv1-cart--cartItem-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEv1-cart--cartItem-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEv1-cart--cartItem-" data-method="DELETE"
      data-path="v1/cart/{cartItem}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEv1-cart--cartItem-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEv1-cart--cartItem-"
                    onclick="tryItOut('DELETEv1-cart--cartItem-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEv1-cart--cartItem-"
                    onclick="cancelTryOut('DELETEv1-cart--cartItem-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEv1-cart--cartItem-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>v1/cart/{cartItem}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEv1-cart--cartItem-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEv1-cart--cartItem-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>cartItem</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="cartItem"                data-endpoint="DELETEv1-cart--cartItem-"
               value="architecto"
               data-component="url">
    <br>
<p>Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="cart-DELETEv1-cart">Clear entire cart.</h2>

<p>
</p>



<span id="example-requests-DELETEv1-cart">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/v1/cart" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/cart"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEv1-cart">
</span>
<span id="execution-results-DELETEv1-cart" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEv1-cart"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEv1-cart"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEv1-cart" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEv1-cart">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEv1-cart" data-method="DELETE"
      data-path="v1/cart"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEv1-cart', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEv1-cart"
                    onclick="tryItOut('DELETEv1-cart');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEv1-cart"
                    onclick="cancelTryOut('DELETEv1-cart');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEv1-cart"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>v1/cart</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEv1-cart"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEv1-cart"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                <h1 id="categories">Categories</h1>

    

                                <h2 id="categories-GETv1-categories">Get all categories.</h2>

<p>
</p>



<span id="example-requests-GETv1-categories">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/v1/categories" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/categories"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETv1-categories">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;current_page&quot;: 1,
        &quot;data&quot;: [
            {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Ut&quot;,
                &quot;slug&quot;: &quot;ut&quot;,
                &quot;description&quot;: &quot;Magnam dolorem quod nihil voluptas perspiciatis labore voluptate occaecati animi reprehenderit id.&quot;,
                &quot;parent_id&quot;: null,
                &quot;image_url&quot;: &quot;https://via.placeholder.com/400x400.png/0000aa?text=categories+laborum&quot;,
                &quot;status&quot;: &quot;active&quot;,
                &quot;created_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
                &quot;level&quot;: 0,
                &quot;sort_order&quot;: 0,
                &quot;icon&quot;: null,
                &quot;deleted_at&quot;: null,
                &quot;parent&quot;: null,
                &quot;children&quot;: []
            },
            {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Ab&quot;,
                &quot;slug&quot;: &quot;ab&quot;,
                &quot;description&quot;: &quot;Rerum non velit ut qui qui eius temporibus impedit fugiat.&quot;,
                &quot;parent_id&quot;: null,
                &quot;image_url&quot;: &quot;https://via.placeholder.com/400x400.png/006633?text=categories+ratione&quot;,
                &quot;status&quot;: &quot;active&quot;,
                &quot;created_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
                &quot;level&quot;: 0,
                &quot;sort_order&quot;: 0,
                &quot;icon&quot;: null,
                &quot;deleted_at&quot;: null,
                &quot;parent&quot;: null,
                &quot;children&quot;: []
            },
            {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Nam&quot;,
                &quot;slug&quot;: &quot;nam&quot;,
                &quot;description&quot;: &quot;Officiis ut expedita nihil impedit necessitatibus qui.&quot;,
                &quot;parent_id&quot;: null,
                &quot;image_url&quot;: &quot;https://via.placeholder.com/400x400.png/006600?text=categories+modi&quot;,
                &quot;status&quot;: &quot;active&quot;,
                &quot;created_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
                &quot;level&quot;: 0,
                &quot;sort_order&quot;: 0,
                &quot;icon&quot;: null,
                &quot;deleted_at&quot;: null,
                &quot;parent&quot;: null,
                &quot;children&quot;: []
            },
            {
                &quot;id&quot;: 4,
                &quot;name&quot;: &quot;Iste&quot;,
                &quot;slug&quot;: &quot;iste&quot;,
                &quot;description&quot;: &quot;Omnis optio rerum accusamus pariatur dolorem provident alias quia reprehenderit dignissimos.&quot;,
                &quot;parent_id&quot;: null,
                &quot;image_url&quot;: &quot;https://via.placeholder.com/400x400.png/00ff22?text=categories+accusantium&quot;,
                &quot;status&quot;: &quot;active&quot;,
                &quot;created_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
                &quot;level&quot;: 0,
                &quot;sort_order&quot;: 0,
                &quot;icon&quot;: null,
                &quot;deleted_at&quot;: null,
                &quot;parent&quot;: null,
                &quot;children&quot;: []
            },
            {
                &quot;id&quot;: 5,
                &quot;name&quot;: &quot;Molestias&quot;,
                &quot;slug&quot;: &quot;molestias&quot;,
                &quot;description&quot;: &quot;Omnis architecto non officia assumenda quis tenetur accusamus quo.&quot;,
                &quot;parent_id&quot;: null,
                &quot;image_url&quot;: &quot;https://via.placeholder.com/400x400.png/00ff88?text=categories+et&quot;,
                &quot;status&quot;: &quot;active&quot;,
                &quot;created_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
                &quot;level&quot;: 0,
                &quot;sort_order&quot;: 0,
                &quot;icon&quot;: null,
                &quot;deleted_at&quot;: null,
                &quot;parent&quot;: null,
                &quot;children&quot;: []
            }
        ],
        &quot;first_page_url&quot;: &quot;http://localhost:8000/v1/categories?page=1&quot;,
        &quot;from&quot;: 1,
        &quot;last_page&quot;: 1,
        &quot;last_page_url&quot;: &quot;http://localhost:8000/v1/categories?page=1&quot;,
        &quot;links&quot;: [
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;&amp;laquo; Previous&quot;,
                &quot;page&quot;: null,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://localhost:8000/v1/categories?page=1&quot;,
                &quot;label&quot;: &quot;1&quot;,
                &quot;page&quot;: 1,
                &quot;active&quot;: true
            },
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;Next &amp;raquo;&quot;,
                &quot;page&quot;: null,
                &quot;active&quot;: false
            }
        ],
        &quot;next_page_url&quot;: null,
        &quot;path&quot;: &quot;http://localhost:8000/v1/categories&quot;,
        &quot;per_page&quot;: 15,
        &quot;prev_page_url&quot;: null,
        &quot;to&quot;: 5,
        &quot;total&quot;: 5
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETv1-categories" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETv1-categories"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETv1-categories"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETv1-categories" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETv1-categories">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETv1-categories" data-method="GET"
      data-path="v1/categories"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETv1-categories', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETv1-categories"
                    onclick="tryItOut('GETv1-categories');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETv1-categories"
                    onclick="cancelTryOut('GETv1-categories');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETv1-categories"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>v1/categories</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETv1-categories"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETv1-categories"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="categories-GETv1-categories-parent-categories">Get parent categories.</h2>

<p>
</p>



<span id="example-requests-GETv1-categories-parent-categories">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/v1/categories/parent-categories" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/categories/parent-categories"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETv1-categories-parent-categories">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;Ut&quot;
        },
        {
            &quot;id&quot;: 2,
            &quot;name&quot;: &quot;Ab&quot;
        },
        {
            &quot;id&quot;: 3,
            &quot;name&quot;: &quot;Nam&quot;
        },
        {
            &quot;id&quot;: 4,
            &quot;name&quot;: &quot;Iste&quot;
        },
        {
            &quot;id&quot;: 5,
            &quot;name&quot;: &quot;Molestias&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETv1-categories-parent-categories" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETv1-categories-parent-categories"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETv1-categories-parent-categories"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETv1-categories-parent-categories" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETv1-categories-parent-categories">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETv1-categories-parent-categories" data-method="GET"
      data-path="v1/categories/parent-categories"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETv1-categories-parent-categories', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETv1-categories-parent-categories"
                    onclick="tryItOut('GETv1-categories-parent-categories');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETv1-categories-parent-categories"
                    onclick="cancelTryOut('GETv1-categories-parent-categories');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETv1-categories-parent-categories"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>v1/categories/parent-categories</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETv1-categories-parent-categories"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETv1-categories-parent-categories"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="categories-GETv1-categories--category_id-">Get category details.</h2>

<p>
</p>



<span id="example-requests-GETv1-categories--category_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/v1/categories/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/categories/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETv1-categories--category_id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;name&quot;: &quot;Ut&quot;,
        &quot;slug&quot;: &quot;ut&quot;,
        &quot;description&quot;: &quot;Magnam dolorem quod nihil voluptas perspiciatis labore voluptate occaecati animi reprehenderit id.&quot;,
        &quot;parent_id&quot;: null,
        &quot;image_url&quot;: &quot;https://via.placeholder.com/400x400.png/0000aa?text=categories+laborum&quot;,
        &quot;status&quot;: &quot;active&quot;,
        &quot;created_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
        &quot;level&quot;: 0,
        &quot;sort_order&quot;: 0,
        &quot;icon&quot;: null,
        &quot;deleted_at&quot;: null,
        &quot;parent&quot;: null,
        &quot;children&quot;: []
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETv1-categories--category_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETv1-categories--category_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETv1-categories--category_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETv1-categories--category_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETv1-categories--category_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETv1-categories--category_id-" data-method="GET"
      data-path="v1/categories/{category_id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETv1-categories--category_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETv1-categories--category_id-"
                    onclick="tryItOut('GETv1-categories--category_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETv1-categories--category_id-"
                    onclick="cancelTryOut('GETv1-categories--category_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETv1-categories--category_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>v1/categories/{category_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETv1-categories--category_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETv1-categories--category_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>category_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="category_id"                data-endpoint="GETv1-categories--category_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the category. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="categories-GETv1-admin-categories">Get all categories.</h2>

<p>
</p>



<span id="example-requests-GETv1-admin-categories">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/v1/admin/categories" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/admin/categories"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETv1-admin-categories">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETv1-admin-categories" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETv1-admin-categories"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETv1-admin-categories"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETv1-admin-categories" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETv1-admin-categories">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETv1-admin-categories" data-method="GET"
      data-path="v1/admin/categories"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETv1-admin-categories', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETv1-admin-categories"
                    onclick="tryItOut('GETv1-admin-categories');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETv1-admin-categories"
                    onclick="cancelTryOut('GETv1-admin-categories');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETv1-admin-categories"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>v1/admin/categories</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETv1-admin-categories"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETv1-admin-categories"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="categories-GETv1-admin-categories-parent-categories">Get parent categories.</h2>

<p>
</p>



<span id="example-requests-GETv1-admin-categories-parent-categories">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/v1/admin/categories/parent-categories" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/admin/categories/parent-categories"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETv1-admin-categories-parent-categories">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETv1-admin-categories-parent-categories" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETv1-admin-categories-parent-categories"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETv1-admin-categories-parent-categories"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETv1-admin-categories-parent-categories" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETv1-admin-categories-parent-categories">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETv1-admin-categories-parent-categories" data-method="GET"
      data-path="v1/admin/categories/parent-categories"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETv1-admin-categories-parent-categories', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETv1-admin-categories-parent-categories"
                    onclick="tryItOut('GETv1-admin-categories-parent-categories');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETv1-admin-categories-parent-categories"
                    onclick="cancelTryOut('GETv1-admin-categories-parent-categories');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETv1-admin-categories-parent-categories"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>v1/admin/categories/parent-categories</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETv1-admin-categories-parent-categories"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETv1-admin-categories-parent-categories"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="categories-GETv1-admin-categories--category_id-">Get category details.</h2>

<p>
</p>



<span id="example-requests-GETv1-admin-categories--category_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/v1/admin/categories/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/admin/categories/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETv1-admin-categories--category_id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETv1-admin-categories--category_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETv1-admin-categories--category_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETv1-admin-categories--category_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETv1-admin-categories--category_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETv1-admin-categories--category_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETv1-admin-categories--category_id-" data-method="GET"
      data-path="v1/admin/categories/{category_id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETv1-admin-categories--category_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETv1-admin-categories--category_id-"
                    onclick="tryItOut('GETv1-admin-categories--category_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETv1-admin-categories--category_id-"
                    onclick="cancelTryOut('GETv1-admin-categories--category_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETv1-admin-categories--category_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>v1/admin/categories/{category_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETv1-admin-categories--category_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETv1-admin-categories--category_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>category_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="category_id"                data-endpoint="GETv1-admin-categories--category_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the category. Example: <code>1</code></p>
            </div>
                    </form>

                <h1 id="coupons">Coupons</h1>

    

                                <h2 id="coupons-POSTv1-coupons-validate">Validate coupon code.</h2>

<p>
</p>



<span id="example-requests-POSTv1-coupons-validate">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/v1/coupons/validate" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"code\": \"b\",
    \"subtotal\": 39
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/coupons/validate"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "code": "b",
    "subtotal": 39
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTv1-coupons-validate">
</span>
<span id="execution-results-POSTv1-coupons-validate" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTv1-coupons-validate"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTv1-coupons-validate"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTv1-coupons-validate" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTv1-coupons-validate">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTv1-coupons-validate" data-method="POST"
      data-path="v1/coupons/validate"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTv1-coupons-validate', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTv1-coupons-validate"
                    onclick="tryItOut('POSTv1-coupons-validate');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTv1-coupons-validate"
                    onclick="cancelTryOut('POSTv1-coupons-validate');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTv1-coupons-validate"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>v1/coupons/validate</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTv1-coupons-validate"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTv1-coupons-validate"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>code</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="code"                data-endpoint="POSTv1-coupons-validate"
               value="b"
               data-component="body">
    <br>
<p>Must not be greater than 50 characters. Example: <code>b</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>subtotal</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="subtotal"                data-endpoint="POSTv1-coupons-validate"
               value="39"
               data-component="body">
    <br>
<p>Must be at least 0. Example: <code>39</code></p>
        </div>
        </form>

                <h1 id="orders">Orders</h1>

    

                                <h2 id="orders-GETv1-orders">Get user&#039;s orders.</h2>

<p>
</p>



<span id="example-requests-GETv1-orders">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/v1/orders" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/orders"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETv1-orders">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETv1-orders" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETv1-orders"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETv1-orders"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETv1-orders" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETv1-orders">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETv1-orders" data-method="GET"
      data-path="v1/orders"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETv1-orders', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETv1-orders"
                    onclick="tryItOut('GETv1-orders');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETv1-orders"
                    onclick="cancelTryOut('GETv1-orders');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETv1-orders"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>v1/orders</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETv1-orders"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETv1-orders"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="orders-POSTv1-orders">Create new order from cart.</h2>

<p>
</p>



<span id="example-requests-POSTv1-orders">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/v1/orders" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"shipping_address\": {
        \"first_name\": \"b\",
        \"last_name\": \"n\",
        \"phone\": \"gzmiyvdljnikhway\",
        \"street_line_1\": \"k\",
        \"city\": \"c\",
        \"state_province\": \"m\",
        \"postal_code\": \"yuwpwlvqwrsitcps\",
        \"country\": \"cq\"
    },
    \"shipping_method_id\": 16,
    \"coupon_code\": \"n\",
    \"customer_notes\": \"g\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/orders"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "shipping_address": {
        "first_name": "b",
        "last_name": "n",
        "phone": "gzmiyvdljnikhway",
        "street_line_1": "k",
        "city": "c",
        "state_province": "m",
        "postal_code": "yuwpwlvqwrsitcps",
        "country": "cq"
    },
    "shipping_method_id": 16,
    "coupon_code": "n",
    "customer_notes": "g"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTv1-orders">
</span>
<span id="execution-results-POSTv1-orders" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTv1-orders"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTv1-orders"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTv1-orders" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTv1-orders">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTv1-orders" data-method="POST"
      data-path="v1/orders"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTv1-orders', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTv1-orders"
                    onclick="tryItOut('POSTv1-orders');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTv1-orders"
                    onclick="cancelTryOut('POSTv1-orders');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTv1-orders"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>v1/orders</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTv1-orders"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTv1-orders"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>shipping_address</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
 &nbsp;
 &nbsp;
<br>

            </summary>
                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>first_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="shipping_address.first_name"                data-endpoint="POSTv1-orders"
               value="b"
               data-component="body">
    <br>
<p>Must not be greater than 100 characters. Example: <code>b</code></p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>last_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="shipping_address.last_name"                data-endpoint="POSTv1-orders"
               value="n"
               data-component="body">
    <br>
<p>Must not be greater than 100 characters. Example: <code>n</code></p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>phone</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="shipping_address.phone"                data-endpoint="POSTv1-orders"
               value="gzmiyvdljnikhway"
               data-component="body">
    <br>
<p>Must not be greater than 20 characters. Example: <code>gzmiyvdljnikhway</code></p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>street_line_1</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="shipping_address.street_line_1"                data-endpoint="POSTv1-orders"
               value="k"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>k</code></p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>city</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="shipping_address.city"                data-endpoint="POSTv1-orders"
               value="c"
               data-component="body">
    <br>
<p>Must not be greater than 100 characters. Example: <code>c</code></p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>state_province</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="shipping_address.state_province"                data-endpoint="POSTv1-orders"
               value="m"
               data-component="body">
    <br>
<p>Must not be greater than 100 characters. Example: <code>m</code></p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>postal_code</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="shipping_address.postal_code"                data-endpoint="POSTv1-orders"
               value="yuwpwlvqwrsitcps"
               data-component="body">
    <br>
<p>Must not be greater than 20 characters. Example: <code>yuwpwlvqwrsitcps</code></p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>country</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="shipping_address.country"                data-endpoint="POSTv1-orders"
               value="cq"
               data-component="body">
    <br>
<p>Must be 2 characters. Example: <code>cq</code></p>
                    </div>
                                    </details>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>billing_address</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="billing_address"                data-endpoint="POSTv1-orders"
               value=""
               data-component="body">
    <br>

        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>shipping_method_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="shipping_method_id"                data-endpoint="POSTv1-orders"
               value="16"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the shipping_methods table. Example: <code>16</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>coupon_code</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="coupon_code"                data-endpoint="POSTv1-orders"
               value="n"
               data-component="body">
    <br>
<p>Must not be greater than 50 characters. Example: <code>n</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>customer_notes</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="customer_notes"                data-endpoint="POSTv1-orders"
               value="g"
               data-component="body">
    <br>
<p>Must not be greater than 1000 characters. Example: <code>g</code></p>
        </div>
        </form>

                    <h2 id="orders-GETv1-orders--order_id-">Get order details.</h2>

<p>
</p>



<span id="example-requests-GETv1-orders--order_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/v1/orders/16" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/orders/16"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETv1-orders--order_id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETv1-orders--order_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETv1-orders--order_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETv1-orders--order_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETv1-orders--order_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETv1-orders--order_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETv1-orders--order_id-" data-method="GET"
      data-path="v1/orders/{order_id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETv1-orders--order_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETv1-orders--order_id-"
                    onclick="tryItOut('GETv1-orders--order_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETv1-orders--order_id-"
                    onclick="cancelTryOut('GETv1-orders--order_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETv1-orders--order_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>v1/orders/{order_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETv1-orders--order_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETv1-orders--order_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>order_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="order_id"                data-endpoint="GETv1-orders--order_id-"
               value="16"
               data-component="url">
    <br>
<p>The ID of the order. Example: <code>16</code></p>
            </div>
                    </form>

                    <h2 id="orders-PATCHv1-orders--order_id--cancel">Cancel order.</h2>

<p>
</p>



<span id="example-requests-PATCHv1-orders--order_id--cancel">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PATCH \
    "http://localhost:8000/v1/orders/16/cancel" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/orders/16/cancel"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PATCH",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PATCHv1-orders--order_id--cancel">
</span>
<span id="execution-results-PATCHv1-orders--order_id--cancel" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PATCHv1-orders--order_id--cancel"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PATCHv1-orders--order_id--cancel"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PATCHv1-orders--order_id--cancel" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PATCHv1-orders--order_id--cancel">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PATCHv1-orders--order_id--cancel" data-method="PATCH"
      data-path="v1/orders/{order_id}/cancel"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PATCHv1-orders--order_id--cancel', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PATCHv1-orders--order_id--cancel"
                    onclick="tryItOut('PATCHv1-orders--order_id--cancel');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PATCHv1-orders--order_id--cancel"
                    onclick="cancelTryOut('PATCHv1-orders--order_id--cancel');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PATCHv1-orders--order_id--cancel"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>v1/orders/{order_id}/cancel</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PATCHv1-orders--order_id--cancel"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PATCHv1-orders--order_id--cancel"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>order_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="order_id"                data-endpoint="PATCHv1-orders--order_id--cancel"
               value="16"
               data-component="url">
    <br>
<p>The ID of the order. Example: <code>16</code></p>
            </div>
                    </form>

                <h1 id="payments">Payments</h1>

    

                                <h2 id="payments-POSTv1-payments">Process payment for an order.</h2>

<p>
</p>



<span id="example-requests-POSTv1-payments">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/v1/payments" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"order_id\": 16,
    \"payment_method\": \"credit_card\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/payments"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "order_id": 16,
    "payment_method": "credit_card"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTv1-payments">
</span>
<span id="execution-results-POSTv1-payments" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTv1-payments"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTv1-payments"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTv1-payments" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTv1-payments">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTv1-payments" data-method="POST"
      data-path="v1/payments"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTv1-payments', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTv1-payments"
                    onclick="tryItOut('POSTv1-payments');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTv1-payments"
                    onclick="cancelTryOut('POSTv1-payments');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTv1-payments"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>v1/payments</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTv1-payments"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTv1-payments"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>order_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="order_id"                data-endpoint="POSTv1-payments"
               value="16"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the orders table. Example: <code>16</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>payment_method</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="payment_method"                data-endpoint="POSTv1-payments"
               value="credit_card"
               data-component="body">
    <br>
<p>Example: <code>credit_card</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>credit_card</code></li> <li><code>debit_card</code></li> <li><code>paypal</code></li> <li><code>stripe</code></li> <li><code>cash_on_delivery</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>payment_data</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="payment_data"                data-endpoint="POSTv1-payments"
               value=""
               data-component="body">
    <br>

        </div>
        </form>

                    <h2 id="payments-GETv1-payments--payment_id-">Get payment details.</h2>

<p>
</p>



<span id="example-requests-GETv1-payments--payment_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/v1/payments/16" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/payments/16"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETv1-payments--payment_id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETv1-payments--payment_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETv1-payments--payment_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETv1-payments--payment_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETv1-payments--payment_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETv1-payments--payment_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETv1-payments--payment_id-" data-method="GET"
      data-path="v1/payments/{payment_id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETv1-payments--payment_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETv1-payments--payment_id-"
                    onclick="tryItOut('GETv1-payments--payment_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETv1-payments--payment_id-"
                    onclick="cancelTryOut('GETv1-payments--payment_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETv1-payments--payment_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>v1/payments/{payment_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETv1-payments--payment_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETv1-payments--payment_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>payment_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="payment_id"                data-endpoint="GETv1-payments--payment_id-"
               value="16"
               data-component="url">
    <br>
<p>The ID of the payment. Example: <code>16</code></p>
            </div>
                    </form>

                    <h2 id="payments-GETv1-payments-order--order_id-">Get order payments.</h2>

<p>
</p>



<span id="example-requests-GETv1-payments-order--order_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/v1/payments/order/16" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/payments/order/16"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETv1-payments-order--order_id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETv1-payments-order--order_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETv1-payments-order--order_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETv1-payments-order--order_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETv1-payments-order--order_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETv1-payments-order--order_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETv1-payments-order--order_id-" data-method="GET"
      data-path="v1/payments/order/{order_id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETv1-payments-order--order_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETv1-payments-order--order_id-"
                    onclick="tryItOut('GETv1-payments-order--order_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETv1-payments-order--order_id-"
                    onclick="cancelTryOut('GETv1-payments-order--order_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETv1-payments-order--order_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>v1/payments/order/{order_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETv1-payments-order--order_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETv1-payments-order--order_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>order_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="order_id"                data-endpoint="GETv1-payments-order--order_id-"
               value="16"
               data-component="url">
    <br>
<p>The ID of the order. Example: <code>16</code></p>
            </div>
                    </form>

                <h1 id="products">Products</h1>

    

                                <h2 id="products-GETv1-products">Get all products.</h2>

<p>
</p>



<span id="example-requests-GETv1-products">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/v1/products" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/products"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETv1-products">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">[
    {
        &quot;id&quot;: 1,
        &quot;sku&quot;: &quot;SKU-371VA&quot;,
        &quot;name&quot;: &quot;quas id&quot;,
        &quot;description&quot;: &quot;Earum doloremque suscipit modi ea voluptas voluptate deserunt reiciendis hic.&quot;,
        &quot;category_id&quot;: 3,
        &quot;brand_id&quot;: 3,
        &quot;price&quot;: &quot;427.73&quot;,
        &quot;discount_price&quot;: &quot;100.94&quot;,
        &quot;stock&quot;: 25,
        &quot;image_url&quot;: &quot;https://via.placeholder.com/400x400.png/00bb22?text=products+nihil&quot;,
        &quot;rating&quot;: &quot;3.00&quot;,
        &quot;created_at&quot;: &quot;2025-12-25T13:00:11.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-12-25T13:00:11.000000Z&quot;,
        &quot;slug&quot;: &quot;quas-id-6638&quot;,
        &quot;short_description&quot;: null,
        &quot;cost_price&quot;: null,
        &quot;discount_percentage&quot;: null,
        &quot;low_stock_threshold&quot;: 10,
        &quot;stock_status&quot;: &quot;in_stock&quot;,
        &quot;weight&quot;: null,
        &quot;dimensions&quot;: null,
        &quot;reviews_count&quot;: 0,
        &quot;views_count&quot;: 0,
        &quot;sold_count&quot;: 0,
        &quot;is_featured&quot;: false,
        &quot;meta_title&quot;: null,
        &quot;meta_description&quot;: null,
        &quot;status&quot;: &quot;active&quot;,
        &quot;deleted_at&quot;: null,
        &quot;category&quot;: {
            &quot;id&quot;: 3,
            &quot;name&quot;: &quot;Nam&quot;,
            &quot;slug&quot;: &quot;nam&quot;,
            &quot;description&quot;: &quot;Officiis ut expedita nihil impedit necessitatibus qui.&quot;,
            &quot;parent_id&quot;: null,
            &quot;image_url&quot;: &quot;https://via.placeholder.com/400x400.png/006600?text=categories+modi&quot;,
            &quot;status&quot;: &quot;active&quot;,
            &quot;created_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
            &quot;level&quot;: 0,
            &quot;sort_order&quot;: 0,
            &quot;icon&quot;: null,
            &quot;deleted_at&quot;: null
        },
        &quot;brand&quot;: {
            &quot;id&quot;: 3,
            &quot;name&quot;: &quot;Halvorson-Effertz&quot;,
            &quot;slug&quot;: &quot;halvorson-effertz&quot;,
            &quot;description&quot;: &quot;Quis doloribus deleniti maxime quia modi dolorum earum sapiente.&quot;,
            &quot;logo_url&quot;: &quot;https://via.placeholder.com/200x200.png/005588?text=brands+magnam&quot;,
            &quot;website&quot;: &quot;https://becker.org/recusandae-provident-sit-numquam-ut-similique-sunt-unde.html&quot;,
            &quot;status&quot;: &quot;active&quot;,
            &quot;created_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
            &quot;sort_order&quot;: 0,
            &quot;deleted_at&quot;: null
        }
    },
    {
        &quot;id&quot;: 2,
        &quot;sku&quot;: &quot;SKU-725KS&quot;,
        &quot;name&quot;: &quot;magnam id&quot;,
        &quot;description&quot;: &quot;Nobis voluptatum aut sequi iure similique cumque sint explicabo cumque fugit beatae veniam.&quot;,
        &quot;category_id&quot;: 3,
        &quot;brand_id&quot;: 4,
        &quot;price&quot;: &quot;630.40&quot;,
        &quot;discount_price&quot;: null,
        &quot;stock&quot;: 11,
        &quot;image_url&quot;: &quot;https://via.placeholder.com/400x400.png/001133?text=products+atque&quot;,
        &quot;rating&quot;: &quot;1.10&quot;,
        &quot;created_at&quot;: &quot;2025-12-25T13:00:11.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-12-25T13:00:11.000000Z&quot;,
        &quot;slug&quot;: &quot;magnam-id-1769&quot;,
        &quot;short_description&quot;: null,
        &quot;cost_price&quot;: null,
        &quot;discount_percentage&quot;: null,
        &quot;low_stock_threshold&quot;: 10,
        &quot;stock_status&quot;: &quot;in_stock&quot;,
        &quot;weight&quot;: null,
        &quot;dimensions&quot;: null,
        &quot;reviews_count&quot;: 0,
        &quot;views_count&quot;: 0,
        &quot;sold_count&quot;: 0,
        &quot;is_featured&quot;: false,
        &quot;meta_title&quot;: null,
        &quot;meta_description&quot;: null,
        &quot;status&quot;: &quot;active&quot;,
        &quot;deleted_at&quot;: null,
        &quot;category&quot;: {
            &quot;id&quot;: 3,
            &quot;name&quot;: &quot;Nam&quot;,
            &quot;slug&quot;: &quot;nam&quot;,
            &quot;description&quot;: &quot;Officiis ut expedita nihil impedit necessitatibus qui.&quot;,
            &quot;parent_id&quot;: null,
            &quot;image_url&quot;: &quot;https://via.placeholder.com/400x400.png/006600?text=categories+modi&quot;,
            &quot;status&quot;: &quot;active&quot;,
            &quot;created_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
            &quot;level&quot;: 0,
            &quot;sort_order&quot;: 0,
            &quot;icon&quot;: null,
            &quot;deleted_at&quot;: null
        },
        &quot;brand&quot;: {
            &quot;id&quot;: 4,
            &quot;name&quot;: &quot;Cruickshank, Von and Schaden&quot;,
            &quot;slug&quot;: &quot;cruickshank-von-and-schaden&quot;,
            &quot;description&quot;: &quot;Esse repudiandae repudiandae eum laudantium molestias ullam consequatur a perferendis in.&quot;,
            &quot;logo_url&quot;: &quot;https://via.placeholder.com/200x200.png/006677?text=brands+officiis&quot;,
            &quot;website&quot;: &quot;http://franecki.biz/&quot;,
            &quot;status&quot;: &quot;active&quot;,
            &quot;created_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
            &quot;sort_order&quot;: 0,
            &quot;deleted_at&quot;: null
        }
    },
    {
        &quot;id&quot;: 3,
        &quot;sku&quot;: &quot;SKU-994BU&quot;,
        &quot;name&quot;: &quot;minima reiciendis&quot;,
        &quot;description&quot;: &quot;Tempore quia quas nihil optio qui ipsa nihil et.&quot;,
        &quot;category_id&quot;: 2,
        &quot;brand_id&quot;: 5,
        &quot;price&quot;: &quot;909.43&quot;,
        &quot;discount_price&quot;: null,
        &quot;stock&quot;: 78,
        &quot;image_url&quot;: &quot;https://via.placeholder.com/400x400.png/0033ff?text=products+dolores&quot;,
        &quot;rating&quot;: &quot;4.00&quot;,
        &quot;created_at&quot;: &quot;2025-12-25T13:00:11.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-12-25T13:00:11.000000Z&quot;,
        &quot;slug&quot;: &quot;minima-reiciendis-7746&quot;,
        &quot;short_description&quot;: null,
        &quot;cost_price&quot;: null,
        &quot;discount_percentage&quot;: null,
        &quot;low_stock_threshold&quot;: 10,
        &quot;stock_status&quot;: &quot;in_stock&quot;,
        &quot;weight&quot;: null,
        &quot;dimensions&quot;: null,
        &quot;reviews_count&quot;: 0,
        &quot;views_count&quot;: 0,
        &quot;sold_count&quot;: 0,
        &quot;is_featured&quot;: false,
        &quot;meta_title&quot;: null,
        &quot;meta_description&quot;: null,
        &quot;status&quot;: &quot;active&quot;,
        &quot;deleted_at&quot;: null,
        &quot;category&quot;: {
            &quot;id&quot;: 2,
            &quot;name&quot;: &quot;Ab&quot;,
            &quot;slug&quot;: &quot;ab&quot;,
            &quot;description&quot;: &quot;Rerum non velit ut qui qui eius temporibus impedit fugiat.&quot;,
            &quot;parent_id&quot;: null,
            &quot;image_url&quot;: &quot;https://via.placeholder.com/400x400.png/006633?text=categories+ratione&quot;,
            &quot;status&quot;: &quot;active&quot;,
            &quot;created_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
            &quot;level&quot;: 0,
            &quot;sort_order&quot;: 0,
            &quot;icon&quot;: null,
            &quot;deleted_at&quot;: null
        },
        &quot;brand&quot;: {
            &quot;id&quot;: 5,
            &quot;name&quot;: &quot;Feeney-Langosh&quot;,
            &quot;slug&quot;: &quot;feeney-langosh&quot;,
            &quot;description&quot;: &quot;Repellendus aut et quo vel ut hic praesentium quos eveniet.&quot;,
            &quot;logo_url&quot;: &quot;https://via.placeholder.com/200x200.png/007700?text=brands+omnis&quot;,
            &quot;website&quot;: &quot;http://www.lockman.org/voluptatum-aliquid-hic-et-quasi-eaque-voluptate.html&quot;,
            &quot;status&quot;: &quot;active&quot;,
            &quot;created_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
            &quot;sort_order&quot;: 0,
            &quot;deleted_at&quot;: null
        }
    },
    {
        &quot;id&quot;: 4,
        &quot;sku&quot;: &quot;SKU-705KP&quot;,
        &quot;name&quot;: &quot;quia quae&quot;,
        &quot;description&quot;: &quot;Qui dolores delectus laudantium tenetur possimus officia quibusdam inventore quibusdam.&quot;,
        &quot;category_id&quot;: 5,
        &quot;brand_id&quot;: 3,
        &quot;price&quot;: &quot;243.84&quot;,
        &quot;discount_price&quot;: &quot;798.48&quot;,
        &quot;stock&quot;: 67,
        &quot;image_url&quot;: &quot;https://via.placeholder.com/400x400.png/008833?text=products+sed&quot;,
        &quot;rating&quot;: &quot;3.90&quot;,
        &quot;created_at&quot;: &quot;2025-12-25T13:00:11.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-12-25T13:00:11.000000Z&quot;,
        &quot;slug&quot;: &quot;quia-quae-6791&quot;,
        &quot;short_description&quot;: null,
        &quot;cost_price&quot;: null,
        &quot;discount_percentage&quot;: null,
        &quot;low_stock_threshold&quot;: 10,
        &quot;stock_status&quot;: &quot;in_stock&quot;,
        &quot;weight&quot;: null,
        &quot;dimensions&quot;: null,
        &quot;reviews_count&quot;: 0,
        &quot;views_count&quot;: 0,
        &quot;sold_count&quot;: 0,
        &quot;is_featured&quot;: false,
        &quot;meta_title&quot;: null,
        &quot;meta_description&quot;: null,
        &quot;status&quot;: &quot;active&quot;,
        &quot;deleted_at&quot;: null,
        &quot;category&quot;: {
            &quot;id&quot;: 5,
            &quot;name&quot;: &quot;Molestias&quot;,
            &quot;slug&quot;: &quot;molestias&quot;,
            &quot;description&quot;: &quot;Omnis architecto non officia assumenda quis tenetur accusamus quo.&quot;,
            &quot;parent_id&quot;: null,
            &quot;image_url&quot;: &quot;https://via.placeholder.com/400x400.png/00ff88?text=categories+et&quot;,
            &quot;status&quot;: &quot;active&quot;,
            &quot;created_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
            &quot;level&quot;: 0,
            &quot;sort_order&quot;: 0,
            &quot;icon&quot;: null,
            &quot;deleted_at&quot;: null
        },
        &quot;brand&quot;: {
            &quot;id&quot;: 3,
            &quot;name&quot;: &quot;Halvorson-Effertz&quot;,
            &quot;slug&quot;: &quot;halvorson-effertz&quot;,
            &quot;description&quot;: &quot;Quis doloribus deleniti maxime quia modi dolorum earum sapiente.&quot;,
            &quot;logo_url&quot;: &quot;https://via.placeholder.com/200x200.png/005588?text=brands+magnam&quot;,
            &quot;website&quot;: &quot;https://becker.org/recusandae-provident-sit-numquam-ut-similique-sunt-unde.html&quot;,
            &quot;status&quot;: &quot;active&quot;,
            &quot;created_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
            &quot;sort_order&quot;: 0,
            &quot;deleted_at&quot;: null
        }
    },
    {
        &quot;id&quot;: 5,
        &quot;sku&quot;: &quot;SKU-252KC&quot;,
        &quot;name&quot;: &quot;ratione sunt&quot;,
        &quot;description&quot;: &quot;Est possimus sapiente harum repellendus distinctio quidem consequatur provident aut omnis ut et odio hic temporibus autem.&quot;,
        &quot;category_id&quot;: 3,
        &quot;brand_id&quot;: 2,
        &quot;price&quot;: &quot;699.11&quot;,
        &quot;discount_price&quot;: null,
        &quot;stock&quot;: 45,
        &quot;image_url&quot;: &quot;https://via.placeholder.com/400x400.png/0055aa?text=products+quae&quot;,
        &quot;rating&quot;: &quot;2.50&quot;,
        &quot;created_at&quot;: &quot;2025-12-25T13:00:11.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-12-25T13:00:11.000000Z&quot;,
        &quot;slug&quot;: &quot;ratione-sunt-6541&quot;,
        &quot;short_description&quot;: null,
        &quot;cost_price&quot;: null,
        &quot;discount_percentage&quot;: null,
        &quot;low_stock_threshold&quot;: 10,
        &quot;stock_status&quot;: &quot;in_stock&quot;,
        &quot;weight&quot;: null,
        &quot;dimensions&quot;: null,
        &quot;reviews_count&quot;: 0,
        &quot;views_count&quot;: 0,
        &quot;sold_count&quot;: 0,
        &quot;is_featured&quot;: false,
        &quot;meta_title&quot;: null,
        &quot;meta_description&quot;: null,
        &quot;status&quot;: &quot;active&quot;,
        &quot;deleted_at&quot;: null,
        &quot;category&quot;: {
            &quot;id&quot;: 3,
            &quot;name&quot;: &quot;Nam&quot;,
            &quot;slug&quot;: &quot;nam&quot;,
            &quot;description&quot;: &quot;Officiis ut expedita nihil impedit necessitatibus qui.&quot;,
            &quot;parent_id&quot;: null,
            &quot;image_url&quot;: &quot;https://via.placeholder.com/400x400.png/006600?text=categories+modi&quot;,
            &quot;status&quot;: &quot;active&quot;,
            &quot;created_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
            &quot;level&quot;: 0,
            &quot;sort_order&quot;: 0,
            &quot;icon&quot;: null,
            &quot;deleted_at&quot;: null
        },
        &quot;brand&quot;: {
            &quot;id&quot;: 2,
            &quot;name&quot;: &quot;Blanda Inc&quot;,
            &quot;slug&quot;: &quot;blanda-inc&quot;,
            &quot;description&quot;: &quot;Totam inventore esse ipsum repellat et sapiente quod maiores.&quot;,
            &quot;logo_url&quot;: &quot;https://via.placeholder.com/200x200.png/001155?text=brands+voluptatem&quot;,
            &quot;website&quot;: &quot;http://corkery.com/et-tenetur-omnis-iste-optio.html&quot;,
            &quot;status&quot;: &quot;active&quot;,
            &quot;created_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
            &quot;sort_order&quot;: 0,
            &quot;deleted_at&quot;: null
        }
    },
    {
        &quot;id&quot;: 6,
        &quot;sku&quot;: &quot;SKU-646QC&quot;,
        &quot;name&quot;: &quot;ut ea&quot;,
        &quot;description&quot;: &quot;Consequatur cupiditate ut ad aut quaerat cumque at aliquid.&quot;,
        &quot;category_id&quot;: 2,
        &quot;brand_id&quot;: 2,
        &quot;price&quot;: &quot;707.95&quot;,
        &quot;discount_price&quot;: &quot;453.27&quot;,
        &quot;stock&quot;: 79,
        &quot;image_url&quot;: &quot;https://via.placeholder.com/400x400.png/006666?text=products+facilis&quot;,
        &quot;rating&quot;: &quot;4.60&quot;,
        &quot;created_at&quot;: &quot;2025-12-25T13:00:11.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-12-25T13:00:11.000000Z&quot;,
        &quot;slug&quot;: &quot;ut-ea-5563&quot;,
        &quot;short_description&quot;: null,
        &quot;cost_price&quot;: null,
        &quot;discount_percentage&quot;: null,
        &quot;low_stock_threshold&quot;: 10,
        &quot;stock_status&quot;: &quot;in_stock&quot;,
        &quot;weight&quot;: null,
        &quot;dimensions&quot;: null,
        &quot;reviews_count&quot;: 0,
        &quot;views_count&quot;: 0,
        &quot;sold_count&quot;: 0,
        &quot;is_featured&quot;: true,
        &quot;meta_title&quot;: null,
        &quot;meta_description&quot;: null,
        &quot;status&quot;: &quot;active&quot;,
        &quot;deleted_at&quot;: null,
        &quot;category&quot;: {
            &quot;id&quot;: 2,
            &quot;name&quot;: &quot;Ab&quot;,
            &quot;slug&quot;: &quot;ab&quot;,
            &quot;description&quot;: &quot;Rerum non velit ut qui qui eius temporibus impedit fugiat.&quot;,
            &quot;parent_id&quot;: null,
            &quot;image_url&quot;: &quot;https://via.placeholder.com/400x400.png/006633?text=categories+ratione&quot;,
            &quot;status&quot;: &quot;active&quot;,
            &quot;created_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
            &quot;level&quot;: 0,
            &quot;sort_order&quot;: 0,
            &quot;icon&quot;: null,
            &quot;deleted_at&quot;: null
        },
        &quot;brand&quot;: {
            &quot;id&quot;: 2,
            &quot;name&quot;: &quot;Blanda Inc&quot;,
            &quot;slug&quot;: &quot;blanda-inc&quot;,
            &quot;description&quot;: &quot;Totam inventore esse ipsum repellat et sapiente quod maiores.&quot;,
            &quot;logo_url&quot;: &quot;https://via.placeholder.com/200x200.png/001155?text=brands+voluptatem&quot;,
            &quot;website&quot;: &quot;http://corkery.com/et-tenetur-omnis-iste-optio.html&quot;,
            &quot;status&quot;: &quot;active&quot;,
            &quot;created_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
            &quot;sort_order&quot;: 0,
            &quot;deleted_at&quot;: null
        }
    },
    {
        &quot;id&quot;: 7,
        &quot;sku&quot;: &quot;SKU-828NV&quot;,
        &quot;name&quot;: &quot;est odit&quot;,
        &quot;description&quot;: &quot;Vel quia dolore necessitatibus voluptatem quas et aut nemo non.&quot;,
        &quot;category_id&quot;: 2,
        &quot;brand_id&quot;: 5,
        &quot;price&quot;: &quot;758.04&quot;,
        &quot;discount_price&quot;: null,
        &quot;stock&quot;: 41,
        &quot;image_url&quot;: &quot;https://via.placeholder.com/400x400.png/008866?text=products+ea&quot;,
        &quot;rating&quot;: &quot;4.30&quot;,
        &quot;created_at&quot;: &quot;2025-12-25T13:00:11.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-12-25T13:00:11.000000Z&quot;,
        &quot;slug&quot;: &quot;est-odit-2515&quot;,
        &quot;short_description&quot;: null,
        &quot;cost_price&quot;: null,
        &quot;discount_percentage&quot;: null,
        &quot;low_stock_threshold&quot;: 10,
        &quot;stock_status&quot;: &quot;in_stock&quot;,
        &quot;weight&quot;: null,
        &quot;dimensions&quot;: null,
        &quot;reviews_count&quot;: 0,
        &quot;views_count&quot;: 0,
        &quot;sold_count&quot;: 0,
        &quot;is_featured&quot;: false,
        &quot;meta_title&quot;: null,
        &quot;meta_description&quot;: null,
        &quot;status&quot;: &quot;active&quot;,
        &quot;deleted_at&quot;: null,
        &quot;category&quot;: {
            &quot;id&quot;: 2,
            &quot;name&quot;: &quot;Ab&quot;,
            &quot;slug&quot;: &quot;ab&quot;,
            &quot;description&quot;: &quot;Rerum non velit ut qui qui eius temporibus impedit fugiat.&quot;,
            &quot;parent_id&quot;: null,
            &quot;image_url&quot;: &quot;https://via.placeholder.com/400x400.png/006633?text=categories+ratione&quot;,
            &quot;status&quot;: &quot;active&quot;,
            &quot;created_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
            &quot;level&quot;: 0,
            &quot;sort_order&quot;: 0,
            &quot;icon&quot;: null,
            &quot;deleted_at&quot;: null
        },
        &quot;brand&quot;: {
            &quot;id&quot;: 5,
            &quot;name&quot;: &quot;Feeney-Langosh&quot;,
            &quot;slug&quot;: &quot;feeney-langosh&quot;,
            &quot;description&quot;: &quot;Repellendus aut et quo vel ut hic praesentium quos eveniet.&quot;,
            &quot;logo_url&quot;: &quot;https://via.placeholder.com/200x200.png/007700?text=brands+omnis&quot;,
            &quot;website&quot;: &quot;http://www.lockman.org/voluptatum-aliquid-hic-et-quasi-eaque-voluptate.html&quot;,
            &quot;status&quot;: &quot;active&quot;,
            &quot;created_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
            &quot;sort_order&quot;: 0,
            &quot;deleted_at&quot;: null
        }
    },
    {
        &quot;id&quot;: 8,
        &quot;sku&quot;: &quot;SKU-163QF&quot;,
        &quot;name&quot;: &quot;repellat repudiandae&quot;,
        &quot;description&quot;: &quot;Quidem placeat quia facere temporibus ut culpa assumenda placeat praesentium nisi enim.&quot;,
        &quot;category_id&quot;: 1,
        &quot;brand_id&quot;: 4,
        &quot;price&quot;: &quot;350.69&quot;,
        &quot;discount_price&quot;: &quot;470.97&quot;,
        &quot;stock&quot;: 77,
        &quot;image_url&quot;: &quot;https://via.placeholder.com/400x400.png/00ff00?text=products+omnis&quot;,
        &quot;rating&quot;: &quot;1.30&quot;,
        &quot;created_at&quot;: &quot;2025-12-25T13:00:11.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-12-25T13:00:11.000000Z&quot;,
        &quot;slug&quot;: &quot;repellat-repudiandae-6721&quot;,
        &quot;short_description&quot;: null,
        &quot;cost_price&quot;: null,
        &quot;discount_percentage&quot;: null,
        &quot;low_stock_threshold&quot;: 10,
        &quot;stock_status&quot;: &quot;in_stock&quot;,
        &quot;weight&quot;: null,
        &quot;dimensions&quot;: null,
        &quot;reviews_count&quot;: 0,
        &quot;views_count&quot;: 0,
        &quot;sold_count&quot;: 0,
        &quot;is_featured&quot;: false,
        &quot;meta_title&quot;: null,
        &quot;meta_description&quot;: null,
        &quot;status&quot;: &quot;active&quot;,
        &quot;deleted_at&quot;: null,
        &quot;category&quot;: {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;Ut&quot;,
            &quot;slug&quot;: &quot;ut&quot;,
            &quot;description&quot;: &quot;Magnam dolorem quod nihil voluptas perspiciatis labore voluptate occaecati animi reprehenderit id.&quot;,
            &quot;parent_id&quot;: null,
            &quot;image_url&quot;: &quot;https://via.placeholder.com/400x400.png/0000aa?text=categories+laborum&quot;,
            &quot;status&quot;: &quot;active&quot;,
            &quot;created_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
            &quot;level&quot;: 0,
            &quot;sort_order&quot;: 0,
            &quot;icon&quot;: null,
            &quot;deleted_at&quot;: null
        },
        &quot;brand&quot;: {
            &quot;id&quot;: 4,
            &quot;name&quot;: &quot;Cruickshank, Von and Schaden&quot;,
            &quot;slug&quot;: &quot;cruickshank-von-and-schaden&quot;,
            &quot;description&quot;: &quot;Esse repudiandae repudiandae eum laudantium molestias ullam consequatur a perferendis in.&quot;,
            &quot;logo_url&quot;: &quot;https://via.placeholder.com/200x200.png/006677?text=brands+officiis&quot;,
            &quot;website&quot;: &quot;http://franecki.biz/&quot;,
            &quot;status&quot;: &quot;active&quot;,
            &quot;created_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
            &quot;sort_order&quot;: 0,
            &quot;deleted_at&quot;: null
        }
    },
    {
        &quot;id&quot;: 9,
        &quot;sku&quot;: &quot;SKU-700BU&quot;,
        &quot;name&quot;: &quot;dicta voluptatem&quot;,
        &quot;description&quot;: &quot;Dolor molestiae maiores repudiandae inventore nihil autem ea natus optio.&quot;,
        &quot;category_id&quot;: 5,
        &quot;brand_id&quot;: 2,
        &quot;price&quot;: &quot;761.80&quot;,
        &quot;discount_price&quot;: null,
        &quot;stock&quot;: 86,
        &quot;image_url&quot;: &quot;https://via.placeholder.com/400x400.png/0088dd?text=products+reprehenderit&quot;,
        &quot;rating&quot;: &quot;3.40&quot;,
        &quot;created_at&quot;: &quot;2025-12-25T13:00:11.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-12-25T13:00:11.000000Z&quot;,
        &quot;slug&quot;: &quot;dicta-voluptatem-7949&quot;,
        &quot;short_description&quot;: null,
        &quot;cost_price&quot;: null,
        &quot;discount_percentage&quot;: null,
        &quot;low_stock_threshold&quot;: 10,
        &quot;stock_status&quot;: &quot;in_stock&quot;,
        &quot;weight&quot;: null,
        &quot;dimensions&quot;: null,
        &quot;reviews_count&quot;: 0,
        &quot;views_count&quot;: 0,
        &quot;sold_count&quot;: 0,
        &quot;is_featured&quot;: true,
        &quot;meta_title&quot;: null,
        &quot;meta_description&quot;: null,
        &quot;status&quot;: &quot;active&quot;,
        &quot;deleted_at&quot;: null,
        &quot;category&quot;: {
            &quot;id&quot;: 5,
            &quot;name&quot;: &quot;Molestias&quot;,
            &quot;slug&quot;: &quot;molestias&quot;,
            &quot;description&quot;: &quot;Omnis architecto non officia assumenda quis tenetur accusamus quo.&quot;,
            &quot;parent_id&quot;: null,
            &quot;image_url&quot;: &quot;https://via.placeholder.com/400x400.png/00ff88?text=categories+et&quot;,
            &quot;status&quot;: &quot;active&quot;,
            &quot;created_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
            &quot;level&quot;: 0,
            &quot;sort_order&quot;: 0,
            &quot;icon&quot;: null,
            &quot;deleted_at&quot;: null
        },
        &quot;brand&quot;: {
            &quot;id&quot;: 2,
            &quot;name&quot;: &quot;Blanda Inc&quot;,
            &quot;slug&quot;: &quot;blanda-inc&quot;,
            &quot;description&quot;: &quot;Totam inventore esse ipsum repellat et sapiente quod maiores.&quot;,
            &quot;logo_url&quot;: &quot;https://via.placeholder.com/200x200.png/001155?text=brands+voluptatem&quot;,
            &quot;website&quot;: &quot;http://corkery.com/et-tenetur-omnis-iste-optio.html&quot;,
            &quot;status&quot;: &quot;active&quot;,
            &quot;created_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
            &quot;sort_order&quot;: 0,
            &quot;deleted_at&quot;: null
        }
    },
    {
        &quot;id&quot;: 10,
        &quot;sku&quot;: &quot;SKU-203BS&quot;,
        &quot;name&quot;: &quot;porro in&quot;,
        &quot;description&quot;: &quot;Distinctio impedit fugit id et dolores atque dignissimos odit ducimus animi deleniti et.&quot;,
        &quot;category_id&quot;: 4,
        &quot;brand_id&quot;: 4,
        &quot;price&quot;: &quot;245.47&quot;,
        &quot;discount_price&quot;: &quot;82.82&quot;,
        &quot;stock&quot;: 43,
        &quot;image_url&quot;: &quot;https://via.placeholder.com/400x400.png/00ee33?text=products+quidem&quot;,
        &quot;rating&quot;: &quot;2.50&quot;,
        &quot;created_at&quot;: &quot;2025-12-25T13:00:11.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-12-25T13:00:11.000000Z&quot;,
        &quot;slug&quot;: &quot;porro-in-3377&quot;,
        &quot;short_description&quot;: null,
        &quot;cost_price&quot;: null,
        &quot;discount_percentage&quot;: null,
        &quot;low_stock_threshold&quot;: 10,
        &quot;stock_status&quot;: &quot;in_stock&quot;,
        &quot;weight&quot;: null,
        &quot;dimensions&quot;: null,
        &quot;reviews_count&quot;: 0,
        &quot;views_count&quot;: 0,
        &quot;sold_count&quot;: 0,
        &quot;is_featured&quot;: false,
        &quot;meta_title&quot;: null,
        &quot;meta_description&quot;: null,
        &quot;status&quot;: &quot;active&quot;,
        &quot;deleted_at&quot;: null,
        &quot;category&quot;: {
            &quot;id&quot;: 4,
            &quot;name&quot;: &quot;Iste&quot;,
            &quot;slug&quot;: &quot;iste&quot;,
            &quot;description&quot;: &quot;Omnis optio rerum accusamus pariatur dolorem provident alias quia reprehenderit dignissimos.&quot;,
            &quot;parent_id&quot;: null,
            &quot;image_url&quot;: &quot;https://via.placeholder.com/400x400.png/00ff22?text=categories+accusantium&quot;,
            &quot;status&quot;: &quot;active&quot;,
            &quot;created_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
            &quot;level&quot;: 0,
            &quot;sort_order&quot;: 0,
            &quot;icon&quot;: null,
            &quot;deleted_at&quot;: null
        },
        &quot;brand&quot;: {
            &quot;id&quot;: 4,
            &quot;name&quot;: &quot;Cruickshank, Von and Schaden&quot;,
            &quot;slug&quot;: &quot;cruickshank-von-and-schaden&quot;,
            &quot;description&quot;: &quot;Esse repudiandae repudiandae eum laudantium molestias ullam consequatur a perferendis in.&quot;,
            &quot;logo_url&quot;: &quot;https://via.placeholder.com/200x200.png/006677?text=brands+officiis&quot;,
            &quot;website&quot;: &quot;http://franecki.biz/&quot;,
            &quot;status&quot;: &quot;active&quot;,
            &quot;created_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
            &quot;sort_order&quot;: 0,
            &quot;deleted_at&quot;: null
        }
    },
    {
        &quot;id&quot;: 11,
        &quot;sku&quot;: &quot;SKU-518LO&quot;,
        &quot;name&quot;: &quot;voluptatem quia&quot;,
        &quot;description&quot;: &quot;Cum tempora soluta a corporis rerum assumenda saepe saepe inventore aut distinctio.&quot;,
        &quot;category_id&quot;: 1,
        &quot;brand_id&quot;: 3,
        &quot;price&quot;: &quot;200.25&quot;,
        &quot;discount_price&quot;: null,
        &quot;stock&quot;: 59,
        &quot;image_url&quot;: &quot;https://via.placeholder.com/400x400.png/00ccff?text=products+eaque&quot;,
        &quot;rating&quot;: &quot;3.40&quot;,
        &quot;created_at&quot;: &quot;2025-12-25T13:00:11.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-12-25T13:00:11.000000Z&quot;,
        &quot;slug&quot;: &quot;voluptatem-quia-5628&quot;,
        &quot;short_description&quot;: null,
        &quot;cost_price&quot;: null,
        &quot;discount_percentage&quot;: null,
        &quot;low_stock_threshold&quot;: 10,
        &quot;stock_status&quot;: &quot;in_stock&quot;,
        &quot;weight&quot;: null,
        &quot;dimensions&quot;: null,
        &quot;reviews_count&quot;: 0,
        &quot;views_count&quot;: 0,
        &quot;sold_count&quot;: 0,
        &quot;is_featured&quot;: false,
        &quot;meta_title&quot;: null,
        &quot;meta_description&quot;: null,
        &quot;status&quot;: &quot;active&quot;,
        &quot;deleted_at&quot;: null,
        &quot;category&quot;: {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;Ut&quot;,
            &quot;slug&quot;: &quot;ut&quot;,
            &quot;description&quot;: &quot;Magnam dolorem quod nihil voluptas perspiciatis labore voluptate occaecati animi reprehenderit id.&quot;,
            &quot;parent_id&quot;: null,
            &quot;image_url&quot;: &quot;https://via.placeholder.com/400x400.png/0000aa?text=categories+laborum&quot;,
            &quot;status&quot;: &quot;active&quot;,
            &quot;created_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
            &quot;level&quot;: 0,
            &quot;sort_order&quot;: 0,
            &quot;icon&quot;: null,
            &quot;deleted_at&quot;: null
        },
        &quot;brand&quot;: {
            &quot;id&quot;: 3,
            &quot;name&quot;: &quot;Halvorson-Effertz&quot;,
            &quot;slug&quot;: &quot;halvorson-effertz&quot;,
            &quot;description&quot;: &quot;Quis doloribus deleniti maxime quia modi dolorum earum sapiente.&quot;,
            &quot;logo_url&quot;: &quot;https://via.placeholder.com/200x200.png/005588?text=brands+magnam&quot;,
            &quot;website&quot;: &quot;https://becker.org/recusandae-provident-sit-numquam-ut-similique-sunt-unde.html&quot;,
            &quot;status&quot;: &quot;active&quot;,
            &quot;created_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
            &quot;sort_order&quot;: 0,
            &quot;deleted_at&quot;: null
        }
    },
    {
        &quot;id&quot;: 12,
        &quot;sku&quot;: &quot;SKU-928CK&quot;,
        &quot;name&quot;: &quot;repellendus tempora&quot;,
        &quot;description&quot;: &quot;Aut odit minima error et est dolorem quod.&quot;,
        &quot;category_id&quot;: 1,
        &quot;brand_id&quot;: 2,
        &quot;price&quot;: &quot;628.75&quot;,
        &quot;discount_price&quot;: null,
        &quot;stock&quot;: 89,
        &quot;image_url&quot;: &quot;https://via.placeholder.com/400x400.png/00ffdd?text=products+sit&quot;,
        &quot;rating&quot;: &quot;3.30&quot;,
        &quot;created_at&quot;: &quot;2025-12-25T13:00:11.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-12-25T13:00:11.000000Z&quot;,
        &quot;slug&quot;: &quot;repellendus-tempora-4841&quot;,
        &quot;short_description&quot;: null,
        &quot;cost_price&quot;: null,
        &quot;discount_percentage&quot;: null,
        &quot;low_stock_threshold&quot;: 10,
        &quot;stock_status&quot;: &quot;in_stock&quot;,
        &quot;weight&quot;: null,
        &quot;dimensions&quot;: null,
        &quot;reviews_count&quot;: 0,
        &quot;views_count&quot;: 0,
        &quot;sold_count&quot;: 0,
        &quot;is_featured&quot;: true,
        &quot;meta_title&quot;: null,
        &quot;meta_description&quot;: null,
        &quot;status&quot;: &quot;active&quot;,
        &quot;deleted_at&quot;: null,
        &quot;category&quot;: {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;Ut&quot;,
            &quot;slug&quot;: &quot;ut&quot;,
            &quot;description&quot;: &quot;Magnam dolorem quod nihil voluptas perspiciatis labore voluptate occaecati animi reprehenderit id.&quot;,
            &quot;parent_id&quot;: null,
            &quot;image_url&quot;: &quot;https://via.placeholder.com/400x400.png/0000aa?text=categories+laborum&quot;,
            &quot;status&quot;: &quot;active&quot;,
            &quot;created_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
            &quot;level&quot;: 0,
            &quot;sort_order&quot;: 0,
            &quot;icon&quot;: null,
            &quot;deleted_at&quot;: null
        },
        &quot;brand&quot;: {
            &quot;id&quot;: 2,
            &quot;name&quot;: &quot;Blanda Inc&quot;,
            &quot;slug&quot;: &quot;blanda-inc&quot;,
            &quot;description&quot;: &quot;Totam inventore esse ipsum repellat et sapiente quod maiores.&quot;,
            &quot;logo_url&quot;: &quot;https://via.placeholder.com/200x200.png/001155?text=brands+voluptatem&quot;,
            &quot;website&quot;: &quot;http://corkery.com/et-tenetur-omnis-iste-optio.html&quot;,
            &quot;status&quot;: &quot;active&quot;,
            &quot;created_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
            &quot;sort_order&quot;: 0,
            &quot;deleted_at&quot;: null
        }
    },
    {
        &quot;id&quot;: 13,
        &quot;sku&quot;: &quot;SKU-446NT&quot;,
        &quot;name&quot;: &quot;sunt id&quot;,
        &quot;description&quot;: &quot;Modi et vitae nesciunt mollitia tenetur ratione est.&quot;,
        &quot;category_id&quot;: 5,
        &quot;brand_id&quot;: 1,
        &quot;price&quot;: &quot;517.28&quot;,
        &quot;discount_price&quot;: null,
        &quot;stock&quot;: 34,
        &quot;image_url&quot;: &quot;https://via.placeholder.com/400x400.png/00cc11?text=products+voluptas&quot;,
        &quot;rating&quot;: &quot;4.60&quot;,
        &quot;created_at&quot;: &quot;2025-12-25T13:00:11.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-12-25T13:00:11.000000Z&quot;,
        &quot;slug&quot;: &quot;sunt-id-3115&quot;,
        &quot;short_description&quot;: null,
        &quot;cost_price&quot;: null,
        &quot;discount_percentage&quot;: null,
        &quot;low_stock_threshold&quot;: 10,
        &quot;stock_status&quot;: &quot;in_stock&quot;,
        &quot;weight&quot;: null,
        &quot;dimensions&quot;: null,
        &quot;reviews_count&quot;: 0,
        &quot;views_count&quot;: 0,
        &quot;sold_count&quot;: 0,
        &quot;is_featured&quot;: false,
        &quot;meta_title&quot;: null,
        &quot;meta_description&quot;: null,
        &quot;status&quot;: &quot;active&quot;,
        &quot;deleted_at&quot;: null,
        &quot;category&quot;: {
            &quot;id&quot;: 5,
            &quot;name&quot;: &quot;Molestias&quot;,
            &quot;slug&quot;: &quot;molestias&quot;,
            &quot;description&quot;: &quot;Omnis architecto non officia assumenda quis tenetur accusamus quo.&quot;,
            &quot;parent_id&quot;: null,
            &quot;image_url&quot;: &quot;https://via.placeholder.com/400x400.png/00ff88?text=categories+et&quot;,
            &quot;status&quot;: &quot;active&quot;,
            &quot;created_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
            &quot;level&quot;: 0,
            &quot;sort_order&quot;: 0,
            &quot;icon&quot;: null,
            &quot;deleted_at&quot;: null
        },
        &quot;brand&quot;: {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;Lehner-Lehner&quot;,
            &quot;slug&quot;: &quot;lehner-lehner&quot;,
            &quot;description&quot;: &quot;Velit id pariatur voluptas commodi voluptatibus aut.&quot;,
            &quot;logo_url&quot;: &quot;https://via.placeholder.com/200x200.png/008833?text=brands+incidunt&quot;,
            &quot;website&quot;: &quot;http://steuber.com/&quot;,
            &quot;status&quot;: &quot;active&quot;,
            &quot;created_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
            &quot;sort_order&quot;: 0,
            &quot;deleted_at&quot;: null
        }
    },
    {
        &quot;id&quot;: 14,
        &quot;sku&quot;: &quot;SKU-653TA&quot;,
        &quot;name&quot;: &quot;inventore dolorem&quot;,
        &quot;description&quot;: &quot;Sequi magni in illum quos quaerat quae vero maiores quam omnis nostrum consequatur architecto voluptates.&quot;,
        &quot;category_id&quot;: 4,
        &quot;brand_id&quot;: 4,
        &quot;price&quot;: &quot;596.16&quot;,
        &quot;discount_price&quot;: null,
        &quot;stock&quot;: 76,
        &quot;image_url&quot;: &quot;https://via.placeholder.com/400x400.png/00ffbb?text=products+corporis&quot;,
        &quot;rating&quot;: &quot;3.80&quot;,
        &quot;created_at&quot;: &quot;2025-12-25T13:00:11.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-12-25T13:00:11.000000Z&quot;,
        &quot;slug&quot;: &quot;inventore-dolorem-5993&quot;,
        &quot;short_description&quot;: null,
        &quot;cost_price&quot;: null,
        &quot;discount_percentage&quot;: null,
        &quot;low_stock_threshold&quot;: 10,
        &quot;stock_status&quot;: &quot;in_stock&quot;,
        &quot;weight&quot;: null,
        &quot;dimensions&quot;: null,
        &quot;reviews_count&quot;: 0,
        &quot;views_count&quot;: 0,
        &quot;sold_count&quot;: 0,
        &quot;is_featured&quot;: false,
        &quot;meta_title&quot;: null,
        &quot;meta_description&quot;: null,
        &quot;status&quot;: &quot;active&quot;,
        &quot;deleted_at&quot;: null,
        &quot;category&quot;: {
            &quot;id&quot;: 4,
            &quot;name&quot;: &quot;Iste&quot;,
            &quot;slug&quot;: &quot;iste&quot;,
            &quot;description&quot;: &quot;Omnis optio rerum accusamus pariatur dolorem provident alias quia reprehenderit dignissimos.&quot;,
            &quot;parent_id&quot;: null,
            &quot;image_url&quot;: &quot;https://via.placeholder.com/400x400.png/00ff22?text=categories+accusantium&quot;,
            &quot;status&quot;: &quot;active&quot;,
            &quot;created_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
            &quot;level&quot;: 0,
            &quot;sort_order&quot;: 0,
            &quot;icon&quot;: null,
            &quot;deleted_at&quot;: null
        },
        &quot;brand&quot;: {
            &quot;id&quot;: 4,
            &quot;name&quot;: &quot;Cruickshank, Von and Schaden&quot;,
            &quot;slug&quot;: &quot;cruickshank-von-and-schaden&quot;,
            &quot;description&quot;: &quot;Esse repudiandae repudiandae eum laudantium molestias ullam consequatur a perferendis in.&quot;,
            &quot;logo_url&quot;: &quot;https://via.placeholder.com/200x200.png/006677?text=brands+officiis&quot;,
            &quot;website&quot;: &quot;http://franecki.biz/&quot;,
            &quot;status&quot;: &quot;active&quot;,
            &quot;created_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
            &quot;sort_order&quot;: 0,
            &quot;deleted_at&quot;: null
        }
    },
    {
        &quot;id&quot;: 15,
        &quot;sku&quot;: &quot;SKU-365WE&quot;,
        &quot;name&quot;: &quot;cum consequatur&quot;,
        &quot;description&quot;: &quot;Minus occaecati necessitatibus dolores id ut voluptatum quam.&quot;,
        &quot;category_id&quot;: 5,
        &quot;brand_id&quot;: 1,
        &quot;price&quot;: &quot;243.83&quot;,
        &quot;discount_price&quot;: null,
        &quot;stock&quot;: 14,
        &quot;image_url&quot;: &quot;https://via.placeholder.com/400x400.png/00bbee?text=products+consequatur&quot;,
        &quot;rating&quot;: &quot;3.50&quot;,
        &quot;created_at&quot;: &quot;2025-12-25T13:00:11.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-12-25T13:00:11.000000Z&quot;,
        &quot;slug&quot;: &quot;cum-consequatur-5737&quot;,
        &quot;short_description&quot;: null,
        &quot;cost_price&quot;: null,
        &quot;discount_percentage&quot;: null,
        &quot;low_stock_threshold&quot;: 10,
        &quot;stock_status&quot;: &quot;in_stock&quot;,
        &quot;weight&quot;: null,
        &quot;dimensions&quot;: null,
        &quot;reviews_count&quot;: 0,
        &quot;views_count&quot;: 0,
        &quot;sold_count&quot;: 0,
        &quot;is_featured&quot;: false,
        &quot;meta_title&quot;: null,
        &quot;meta_description&quot;: null,
        &quot;status&quot;: &quot;active&quot;,
        &quot;deleted_at&quot;: null,
        &quot;category&quot;: {
            &quot;id&quot;: 5,
            &quot;name&quot;: &quot;Molestias&quot;,
            &quot;slug&quot;: &quot;molestias&quot;,
            &quot;description&quot;: &quot;Omnis architecto non officia assumenda quis tenetur accusamus quo.&quot;,
            &quot;parent_id&quot;: null,
            &quot;image_url&quot;: &quot;https://via.placeholder.com/400x400.png/00ff88?text=categories+et&quot;,
            &quot;status&quot;: &quot;active&quot;,
            &quot;created_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
            &quot;level&quot;: 0,
            &quot;sort_order&quot;: 0,
            &quot;icon&quot;: null,
            &quot;deleted_at&quot;: null
        },
        &quot;brand&quot;: {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;Lehner-Lehner&quot;,
            &quot;slug&quot;: &quot;lehner-lehner&quot;,
            &quot;description&quot;: &quot;Velit id pariatur voluptas commodi voluptatibus aut.&quot;,
            &quot;logo_url&quot;: &quot;https://via.placeholder.com/200x200.png/008833?text=brands+incidunt&quot;,
            &quot;website&quot;: &quot;http://steuber.com/&quot;,
            &quot;status&quot;: &quot;active&quot;,
            &quot;created_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
            &quot;sort_order&quot;: 0,
            &quot;deleted_at&quot;: null
        }
    },
    {
        &quot;id&quot;: 16,
        &quot;sku&quot;: &quot;SKU-093PS&quot;,
        &quot;name&quot;: &quot;tempora qui&quot;,
        &quot;description&quot;: &quot;Enim delectus deleniti quam natus enim consequatur voluptas asperiores quod dolor atque optio amet.&quot;,
        &quot;category_id&quot;: 3,
        &quot;brand_id&quot;: 2,
        &quot;price&quot;: &quot;707.04&quot;,
        &quot;discount_price&quot;: null,
        &quot;stock&quot;: 48,
        &quot;image_url&quot;: &quot;https://via.placeholder.com/400x400.png/0055dd?text=products+voluptatum&quot;,
        &quot;rating&quot;: &quot;1.10&quot;,
        &quot;created_at&quot;: &quot;2025-12-25T13:00:11.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-12-25T13:00:11.000000Z&quot;,
        &quot;slug&quot;: &quot;tempora-qui-5710&quot;,
        &quot;short_description&quot;: null,
        &quot;cost_price&quot;: null,
        &quot;discount_percentage&quot;: null,
        &quot;low_stock_threshold&quot;: 10,
        &quot;stock_status&quot;: &quot;in_stock&quot;,
        &quot;weight&quot;: null,
        &quot;dimensions&quot;: null,
        &quot;reviews_count&quot;: 0,
        &quot;views_count&quot;: 0,
        &quot;sold_count&quot;: 0,
        &quot;is_featured&quot;: true,
        &quot;meta_title&quot;: null,
        &quot;meta_description&quot;: null,
        &quot;status&quot;: &quot;active&quot;,
        &quot;deleted_at&quot;: null,
        &quot;category&quot;: {
            &quot;id&quot;: 3,
            &quot;name&quot;: &quot;Nam&quot;,
            &quot;slug&quot;: &quot;nam&quot;,
            &quot;description&quot;: &quot;Officiis ut expedita nihil impedit necessitatibus qui.&quot;,
            &quot;parent_id&quot;: null,
            &quot;image_url&quot;: &quot;https://via.placeholder.com/400x400.png/006600?text=categories+modi&quot;,
            &quot;status&quot;: &quot;active&quot;,
            &quot;created_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
            &quot;level&quot;: 0,
            &quot;sort_order&quot;: 0,
            &quot;icon&quot;: null,
            &quot;deleted_at&quot;: null
        },
        &quot;brand&quot;: {
            &quot;id&quot;: 2,
            &quot;name&quot;: &quot;Blanda Inc&quot;,
            &quot;slug&quot;: &quot;blanda-inc&quot;,
            &quot;description&quot;: &quot;Totam inventore esse ipsum repellat et sapiente quod maiores.&quot;,
            &quot;logo_url&quot;: &quot;https://via.placeholder.com/200x200.png/001155?text=brands+voluptatem&quot;,
            &quot;website&quot;: &quot;http://corkery.com/et-tenetur-omnis-iste-optio.html&quot;,
            &quot;status&quot;: &quot;active&quot;,
            &quot;created_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
            &quot;sort_order&quot;: 0,
            &quot;deleted_at&quot;: null
        }
    },
    {
        &quot;id&quot;: 17,
        &quot;sku&quot;: &quot;SKU-341LD&quot;,
        &quot;name&quot;: &quot;voluptate sequi&quot;,
        &quot;description&quot;: &quot;Perspiciatis excepturi qui veritatis in rerum velit est et veniam illo.&quot;,
        &quot;category_id&quot;: 4,
        &quot;brand_id&quot;: 4,
        &quot;price&quot;: &quot;750.76&quot;,
        &quot;discount_price&quot;: null,
        &quot;stock&quot;: 48,
        &quot;image_url&quot;: &quot;https://via.placeholder.com/400x400.png/00ee22?text=products+iusto&quot;,
        &quot;rating&quot;: &quot;1.10&quot;,
        &quot;created_at&quot;: &quot;2025-12-25T13:00:11.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-12-25T13:00:11.000000Z&quot;,
        &quot;slug&quot;: &quot;voluptate-sequi-9694&quot;,
        &quot;short_description&quot;: null,
        &quot;cost_price&quot;: null,
        &quot;discount_percentage&quot;: null,
        &quot;low_stock_threshold&quot;: 10,
        &quot;stock_status&quot;: &quot;in_stock&quot;,
        &quot;weight&quot;: null,
        &quot;dimensions&quot;: null,
        &quot;reviews_count&quot;: 0,
        &quot;views_count&quot;: 0,
        &quot;sold_count&quot;: 0,
        &quot;is_featured&quot;: true,
        &quot;meta_title&quot;: null,
        &quot;meta_description&quot;: null,
        &quot;status&quot;: &quot;active&quot;,
        &quot;deleted_at&quot;: null,
        &quot;category&quot;: {
            &quot;id&quot;: 4,
            &quot;name&quot;: &quot;Iste&quot;,
            &quot;slug&quot;: &quot;iste&quot;,
            &quot;description&quot;: &quot;Omnis optio rerum accusamus pariatur dolorem provident alias quia reprehenderit dignissimos.&quot;,
            &quot;parent_id&quot;: null,
            &quot;image_url&quot;: &quot;https://via.placeholder.com/400x400.png/00ff22?text=categories+accusantium&quot;,
            &quot;status&quot;: &quot;active&quot;,
            &quot;created_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
            &quot;level&quot;: 0,
            &quot;sort_order&quot;: 0,
            &quot;icon&quot;: null,
            &quot;deleted_at&quot;: null
        },
        &quot;brand&quot;: {
            &quot;id&quot;: 4,
            &quot;name&quot;: &quot;Cruickshank, Von and Schaden&quot;,
            &quot;slug&quot;: &quot;cruickshank-von-and-schaden&quot;,
            &quot;description&quot;: &quot;Esse repudiandae repudiandae eum laudantium molestias ullam consequatur a perferendis in.&quot;,
            &quot;logo_url&quot;: &quot;https://via.placeholder.com/200x200.png/006677?text=brands+officiis&quot;,
            &quot;website&quot;: &quot;http://franecki.biz/&quot;,
            &quot;status&quot;: &quot;active&quot;,
            &quot;created_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
            &quot;sort_order&quot;: 0,
            &quot;deleted_at&quot;: null
        }
    },
    {
        &quot;id&quot;: 18,
        &quot;sku&quot;: &quot;SKU-078FD&quot;,
        &quot;name&quot;: &quot;atque vel&quot;,
        &quot;description&quot;: &quot;A aut quia est expedita voluptatem nam et sed adipisci ut non incidunt perspiciatis aperiam quia qui.&quot;,
        &quot;category_id&quot;: 4,
        &quot;brand_id&quot;: 5,
        &quot;price&quot;: &quot;735.11&quot;,
        &quot;discount_price&quot;: null,
        &quot;stock&quot;: 19,
        &quot;image_url&quot;: &quot;https://via.placeholder.com/400x400.png/0066ee?text=products+dolor&quot;,
        &quot;rating&quot;: &quot;1.60&quot;,
        &quot;created_at&quot;: &quot;2025-12-25T13:00:11.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-12-25T13:00:11.000000Z&quot;,
        &quot;slug&quot;: &quot;atque-vel-7554&quot;,
        &quot;short_description&quot;: null,
        &quot;cost_price&quot;: null,
        &quot;discount_percentage&quot;: null,
        &quot;low_stock_threshold&quot;: 10,
        &quot;stock_status&quot;: &quot;in_stock&quot;,
        &quot;weight&quot;: null,
        &quot;dimensions&quot;: null,
        &quot;reviews_count&quot;: 0,
        &quot;views_count&quot;: 0,
        &quot;sold_count&quot;: 0,
        &quot;is_featured&quot;: false,
        &quot;meta_title&quot;: null,
        &quot;meta_description&quot;: null,
        &quot;status&quot;: &quot;active&quot;,
        &quot;deleted_at&quot;: null,
        &quot;category&quot;: {
            &quot;id&quot;: 4,
            &quot;name&quot;: &quot;Iste&quot;,
            &quot;slug&quot;: &quot;iste&quot;,
            &quot;description&quot;: &quot;Omnis optio rerum accusamus pariatur dolorem provident alias quia reprehenderit dignissimos.&quot;,
            &quot;parent_id&quot;: null,
            &quot;image_url&quot;: &quot;https://via.placeholder.com/400x400.png/00ff22?text=categories+accusantium&quot;,
            &quot;status&quot;: &quot;active&quot;,
            &quot;created_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
            &quot;level&quot;: 0,
            &quot;sort_order&quot;: 0,
            &quot;icon&quot;: null,
            &quot;deleted_at&quot;: null
        },
        &quot;brand&quot;: {
            &quot;id&quot;: 5,
            &quot;name&quot;: &quot;Feeney-Langosh&quot;,
            &quot;slug&quot;: &quot;feeney-langosh&quot;,
            &quot;description&quot;: &quot;Repellendus aut et quo vel ut hic praesentium quos eveniet.&quot;,
            &quot;logo_url&quot;: &quot;https://via.placeholder.com/200x200.png/007700?text=brands+omnis&quot;,
            &quot;website&quot;: &quot;http://www.lockman.org/voluptatum-aliquid-hic-et-quasi-eaque-voluptate.html&quot;,
            &quot;status&quot;: &quot;active&quot;,
            &quot;created_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
            &quot;sort_order&quot;: 0,
            &quot;deleted_at&quot;: null
        }
    },
    {
        &quot;id&quot;: 19,
        &quot;sku&quot;: &quot;SKU-022TT&quot;,
        &quot;name&quot;: &quot;suscipit non&quot;,
        &quot;description&quot;: &quot;Explicabo ut dolorum deleniti animi quae beatae vero et mollitia ipsum.&quot;,
        &quot;category_id&quot;: 2,
        &quot;brand_id&quot;: 2,
        &quot;price&quot;: &quot;323.82&quot;,
        &quot;discount_price&quot;: null,
        &quot;stock&quot;: 79,
        &quot;image_url&quot;: &quot;https://via.placeholder.com/400x400.png/00ff55?text=products+autem&quot;,
        &quot;rating&quot;: &quot;4.60&quot;,
        &quot;created_at&quot;: &quot;2025-12-25T13:00:11.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-12-25T13:00:11.000000Z&quot;,
        &quot;slug&quot;: &quot;suscipit-non-9637&quot;,
        &quot;short_description&quot;: null,
        &quot;cost_price&quot;: null,
        &quot;discount_percentage&quot;: null,
        &quot;low_stock_threshold&quot;: 10,
        &quot;stock_status&quot;: &quot;in_stock&quot;,
        &quot;weight&quot;: null,
        &quot;dimensions&quot;: null,
        &quot;reviews_count&quot;: 0,
        &quot;views_count&quot;: 0,
        &quot;sold_count&quot;: 0,
        &quot;is_featured&quot;: false,
        &quot;meta_title&quot;: null,
        &quot;meta_description&quot;: null,
        &quot;status&quot;: &quot;active&quot;,
        &quot;deleted_at&quot;: null,
        &quot;category&quot;: {
            &quot;id&quot;: 2,
            &quot;name&quot;: &quot;Ab&quot;,
            &quot;slug&quot;: &quot;ab&quot;,
            &quot;description&quot;: &quot;Rerum non velit ut qui qui eius temporibus impedit fugiat.&quot;,
            &quot;parent_id&quot;: null,
            &quot;image_url&quot;: &quot;https://via.placeholder.com/400x400.png/006633?text=categories+ratione&quot;,
            &quot;status&quot;: &quot;active&quot;,
            &quot;created_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
            &quot;level&quot;: 0,
            &quot;sort_order&quot;: 0,
            &quot;icon&quot;: null,
            &quot;deleted_at&quot;: null
        },
        &quot;brand&quot;: {
            &quot;id&quot;: 2,
            &quot;name&quot;: &quot;Blanda Inc&quot;,
            &quot;slug&quot;: &quot;blanda-inc&quot;,
            &quot;description&quot;: &quot;Totam inventore esse ipsum repellat et sapiente quod maiores.&quot;,
            &quot;logo_url&quot;: &quot;https://via.placeholder.com/200x200.png/001155?text=brands+voluptatem&quot;,
            &quot;website&quot;: &quot;http://corkery.com/et-tenetur-omnis-iste-optio.html&quot;,
            &quot;status&quot;: &quot;active&quot;,
            &quot;created_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
            &quot;sort_order&quot;: 0,
            &quot;deleted_at&quot;: null
        }
    },
    {
        &quot;id&quot;: 20,
        &quot;sku&quot;: &quot;SKU-038HF&quot;,
        &quot;name&quot;: &quot;nostrum ipsa&quot;,
        &quot;description&quot;: &quot;Quae alias sed aut rerum laborum incidunt ex rerum.&quot;,
        &quot;category_id&quot;: 3,
        &quot;brand_id&quot;: 3,
        &quot;price&quot;: &quot;277.92&quot;,
        &quot;discount_price&quot;: &quot;175.60&quot;,
        &quot;stock&quot;: 86,
        &quot;image_url&quot;: &quot;https://via.placeholder.com/400x400.png/00bb11?text=products+saepe&quot;,
        &quot;rating&quot;: &quot;4.50&quot;,
        &quot;created_at&quot;: &quot;2025-12-25T13:00:11.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-12-25T13:00:11.000000Z&quot;,
        &quot;slug&quot;: &quot;nostrum-ipsa-6482&quot;,
        &quot;short_description&quot;: null,
        &quot;cost_price&quot;: null,
        &quot;discount_percentage&quot;: null,
        &quot;low_stock_threshold&quot;: 10,
        &quot;stock_status&quot;: &quot;in_stock&quot;,
        &quot;weight&quot;: null,
        &quot;dimensions&quot;: null,
        &quot;reviews_count&quot;: 0,
        &quot;views_count&quot;: 0,
        &quot;sold_count&quot;: 0,
        &quot;is_featured&quot;: false,
        &quot;meta_title&quot;: null,
        &quot;meta_description&quot;: null,
        &quot;status&quot;: &quot;active&quot;,
        &quot;deleted_at&quot;: null,
        &quot;category&quot;: {
            &quot;id&quot;: 3,
            &quot;name&quot;: &quot;Nam&quot;,
            &quot;slug&quot;: &quot;nam&quot;,
            &quot;description&quot;: &quot;Officiis ut expedita nihil impedit necessitatibus qui.&quot;,
            &quot;parent_id&quot;: null,
            &quot;image_url&quot;: &quot;https://via.placeholder.com/400x400.png/006600?text=categories+modi&quot;,
            &quot;status&quot;: &quot;active&quot;,
            &quot;created_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
            &quot;level&quot;: 0,
            &quot;sort_order&quot;: 0,
            &quot;icon&quot;: null,
            &quot;deleted_at&quot;: null
        },
        &quot;brand&quot;: {
            &quot;id&quot;: 3,
            &quot;name&quot;: &quot;Halvorson-Effertz&quot;,
            &quot;slug&quot;: &quot;halvorson-effertz&quot;,
            &quot;description&quot;: &quot;Quis doloribus deleniti maxime quia modi dolorum earum sapiente.&quot;,
            &quot;logo_url&quot;: &quot;https://via.placeholder.com/200x200.png/005588?text=brands+magnam&quot;,
            &quot;website&quot;: &quot;https://becker.org/recusandae-provident-sit-numquam-ut-similique-sunt-unde.html&quot;,
            &quot;status&quot;: &quot;active&quot;,
            &quot;created_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
            &quot;sort_order&quot;: 0,
            &quot;deleted_at&quot;: null
        }
    }
]</code>
 </pre>
    </span>
<span id="execution-results-GETv1-products" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETv1-products"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETv1-products"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETv1-products" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETv1-products">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETv1-products" data-method="GET"
      data-path="v1/products"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETv1-products', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETv1-products"
                    onclick="tryItOut('GETv1-products');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETv1-products"
                    onclick="cancelTryOut('GETv1-products');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETv1-products"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>v1/products</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETv1-products"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETv1-products"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="products-GETv1-products-form-data">Get form data (categories and brands).</h2>

<p>
</p>



<span id="example-requests-GETv1-products-form-data">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/v1/products/form/data" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/products/form/data"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETv1-products-form-data">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;categories&quot;: [
            {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Ut&quot;,
                &quot;slug&quot;: &quot;ut&quot;,
                &quot;description&quot;: &quot;Magnam dolorem quod nihil voluptas perspiciatis labore voluptate occaecati animi reprehenderit id.&quot;,
                &quot;parent_id&quot;: null,
                &quot;image_url&quot;: &quot;https://via.placeholder.com/400x400.png/0000aa?text=categories+laborum&quot;,
                &quot;status&quot;: &quot;active&quot;,
                &quot;created_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
                &quot;level&quot;: 0,
                &quot;sort_order&quot;: 0,
                &quot;icon&quot;: null,
                &quot;deleted_at&quot;: null
            },
            {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Ab&quot;,
                &quot;slug&quot;: &quot;ab&quot;,
                &quot;description&quot;: &quot;Rerum non velit ut qui qui eius temporibus impedit fugiat.&quot;,
                &quot;parent_id&quot;: null,
                &quot;image_url&quot;: &quot;https://via.placeholder.com/400x400.png/006633?text=categories+ratione&quot;,
                &quot;status&quot;: &quot;active&quot;,
                &quot;created_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
                &quot;level&quot;: 0,
                &quot;sort_order&quot;: 0,
                &quot;icon&quot;: null,
                &quot;deleted_at&quot;: null
            },
            {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Nam&quot;,
                &quot;slug&quot;: &quot;nam&quot;,
                &quot;description&quot;: &quot;Officiis ut expedita nihil impedit necessitatibus qui.&quot;,
                &quot;parent_id&quot;: null,
                &quot;image_url&quot;: &quot;https://via.placeholder.com/400x400.png/006600?text=categories+modi&quot;,
                &quot;status&quot;: &quot;active&quot;,
                &quot;created_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
                &quot;level&quot;: 0,
                &quot;sort_order&quot;: 0,
                &quot;icon&quot;: null,
                &quot;deleted_at&quot;: null
            },
            {
                &quot;id&quot;: 4,
                &quot;name&quot;: &quot;Iste&quot;,
                &quot;slug&quot;: &quot;iste&quot;,
                &quot;description&quot;: &quot;Omnis optio rerum accusamus pariatur dolorem provident alias quia reprehenderit dignissimos.&quot;,
                &quot;parent_id&quot;: null,
                &quot;image_url&quot;: &quot;https://via.placeholder.com/400x400.png/00ff22?text=categories+accusantium&quot;,
                &quot;status&quot;: &quot;active&quot;,
                &quot;created_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
                &quot;level&quot;: 0,
                &quot;sort_order&quot;: 0,
                &quot;icon&quot;: null,
                &quot;deleted_at&quot;: null
            },
            {
                &quot;id&quot;: 5,
                &quot;name&quot;: &quot;Molestias&quot;,
                &quot;slug&quot;: &quot;molestias&quot;,
                &quot;description&quot;: &quot;Omnis architecto non officia assumenda quis tenetur accusamus quo.&quot;,
                &quot;parent_id&quot;: null,
                &quot;image_url&quot;: &quot;https://via.placeholder.com/400x400.png/00ff88?text=categories+et&quot;,
                &quot;status&quot;: &quot;active&quot;,
                &quot;created_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
                &quot;level&quot;: 0,
                &quot;sort_order&quot;: 0,
                &quot;icon&quot;: null,
                &quot;deleted_at&quot;: null
            }
        ],
        &quot;brands&quot;: [
            {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Lehner-Lehner&quot;,
                &quot;slug&quot;: &quot;lehner-lehner&quot;,
                &quot;description&quot;: &quot;Velit id pariatur voluptas commodi voluptatibus aut.&quot;,
                &quot;logo_url&quot;: &quot;https://via.placeholder.com/200x200.png/008833?text=brands+incidunt&quot;,
                &quot;website&quot;: &quot;http://steuber.com/&quot;,
                &quot;status&quot;: &quot;active&quot;,
                &quot;created_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
                &quot;sort_order&quot;: 0,
                &quot;deleted_at&quot;: null
            },
            {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Blanda Inc&quot;,
                &quot;slug&quot;: &quot;blanda-inc&quot;,
                &quot;description&quot;: &quot;Totam inventore esse ipsum repellat et sapiente quod maiores.&quot;,
                &quot;logo_url&quot;: &quot;https://via.placeholder.com/200x200.png/001155?text=brands+voluptatem&quot;,
                &quot;website&quot;: &quot;http://corkery.com/et-tenetur-omnis-iste-optio.html&quot;,
                &quot;status&quot;: &quot;active&quot;,
                &quot;created_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
                &quot;sort_order&quot;: 0,
                &quot;deleted_at&quot;: null
            },
            {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Halvorson-Effertz&quot;,
                &quot;slug&quot;: &quot;halvorson-effertz&quot;,
                &quot;description&quot;: &quot;Quis doloribus deleniti maxime quia modi dolorum earum sapiente.&quot;,
                &quot;logo_url&quot;: &quot;https://via.placeholder.com/200x200.png/005588?text=brands+magnam&quot;,
                &quot;website&quot;: &quot;https://becker.org/recusandae-provident-sit-numquam-ut-similique-sunt-unde.html&quot;,
                &quot;status&quot;: &quot;active&quot;,
                &quot;created_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
                &quot;sort_order&quot;: 0,
                &quot;deleted_at&quot;: null
            },
            {
                &quot;id&quot;: 4,
                &quot;name&quot;: &quot;Cruickshank, Von and Schaden&quot;,
                &quot;slug&quot;: &quot;cruickshank-von-and-schaden&quot;,
                &quot;description&quot;: &quot;Esse repudiandae repudiandae eum laudantium molestias ullam consequatur a perferendis in.&quot;,
                &quot;logo_url&quot;: &quot;https://via.placeholder.com/200x200.png/006677?text=brands+officiis&quot;,
                &quot;website&quot;: &quot;http://franecki.biz/&quot;,
                &quot;status&quot;: &quot;active&quot;,
                &quot;created_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
                &quot;sort_order&quot;: 0,
                &quot;deleted_at&quot;: null
            },
            {
                &quot;id&quot;: 5,
                &quot;name&quot;: &quot;Feeney-Langosh&quot;,
                &quot;slug&quot;: &quot;feeney-langosh&quot;,
                &quot;description&quot;: &quot;Repellendus aut et quo vel ut hic praesentium quos eveniet.&quot;,
                &quot;logo_url&quot;: &quot;https://via.placeholder.com/200x200.png/007700?text=brands+omnis&quot;,
                &quot;website&quot;: &quot;http://www.lockman.org/voluptatum-aliquid-hic-et-quasi-eaque-voluptate.html&quot;,
                &quot;status&quot;: &quot;active&quot;,
                &quot;created_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
                &quot;sort_order&quot;: 0,
                &quot;deleted_at&quot;: null
            }
        ]
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETv1-products-form-data" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETv1-products-form-data"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETv1-products-form-data"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETv1-products-form-data" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETv1-products-form-data">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETv1-products-form-data" data-method="GET"
      data-path="v1/products/form/data"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETv1-products-form-data', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETv1-products-form-data"
                    onclick="tryItOut('GETv1-products-form-data');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETv1-products-form-data"
                    onclick="cancelTryOut('GETv1-products-form-data');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETv1-products-form-data"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>v1/products/form/data</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETv1-products-form-data"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETv1-products-form-data"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="products-GETv1-products--product_id-">Get product details.</h2>

<p>
</p>



<span id="example-requests-GETv1-products--product_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/v1/products/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/products/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETv1-products--product_id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;sku&quot;: &quot;SKU-371VA&quot;,
        &quot;name&quot;: &quot;quas id&quot;,
        &quot;description&quot;: &quot;Earum doloremque suscipit modi ea voluptas voluptate deserunt reiciendis hic.&quot;,
        &quot;category_id&quot;: 3,
        &quot;brand_id&quot;: 3,
        &quot;price&quot;: &quot;427.73&quot;,
        &quot;discount_price&quot;: &quot;100.94&quot;,
        &quot;stock&quot;: 25,
        &quot;image_url&quot;: &quot;https://via.placeholder.com/400x400.png/00bb22?text=products+nihil&quot;,
        &quot;rating&quot;: &quot;3.00&quot;,
        &quot;created_at&quot;: &quot;2025-12-25T13:00:11.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-12-25T13:00:11.000000Z&quot;,
        &quot;slug&quot;: &quot;quas-id-6638&quot;,
        &quot;short_description&quot;: null,
        &quot;cost_price&quot;: null,
        &quot;discount_percentage&quot;: null,
        &quot;low_stock_threshold&quot;: 10,
        &quot;stock_status&quot;: &quot;in_stock&quot;,
        &quot;weight&quot;: null,
        &quot;dimensions&quot;: null,
        &quot;reviews_count&quot;: 0,
        &quot;views_count&quot;: 0,
        &quot;sold_count&quot;: 0,
        &quot;is_featured&quot;: false,
        &quot;meta_title&quot;: null,
        &quot;meta_description&quot;: null,
        &quot;status&quot;: &quot;active&quot;,
        &quot;deleted_at&quot;: null,
        &quot;category&quot;: {
            &quot;id&quot;: 3,
            &quot;name&quot;: &quot;Nam&quot;,
            &quot;slug&quot;: &quot;nam&quot;,
            &quot;description&quot;: &quot;Officiis ut expedita nihil impedit necessitatibus qui.&quot;,
            &quot;parent_id&quot;: null,
            &quot;image_url&quot;: &quot;https://via.placeholder.com/400x400.png/006600?text=categories+modi&quot;,
            &quot;status&quot;: &quot;active&quot;,
            &quot;created_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
            &quot;level&quot;: 0,
            &quot;sort_order&quot;: 0,
            &quot;icon&quot;: null,
            &quot;deleted_at&quot;: null
        },
        &quot;brand&quot;: {
            &quot;id&quot;: 3,
            &quot;name&quot;: &quot;Halvorson-Effertz&quot;,
            &quot;slug&quot;: &quot;halvorson-effertz&quot;,
            &quot;description&quot;: &quot;Quis doloribus deleniti maxime quia modi dolorum earum sapiente.&quot;,
            &quot;logo_url&quot;: &quot;https://via.placeholder.com/200x200.png/005588?text=brands+magnam&quot;,
            &quot;website&quot;: &quot;https://becker.org/recusandae-provident-sit-numquam-ut-similique-sunt-unde.html&quot;,
            &quot;status&quot;: &quot;active&quot;,
            &quot;created_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-25T13:00:10.000000Z&quot;,
            &quot;sort_order&quot;: 0,
            &quot;deleted_at&quot;: null
        }
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETv1-products--product_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETv1-products--product_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETv1-products--product_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETv1-products--product_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETv1-products--product_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETv1-products--product_id-" data-method="GET"
      data-path="v1/products/{product_id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETv1-products--product_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETv1-products--product_id-"
                    onclick="tryItOut('GETv1-products--product_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETv1-products--product_id-"
                    onclick="cancelTryOut('GETv1-products--product_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETv1-products--product_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>v1/products/{product_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETv1-products--product_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETv1-products--product_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>product_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="product_id"                data-endpoint="GETv1-products--product_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the product. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="products-GETv1-admin-products">Get all products.</h2>

<p>
</p>



<span id="example-requests-GETv1-admin-products">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/v1/admin/products" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/admin/products"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETv1-admin-products">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETv1-admin-products" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETv1-admin-products"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETv1-admin-products"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETv1-admin-products" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETv1-admin-products">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETv1-admin-products" data-method="GET"
      data-path="v1/admin/products"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETv1-admin-products', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETv1-admin-products"
                    onclick="tryItOut('GETv1-admin-products');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETv1-admin-products"
                    onclick="cancelTryOut('GETv1-admin-products');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETv1-admin-products"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>v1/admin/products</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETv1-admin-products"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETv1-admin-products"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="products-GETv1-admin-products-form-data">Get form data (categories and brands).</h2>

<p>
</p>



<span id="example-requests-GETv1-admin-products-form-data">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/v1/admin/products/form/data" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/admin/products/form/data"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETv1-admin-products-form-data">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETv1-admin-products-form-data" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETv1-admin-products-form-data"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETv1-admin-products-form-data"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETv1-admin-products-form-data" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETv1-admin-products-form-data">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETv1-admin-products-form-data" data-method="GET"
      data-path="v1/admin/products/form/data"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETv1-admin-products-form-data', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETv1-admin-products-form-data"
                    onclick="tryItOut('GETv1-admin-products-form-data');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETv1-admin-products-form-data"
                    onclick="cancelTryOut('GETv1-admin-products-form-data');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETv1-admin-products-form-data"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>v1/admin/products/form/data</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETv1-admin-products-form-data"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETv1-admin-products-form-data"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="products-GETv1-admin-products--product_id-">Get product details.</h2>

<p>
</p>



<span id="example-requests-GETv1-admin-products--product_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/v1/admin/products/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/admin/products/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETv1-admin-products--product_id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETv1-admin-products--product_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETv1-admin-products--product_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETv1-admin-products--product_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETv1-admin-products--product_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETv1-admin-products--product_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETv1-admin-products--product_id-" data-method="GET"
      data-path="v1/admin/products/{product_id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETv1-admin-products--product_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETv1-admin-products--product_id-"
                    onclick="tryItOut('GETv1-admin-products--product_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETv1-admin-products--product_id-"
                    onclick="cancelTryOut('GETv1-admin-products--product_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETv1-admin-products--product_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>v1/admin/products/{product_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETv1-admin-products--product_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETv1-admin-products--product_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>product_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="product_id"                data-endpoint="GETv1-admin-products--product_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the product. Example: <code>1</code></p>
            </div>
                    </form>

                <h1 id="profile">Profile</h1>

    

                                <h2 id="profile-GETv1-profile">Get authenticated user profile.</h2>

<p>
</p>



<span id="example-requests-GETv1-profile">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/v1/profile" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/profile"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETv1-profile">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETv1-profile" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETv1-profile"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETv1-profile"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETv1-profile" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETv1-profile">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETv1-profile" data-method="GET"
      data-path="v1/profile"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETv1-profile', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETv1-profile"
                    onclick="tryItOut('GETv1-profile');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETv1-profile"
                    onclick="cancelTryOut('GETv1-profile');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETv1-profile"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>v1/profile</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETv1-profile"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETv1-profile"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="profile-PUTv1-profile">Update authenticated user profile.</h2>

<p>
</p>



<span id="example-requests-PUTv1-profile">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/v1/profile" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"first_name\": \"b\",
    \"last_name\": \"n\",
    \"email\": \"ashly64@example.com\",
    \"phone\": \"vdljnikhwaykcmyu\",
    \"gender\": \"female\",
    \"birthday\": \"2022-01-23\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/profile"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "first_name": "b",
    "last_name": "n",
    "email": "ashly64@example.com",
    "phone": "vdljnikhwaykcmyu",
    "gender": "female",
    "birthday": "2022-01-23"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTv1-profile">
</span>
<span id="execution-results-PUTv1-profile" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTv1-profile"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTv1-profile"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTv1-profile" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTv1-profile">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTv1-profile" data-method="PUT"
      data-path="v1/profile"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTv1-profile', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTv1-profile"
                    onclick="tryItOut('PUTv1-profile');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTv1-profile"
                    onclick="cancelTryOut('PUTv1-profile');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTv1-profile"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>v1/profile</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTv1-profile"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTv1-profile"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>first_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="first_name"                data-endpoint="PUTv1-profile"
               value="b"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>b</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>last_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="last_name"                data-endpoint="PUTv1-profile"
               value="n"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>n</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="PUTv1-profile"
               value="ashly64@example.com"
               data-component="body">
    <br>
<p>Must be a valid email address. Example: <code>ashly64@example.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>phone</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="phone"                data-endpoint="PUTv1-profile"
               value="vdljnikhwaykcmyu"
               data-component="body">
    <br>
<p>Must not be greater than 20 characters. Example: <code>vdljnikhwaykcmyu</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>gender</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="gender"                data-endpoint="PUTv1-profile"
               value="female"
               data-component="body">
    <br>
<p>Example: <code>female</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>male</code></li> <li><code>female</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>birthday</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="birthday"                data-endpoint="PUTv1-profile"
               value="2022-01-23"
               data-component="body">
    <br>
<p>Must be a valid date. Must be a date before <code>today</code>. Example: <code>2022-01-23</code></p>
        </div>
        </form>

                <h1 id="reviews">Reviews</h1>

    

                                <h2 id="reviews-GETv1-products--product_id--reviews">Get product reviews.</h2>

<p>
</p>



<span id="example-requests-GETv1-products--product_id--reviews">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/v1/products/1/reviews" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/products/1/reviews"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETv1-products--product_id--reviews">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;data&quot;: [],
    &quot;meta&quot;: {
        &quot;current_page&quot;: 1,
        &quot;last_page&quot;: 1,
        &quot;per_page&quot;: 10,
        &quot;total&quot;: 0
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETv1-products--product_id--reviews" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETv1-products--product_id--reviews"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETv1-products--product_id--reviews"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETv1-products--product_id--reviews" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETv1-products--product_id--reviews">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETv1-products--product_id--reviews" data-method="GET"
      data-path="v1/products/{product_id}/reviews"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETv1-products--product_id--reviews', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETv1-products--product_id--reviews"
                    onclick="tryItOut('GETv1-products--product_id--reviews');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETv1-products--product_id--reviews"
                    onclick="cancelTryOut('GETv1-products--product_id--reviews');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETv1-products--product_id--reviews"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>v1/products/{product_id}/reviews</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETv1-products--product_id--reviews"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETv1-products--product_id--reviews"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>product_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="product_id"                data-endpoint="GETv1-products--product_id--reviews"
               value="1"
               data-component="url">
    <br>
<p>The ID of the product. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="reviews-POSTv1-reviews">Create a review.</h2>

<p>
</p>



<span id="example-requests-POSTv1-reviews">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/v1/reviews" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "product_id=16"\
    --form "order_id=16"\
    --form "rating=2"\
    --form "title=g"\
    --form "comment=z"\
    --form "images[]=@/tmp/phppni83alt369kfe3NKSx" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/reviews"
);

const headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('product_id', '16');
body.append('order_id', '16');
body.append('rating', '2');
body.append('title', 'g');
body.append('comment', 'z');
body.append('images[]', document.querySelector('input[name="images[]"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTv1-reviews">
</span>
<span id="execution-results-POSTv1-reviews" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTv1-reviews"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTv1-reviews"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTv1-reviews" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTv1-reviews">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTv1-reviews" data-method="POST"
      data-path="v1/reviews"
      data-authed="0"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTv1-reviews', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTv1-reviews"
                    onclick="tryItOut('POSTv1-reviews');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTv1-reviews"
                    onclick="cancelTryOut('POSTv1-reviews');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTv1-reviews"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>v1/reviews</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTv1-reviews"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTv1-reviews"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>product_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="product_id"                data-endpoint="POSTv1-reviews"
               value="16"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the products table. Example: <code>16</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>order_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="order_id"                data-endpoint="POSTv1-reviews"
               value="16"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the orders table. Example: <code>16</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>rating</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="rating"                data-endpoint="POSTv1-reviews"
               value="2"
               data-component="body">
    <br>
<p>Must be at least 1. Must not be greater than 5. Example: <code>2</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>title</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="title"                data-endpoint="POSTv1-reviews"
               value="g"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>g</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>comment</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="comment"                data-endpoint="POSTv1-reviews"
               value="z"
               data-component="body">
    <br>
<p>Must not be greater than 2000 characters. Example: <code>z</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>images</code></b>&nbsp;&nbsp;
<small>file[]</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="images[0]"                data-endpoint="POSTv1-reviews"
               data-component="body">
        <input type="file" style="display: none"
               name="images[1]"                data-endpoint="POSTv1-reviews"
               data-component="body">
    <br>
<p>Must be an image. Must not be greater than 2048 kilobytes.</p>
        </div>
        </form>

                    <h2 id="reviews-PUTv1-reviews--review_id-">Update review.</h2>

<p>
</p>



<span id="example-requests-PUTv1-reviews--review_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/v1/reviews/16" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "rating=1"\
    --form "title=n"\
    --form "comment=g"\
    --form "images[]=@/tmp/phpa5kmhg4uddtc4wtNCqm" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/reviews/16"
);

const headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('rating', '1');
body.append('title', 'n');
body.append('comment', 'g');
body.append('images[]', document.querySelector('input[name="images[]"]').files[0]);

fetch(url, {
    method: "PUT",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTv1-reviews--review_id-">
</span>
<span id="execution-results-PUTv1-reviews--review_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTv1-reviews--review_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTv1-reviews--review_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTv1-reviews--review_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTv1-reviews--review_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTv1-reviews--review_id-" data-method="PUT"
      data-path="v1/reviews/{review_id}"
      data-authed="0"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTv1-reviews--review_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTv1-reviews--review_id-"
                    onclick="tryItOut('PUTv1-reviews--review_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTv1-reviews--review_id-"
                    onclick="cancelTryOut('PUTv1-reviews--review_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTv1-reviews--review_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>v1/reviews/{review_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTv1-reviews--review_id-"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTv1-reviews--review_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>review_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="review_id"                data-endpoint="PUTv1-reviews--review_id-"
               value="16"
               data-component="url">
    <br>
<p>The ID of the review. Example: <code>16</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>rating</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="rating"                data-endpoint="PUTv1-reviews--review_id-"
               value="1"
               data-component="body">
    <br>
<p>Must be at least 1. Must not be greater than 5. Example: <code>1</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>title</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="title"                data-endpoint="PUTv1-reviews--review_id-"
               value="n"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>n</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>comment</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="comment"                data-endpoint="PUTv1-reviews--review_id-"
               value="g"
               data-component="body">
    <br>
<p>Must not be greater than 2000 characters. Example: <code>g</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>images</code></b>&nbsp;&nbsp;
<small>file[]</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="images[0]"                data-endpoint="PUTv1-reviews--review_id-"
               data-component="body">
        <input type="file" style="display: none"
               name="images[1]"                data-endpoint="PUTv1-reviews--review_id-"
               data-component="body">
    <br>
<p>Must be an image. Must not be greater than 2048 kilobytes.</p>
        </div>
        </form>

                    <h2 id="reviews-DELETEv1-reviews--review_id-">Delete review.</h2>

<p>
</p>



<span id="example-requests-DELETEv1-reviews--review_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/v1/reviews/16" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/reviews/16"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEv1-reviews--review_id-">
</span>
<span id="execution-results-DELETEv1-reviews--review_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEv1-reviews--review_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEv1-reviews--review_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEv1-reviews--review_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEv1-reviews--review_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEv1-reviews--review_id-" data-method="DELETE"
      data-path="v1/reviews/{review_id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEv1-reviews--review_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEv1-reviews--review_id-"
                    onclick="tryItOut('DELETEv1-reviews--review_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEv1-reviews--review_id-"
                    onclick="cancelTryOut('DELETEv1-reviews--review_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEv1-reviews--review_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>v1/reviews/{review_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEv1-reviews--review_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEv1-reviews--review_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>review_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="review_id"                data-endpoint="DELETEv1-reviews--review_id-"
               value="16"
               data-component="url">
    <br>
<p>The ID of the review. Example: <code>16</code></p>
            </div>
                    </form>

                    <h2 id="reviews-POSTv1-reviews--review_id--helpful">Mark review as helpful.</h2>

<p>
</p>



<span id="example-requests-POSTv1-reviews--review_id--helpful">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/v1/reviews/16/helpful" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/reviews/16/helpful"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTv1-reviews--review_id--helpful">
</span>
<span id="execution-results-POSTv1-reviews--review_id--helpful" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTv1-reviews--review_id--helpful"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTv1-reviews--review_id--helpful"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTv1-reviews--review_id--helpful" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTv1-reviews--review_id--helpful">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTv1-reviews--review_id--helpful" data-method="POST"
      data-path="v1/reviews/{review_id}/helpful"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTv1-reviews--review_id--helpful', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTv1-reviews--review_id--helpful"
                    onclick="tryItOut('POSTv1-reviews--review_id--helpful');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTv1-reviews--review_id--helpful"
                    onclick="cancelTryOut('POSTv1-reviews--review_id--helpful');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTv1-reviews--review_id--helpful"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>v1/reviews/{review_id}/helpful</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTv1-reviews--review_id--helpful"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTv1-reviews--review_id--helpful"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>review_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="review_id"                data-endpoint="POSTv1-reviews--review_id--helpful"
               value="16"
               data-component="url">
    <br>
<p>The ID of the review. Example: <code>16</code></p>
            </div>
                    </form>

                <h1 id="shipping-methods">Shipping Methods</h1>

    

                                <h2 id="shipping-methods-GETv1-shipping-methods">Get active shipping methods (Public).</h2>

<p>
</p>



<span id="example-requests-GETv1-shipping-methods">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/v1/shipping-methods" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/shipping-methods"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETv1-shipping-methods">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;data&quot;: []
}</code>
 </pre>
    </span>
<span id="execution-results-GETv1-shipping-methods" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETv1-shipping-methods"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETv1-shipping-methods"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETv1-shipping-methods" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETv1-shipping-methods">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETv1-shipping-methods" data-method="GET"
      data-path="v1/shipping-methods"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETv1-shipping-methods', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETv1-shipping-methods"
                    onclick="tryItOut('GETv1-shipping-methods');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETv1-shipping-methods"
                    onclick="cancelTryOut('GETv1-shipping-methods');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETv1-shipping-methods"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>v1/shipping-methods</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETv1-shipping-methods"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETv1-shipping-methods"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                <h1 id="wishlist">Wishlist</h1>

    

                                <h2 id="wishlist-GETv1-wishlist">Get user&#039;s wishlist.</h2>

<p>
</p>



<span id="example-requests-GETv1-wishlist">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/v1/wishlist" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/wishlist"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETv1-wishlist">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETv1-wishlist" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETv1-wishlist"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETv1-wishlist"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETv1-wishlist" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETv1-wishlist">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETv1-wishlist" data-method="GET"
      data-path="v1/wishlist"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETv1-wishlist', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETv1-wishlist"
                    onclick="tryItOut('GETv1-wishlist');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETv1-wishlist"
                    onclick="cancelTryOut('GETv1-wishlist');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETv1-wishlist"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>v1/wishlist</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETv1-wishlist"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETv1-wishlist"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="wishlist-POSTv1-wishlist">Add product to wishlist.</h2>

<p>
</p>



<span id="example-requests-POSTv1-wishlist">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/v1/wishlist" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"product_id\": 16
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/wishlist"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "product_id": 16
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTv1-wishlist">
</span>
<span id="execution-results-POSTv1-wishlist" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTv1-wishlist"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTv1-wishlist"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTv1-wishlist" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTv1-wishlist">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTv1-wishlist" data-method="POST"
      data-path="v1/wishlist"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTv1-wishlist', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTv1-wishlist"
                    onclick="tryItOut('POSTv1-wishlist');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTv1-wishlist"
                    onclick="cancelTryOut('POSTv1-wishlist');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTv1-wishlist"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>v1/wishlist</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTv1-wishlist"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTv1-wishlist"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>product_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="product_id"                data-endpoint="POSTv1-wishlist"
               value="16"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the products table. Example: <code>16</code></p>
        </div>
        </form>

                    <h2 id="wishlist-DELETEv1-wishlist--wishlist-">Remove product from wishlist.</h2>

<p>
</p>



<span id="example-requests-DELETEv1-wishlist--wishlist-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/v1/wishlist/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/wishlist/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEv1-wishlist--wishlist-">
</span>
<span id="execution-results-DELETEv1-wishlist--wishlist-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEv1-wishlist--wishlist-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEv1-wishlist--wishlist-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEv1-wishlist--wishlist-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEv1-wishlist--wishlist-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEv1-wishlist--wishlist-" data-method="DELETE"
      data-path="v1/wishlist/{wishlist}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEv1-wishlist--wishlist-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEv1-wishlist--wishlist-"
                    onclick="tryItOut('DELETEv1-wishlist--wishlist-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEv1-wishlist--wishlist-"
                    onclick="cancelTryOut('DELETEv1-wishlist--wishlist-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEv1-wishlist--wishlist-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>v1/wishlist/{wishlist}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEv1-wishlist--wishlist-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEv1-wishlist--wishlist-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>wishlist</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="wishlist"                data-endpoint="DELETEv1-wishlist--wishlist-"
               value="architecto"
               data-component="url">
    <br>
<p>The wishlist. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="wishlist-GETv1-wishlist-check--product-">Check if product is in wishlist.</h2>

<p>
</p>



<span id="example-requests-GETv1-wishlist-check--product-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/v1/wishlist/check/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/v1/wishlist/check/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETv1-wishlist-check--product-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETv1-wishlist-check--product-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETv1-wishlist-check--product-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETv1-wishlist-check--product-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETv1-wishlist-check--product-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETv1-wishlist-check--product-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETv1-wishlist-check--product-" data-method="GET"
      data-path="v1/wishlist/check/{product}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETv1-wishlist-check--product-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETv1-wishlist-check--product-"
                    onclick="tryItOut('GETv1-wishlist-check--product-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETv1-wishlist-check--product-"
                    onclick="cancelTryOut('GETv1-wishlist-check--product-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETv1-wishlist-check--product-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>v1/wishlist/check/{product}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETv1-wishlist-check--product-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETv1-wishlist-check--product-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>product</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="product"                data-endpoint="GETv1-wishlist-check--product-"
               value="architecto"
               data-component="url">
    <br>
<p>Example: <code>architecto</code></p>
            </div>
                    </form>

            

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                            </div>
            </div>
</div>
</body>
</html>
