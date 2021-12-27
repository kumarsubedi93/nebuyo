<?php


Route::group(['prefix' => 'new'], function () {
    Route::get('/', 'NewHomeController@index')->name('new.home');

    Route::post('/user/login/', 'NewHomeController@user_login')->name('new.user.login');
    Route::post('/users/login/cart', 'NewHomeController@cart_login')->name('new.cart.login.submit');

    Route::get('/categories', 'NewHomeController@all_categories')->name('new.categories.all');
    Route::get('/categories/{category}', 'NewHomeController@firstCategory')->name('new.categories.first');
    Route::get('/categories/{category}/{subCategory}', 'NewHomeController@secondCategory')->name('new.categories.second');
    Route::get('/categories/{category}/{subCategory}/{subSubCategory}', 'NewHomeController@productList')->name('new.categories.product_list');
    Route::get('/shops/visit/{slug}', 'NewHomeController@shop')->name('new.shop.visit');
//    Route::get('/shops/visit/{slug}/{type}', 'NewHomeController@filter_shop')->name('shop.visit.type');

    Route::get('/cart', 'NewCartController@index')->name('new.cart');
    Route::post('/cart/addtocart', 'NewCartController@addToCart')->name('new.cart.addToCart');
    Route::post('/cart/removeFromCart', 'NewCartController@removeFromCart')->name('new.cart.removeFromCart');
    Route::post('/cart/show-cart-modal', 'NewCartController@showCartModal')->name('new.cart.showCartModal');
    Route::post('/cart/updateQuantity', 'NewCartController@updateQuantity')->name('new.cart.updateQuantity');
    Route::post('/cart/nav-cart-items', 'NewCartController@updateNavCart')->name('new.cart.nav_cart');

    //Checkout Routes
    Route::group(['middleware' => ['checkout']], function () {
        Route::get('/checkout', 'NewCheckoutController@get_shipping_info')->name('new.checkout.shipping_info');
        Route::any('/checkout/delivery_info', 'NewCheckoutController@store_shipping_info')->name('new.checkout.store_shipping_infostore');
        Route::post('/checkout/payment_select', 'NewCheckoutController@store_delivery_info')->name('new.checkout.store_delivery_info');
        Route::get('/checkout/order-confirmed', 'NewCheckoutController@order_confirmed')->name('new.order_confirmed');
        Route::post('/checkout/payment', 'NewCheckoutController@checkout')->name('new.payment.checkout');


    });

    Route::post('/wishlists/remove', 'NewWishlistController@remove')->name('new.wishlists.remove');

    Route::get('/product/{slug}', 'NewHomeController@product')->name('new.product');
    Route::post('/product/variant_price', 'NewHomeController@variant_price')->name('new.products.variant_price');

    Route::get('/terms', 'NewHomeController@terms')->name('new.terms');

    Route::get('/track_your_order', 'NewHomeController@trackOrder')->name('new.orders.track');

    Route::get('/compare', 'NewCompareController@index')->name('new.compare');

    Route::get('/customer-product', 'NewCustomerProductController@customer_products_listing')->name('new.customer.products');
    Route::get('/customer-product/{slug}', 'NewCustomerProductController@customer_product')->name('new.customer.product');
    Route::post('/ajax-customer-search', 'NewCustomerProductController@ajax_search')->name('new.customer_search.ajax');
    Route::post('/ajax-customer-search/loadMore', 'NewCustomerProductController@ajax_search_load_more')->name('new.customer_search.ajax.loadMore');

    Route::get('/shop-grid', 'NewHomeController@shopGrid')->name('new.shop.grid');

    Route::get('/search', 'NewHomeController@search')->name('new.search');
    Route::get('/search-category', 'NewHomeController@categorySearch')->name('new.search.category');
    Route::get('/search?q={search}', 'NewHomeController@search')->name('new.suggestion.search');
    Route::post('/ajax-search', 'NewHomeController@ajax_search')->name('new.search.ajax');
    Route::post('/ajax_home_search', 'NewHomeController@ajax_home_search')->name('search.ajax.home');
    Route::post('/ajax-search/loadMore', 'NewHomeController@ajax_search_load_more')->name('new.search.ajax.loadMore');

    Route::post('/home/section/best_selling', 'NewHomeController@load_best_selling_section')->name('new.home.section.best_selling');


    Route::get('/search?category={category_slug}', 'NewHomeController@search')->name('new.products.category');
    Route::get('/search?subcategory={subcategory_slug}', 'NewHomeController@search')->name('new.products.subcategory');
    Route::get('/search?subsubcategory={subsubcategory_slug}', 'NewHomeController@search')->name('new.products.subsubcategory');
    Route::get('/search?brand={brand_slug}', 'NewHomeController@search')->name('new.products.brand');

    // Route for dynamic sitemap
    Route::get('sitemap', [
        'as' => 'new.sitemap.index',
        'uses' => 'NewHomeController@mainSiteMap'
    ]);
    Route::get('page', [
        'as' => 'new.sitemap.page',
        'uses' => 'NewHomeController@pageSiteMap'
    ]);
    Route::get('category', [
        'as' => 'new.sitemap.category',
        'uses' => 'NewHomeController@categorySiteMap'
    ]);
    Route::get('products/{product_slug}', [
        'as' => 'new.sitemap.product',
        'uses' => 'NewHomeController@productSiteMap'
    ]);

});


//Home Page
Route::group(['namespace' => 'Site'], function () {
    Route::get('/', 'HomeController@index')->name('site.home.index');
    Route::get('category/{slug}', 'HomeController@category')->name('site.home.category');
    Route::get('product-details/{slug}', 'HomeController@productDetails')->name('site.home.product-details');
});


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// use App\Mail\SupportMailManager;
//demo
Route::get('/demo/cron_1', 'DemoController@cron_1');
Route::get('/demo/cron_2', 'DemoController@cron_2');


Auth::routes(['verify' => true]);

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/email/resend', 'Auth\VerificationController@resend')->name('verification.resend');
Route::get('/verification-confirmation/{code}', 'Auth\VerificationController@verification_confirmation')->name('email.verification.confirmation');
Route::get('/email_change/callback', 'HomeController@email_change_callback')->name('email_change.callback');


Route::post('/language', 'LanguageController@changeLanguage')->name('language.change');
Route::post('/currency', 'CurrencyController@changeCurrency')->name('currency.change');

Route::get('/social-login/redirect/{provider}', 'Auth\LoginController@redirectToProvider')->name('social.login');
Route::get('/social-login/{provider}/callback', 'Auth\LoginController@handleProviderCallback')->name('social.callback');
Route::get('/users/login', 'HomeController@login')->name('user.login');
Route::get('/users/registration', 'HomeController@registration')->name('user.registration');


Route::post('/users/login/cart', 'HomeController@cart_login')->name('cart.login.submit');

Route::post('/subcategories/get_subcategories_by_category', 'SubCategoryController@get_subcategories_by_category')->name('subcategories.get_subcategories_by_category');
Route::post('/subsubcategories/get_subsubcategories_by_subcategory', 'SubSubCategoryController@get_subsubcategories_by_subcategory')->name('subsubcategories.get_subsubcategories_by_subcategory');
Route::post('/subsubcategories/get_brands_by_subsubcategory', 'SubSubCategoryController@get_brands_by_subsubcategory')->name('subsubcategories.get_brands_by_subsubcategory');
Route::post('/subsubcategories/get_attributes_by_subsubcategory', 'SubSubCategoryController@get_attributes_by_subsubcategory')->name('subsubcategories.get_attributes_by_subsubcategory');


Route::get('/old-home', 'HomeController@index')->name('home');
Route::post('/home/section/featured', 'HomeController@load_featured_section')->name('home.section.featured');
Route::post('/home/section/best_selling', 'HomeController@load_best_selling_section')->name('home.section.best_selling');
Route::post('/home/section/home_categories', 'HomeController@load_home_categories_section')->name('home.section.home_categories');
Route::post('/home/section/best_sellers', 'HomeController@load_best_sellers_section')->name('home.section.best_sellers');
//category dropdown menu ajax call
Route::post('/category/nav-element-list', 'HomeController@get_category_items')->name('category.elements');

//Flash Deal Details Page
Route::get('/flash-deal/{slug}', 'HomeController@flash_deal_details')->name('flash-deal-details');

//Route::get('/sitemap.xml', function(){
//	return base_path('sitemap.xml');
//});

Route::get('/customer-products', 'CustomerProductController@customer_products_listing')->name('customer.products');
Route::get('/customer-products?subsubcategory={subsubcategory_slug}', 'CustomerProductController@search')->name('customer_products.subsubcategory');
Route::get('/customer-products?subcategory={subcategory_slug}', 'CustomerProductController@search')->name('customer_products.subcategory');
Route::get('/customer-products?category={category_slug}', 'CustomerProductController@search')->name('customer_products.category');
Route::get('/customer-products?city={city_id}', 'CustomerProductController@search')->name('customer_products.city');
Route::get('/customer-products?q={search}', 'CustomerProductController@search')->name('customer_products.search');
Route::get('/customer-product/{slug}', 'CustomerProductController@customer_product')->name('customer.product');
Route::get('/customer-packages', 'HomeController@premium_package_index')->name('customer_packages_list_show');


Route::get('/product/{slug}', 'HomeController@product')->name('product');
Route::get('/products', 'HomeController@listing')->name('products');
Route::get('/search?category={category_slug}', 'HomeController@search')->name('products.category');
Route::get('/search?subcategory={subcategory_slug}', 'HomeController@search')->name('products.subcategory');
Route::get('/search?subsubcategory={subsubcategory_slug}', 'HomeController@search')->name('products.subsubcategory');
Route::get('/search?brand={brand_slug}', 'HomeController@search')->name('products.brand');
Route::post('/product/variant_price', 'HomeController@variant_price')->name('products.variant_price');
Route::get('/shops/visit/{slug}', 'HomeController@shop')->name('shop.visit');
Route::get('/shops/visit/{slug}/{type}', 'HomeController@filter_shop')->name('shop.visit.type');

Route::get('/cart', 'CartController@index')->name('cart');
Route::post('/cart/nav-cart-items', 'CartController@updateNavCart')->name('cart.nav_cart');
Route::post('/cart/show-cart-modal', 'CartController@showCartModal')->name('cart.showCartModal');
Route::post('/cart/addtocart', 'CartController@addToCart')->name('cart.addToCart');
Route::post('/cart/removeFromCart', 'CartController@removeFromCart')->name('cart.removeFromCart');
Route::post('/cart/updateQuantity', 'CartController@updateQuantity')->name('cart.updateQuantity');

//Checkout Routes
Route::group(['middleware' => ['checkout']], function () {
    Route::get('/checkout', 'CheckoutController@get_shipping_info')->name('checkout.shipping_info');
    Route::any('/checkout/delivery_info', 'CheckoutController@store_shipping_info')->name('checkout.store_shipping_infostore');
    Route::post('/checkout/payment_select', 'CheckoutController@store_delivery_info')->name('checkout.store_delivery_info');
});

Route::get('/checkout/order-confirmed', 'CheckoutController@order_confirmed')->name('order_confirmed');
Route::post('/checkout/payment', 'CheckoutController@checkout')->name('payment.checkout');
Route::post('/get_pick_ip_points', 'HomeController@get_pick_ip_points')->name('shipping_info.get_pick_ip_points');
Route::get('/checkout/payment_select', 'CheckoutController@get_payment_info')->name('checkout.payment_info');
Route::post('/checkout/apply_coupon_code', 'CheckoutController@apply_coupon_code')->name('checkout.apply_coupon_code');
Route::post('/checkout/remove_coupon_code', 'CheckoutController@remove_coupon_code')->name('checkout.remove_coupon_code');

//Paypal START
Route::get('/paypal/payment/done', 'PaypalController@getDone')->name('payment.done');
Route::get('/paypal/payment/cancel', 'PaypalController@getCancel')->name('payment.cancel');
//Paypal END

// SSLCOMMERZ Start
Route::get('/sslcommerz/pay', 'PublicSslCommerzPaymentController@index');
Route::POST('/sslcommerz/success', 'PublicSslCommerzPaymentController@success');
Route::POST('/sslcommerz/fail', 'PublicSslCommerzPaymentController@fail');
Route::POST('/sslcommerz/cancel', 'PublicSslCommerzPaymentController@cancel');
Route::POST('/sslcommerz/ipn', 'PublicSslCommerzPaymentController@ipn');
//SSLCOMMERZ END

//Stipe Start
Route::get('stripe', 'StripePaymentController@stripe');
Route::post('stripe', 'StripePaymentController@stripePost')->name('stripe.post');
//Stripe END

Route::get('/compare', 'CompareController@index')->name('compare');
Route::get('/compare/reset', 'CompareController@reset')->name('compare.reset');
Route::post('/compare/addToCompare', 'CompareController@addToCompare')->name('compare.addToCompare');

Route::resource('subscribers', 'SubscriberController');

Route::get('/brands', 'HomeController@all_brands')->name('brands.all');
Route::get('/categories', 'HomeController@all_categories')->name('categories.all');
//Route::get('/categories', 'NewHomeController@all_categories')->name('categories.all');

Route::get('/search', 'HomeController@search')->name('search');
Route::get('/search?q={search}', 'HomeController@search')->name('suggestion.search');
Route::post('/ajax-search', 'HomeController@ajax_search')->name('search.ajax');
Route::post('/config_content', 'HomeController@product_content')->name('configs.update_status');

Route::get('/sellerpolicy', 'HomeController@sellerpolicy')->name('sellerpolicy');
Route::get('/returnpolicy', 'HomeController@returnpolicy')->name('returnpolicy');
Route::get('/supportpolicy', 'HomeController@supportpolicy')->name('supportpolicy');
Route::get('/terms', 'HomeController@terms')->name('terms');
Route::get('/privacypolicy', 'HomeController@privacypolicy')->name('privacypolicy');

Route::group(['middleware' => ['user', 'verified', 'unbanned']], function () {

    Route::group(['prefix' => 'new', 'as' => 'new.'], function () {
        Route::get('/dashboard', 'NewHomeController@dashboard')->name('dashboard');
        Route::get('/profile', 'NewHomeController@profile')->name('profile');
        Route::post('/customer/update-profile', 'NewHomeController@customer_update_profile')->name('customer.profile.update');
        Route::post('/seller/update-profile', 'NewHomeController@seller_update_profile')->name('seller.profile.update');

        Route::resource('support-ticket', 'NewSupportTicketController');
        Route::post('support-ticket/reply', 'NewSupportTicketController@seller_store')->name('support-ticket.seller_store');
        Route::resource('purchase-history', 'NewPurchaseHistoryController');
        Route::resource('customer-products', 'NewCustomerProductController');
        Route::get('/customer-products/destroy/{id}', 'NewCustomerProductController@destroy')->name('customer-products.destroy');
        Route::get('/customer-packages', 'NewHomeController@premium_package_index')->name('customer_packages_list_show');
        Route::get('/sellers/products/upload', 'NewHomeController@show_product_upload_form')->name('seller.products.upload');
        Route::get('/sellers/products', 'NewHomeController@seller_product_list')->name('seller.products');
        Route::get('/sellers/products/{id}/edit', 'NewHomeController@show_product_edit_form')->name('seller.products.edit');
        Route::get('/products/destroy/{id}', 'NewProductController@destroy')->name('products.destroy');
        Route::get('/products/duplicate/{id}', 'NewProductController@duplicate')->name('products.duplicate');
        Route::post('/products/update/{id}', 'NewProductController@update')->name('products.update');
        Route::post('/products/store/', 'NewProductController@store')->name('products.store');
        Route::post('/products/featured', 'NewProductController@updateFeatured')->name('products.featured');
        Route::post('/products/published', 'NewProductController@updatePublished')->name('products.published');
        Route::get('/reviews', 'NewReviewController@seller_reviews')->name('reviews.seller');

        Route::post('/products/todays_deal', 'NewProductController@updateTodaysDeal')->name('products.todays_deal');

        /*Order Details*/
        Route::post('/orders/details', 'NewOrderController@order_details')->name('orders.details');

        Route::resource('digital-products', 'NewDigitalProductController');
        Route::get('/digital-products/destroy/{id}', 'NewDigitalProductController@destroy')->name('digital-products.destroy');
        Route::get('/digital-products/download/{id}', 'DigitalProductController@download')->name('digital-products.download');
        Route::get('/digital-products/listing', 'NewHomeController@seller_digital_product_list')->name('seller.digitalproducts');

        /* NewShopController*/
        Route::resource('shops', 'NewShopController');
        Route::resource('orders', 'NewOrderController');
        Route::resource('wishlists', 'NewWishlistController');
        Route::resource('payments', 'NewPaymentController');

        Route::get('/product-bulk-upload/index', 'NewProductBulkUploadController@index')->name('product_bulk_upload.index');
        Route::post('/bulk-product-upload', 'NewProductBulkUploadController@bulk_upload')->name('bulk_product_upload');
        Route::get('/product-csv-download/{type}', 'NewProductBulkUploadController@import_product')->name('product_csv.download');
        Route::get('/vendor-product-csv-download/{id}', 'NewProductBulkUploadController@import_vendor_product')->name('import_vendor_product.download');
        Route::group(['prefix' => 'bulk-upload/download'], function () {
            Route::get('/category', 'NewProductBulkUploadController@pdf_download_category')->name('pdf.download_category');
            Route::get('/sub_category', 'NewProductBulkUploadController@pdf_download_sub_category')->name('pdf.download_sub_category');
            Route::get('/sub_sub_category', 'NewProductBulkUploadController@pdf_download_sub_sub_category')->name('pdf.download_sub_sub_category');
            Route::get('/brand', 'NewProductBulkUploadController@pdf_download_brand')->name('pdf.download_brand');
            Route::get('/seller', 'NewProductBulkUploadController@pdf_download_seller')->name('pdf.download_seller');
        });

        /* Withdraw Request*/
        Route::resource('/withdraw_requests', 'NewSellerWithdrawRequestController');
        Route::get('/withdraw_requests_all', 'NewSellerWithdrawRequestController@request_index')->name('withdraw_requests_all');
        Route::post('/withdraw_request/payment_modal', 'NewSellerWithdrawRequestController@payment_modal')->name('withdraw_request.payment_modal');
        Route::post('/withdraw_request/message_modal', 'NewSellerWithdrawRequestController@message_modal')->name('withdraw_request.message_modal');

        /* Downloads */
        Route::get('digital_purchase_history', 'NewPurchaseHistoryController@digital_index')->name('digital_purchase_history.index');
        Route::get('/digitalproducts/edit/{id}', 'HomeController@seller_digital_product_list')->name('seller.digitalproducts.edit');
        Route::resource('digitalproducts', 'NewDigitalProductController');
        Route::get('/digitalproducts/destroy/{id}', 'NewDigitalProductController@destroy')->name('digitalproducts.destroy');
        Route::get('/digitalproducts/download/{id}', 'NewDigitalProductController@download')->name('digitalproducts.download');
        Route::get('/digitalproducts/listing', 'HomeController@seller_digital_product_list')->name('seller.digitalproducts.upload');
    });

    Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
    Route::get('/profile', 'HomeController@profile')->name('profile');
    Route::post('/new-user-verification', 'HomeController@new_verify')->name('user.new.verify');
    Route::post('/new-user-email', 'HomeController@update_email')->name('user.change.email');
    Route::post('/customer/update-profile', 'HomeController@customer_update_profile')->name('customer.profile.update');
    Route::post('/seller/update-profile', 'HomeController@seller_update_profile')->name('seller.profile.update');

    Route::resource('purchase_history', 'PurchaseHistoryController');
    Route::post('/purchase_history/details', 'PurchaseHistoryController@purchase_history_details')->name('purchase_history.details');
    Route::get('/purchase_history/destroy/{id}', 'PurchaseHistoryController@destroy')->name('purchase_history.destroy');

    Route::resource('wishlists', 'WishlistController');
    Route::post('/wishlists/remove', 'WishlistController@remove')->name('wishlists.remove');

    Route::get('/wallet', 'WalletController@index')->name('wallet.index');
    Route::post('/recharge', 'WalletController@recharge')->name('wallet.recharge');

    Route::resource('support_ticket', 'SupportTicketController');
    Route::post('support_ticket/reply', 'SupportTicketController@seller_store')->name('support_ticket.seller_store');

    Route::post('/customer_packages/purchase', 'CustomerPackageController@purchase_package')->name('customer_packages.purchase');
    Route::resource('customer_products', 'CustomerProductController');
    Route::post('/customer_products/published', 'CustomerProductController@updatePublished')->name('customer_products.published');
    Route::post('/customer_products/status', 'CustomerProductController@updateStatus')->name('customer_products.update.status');

    Route::get('digital_purchase_history', 'PurchaseHistoryController@digital_index')->name('digital_purchase_history.index');
});

Route::get('/customer_products/destroy/{id}', 'CustomerProductController@destroy')->name('customer_products.destroy');

Route::group(['prefix' => 'seller', 'middleware' => ['seller', 'verified', 'user']], function () {
    Route::get('/products', 'HomeController@seller_product_list')->name('seller.products');
    Route::get('/product/upload', 'HomeController@show_product_upload_form')->name('seller.products.upload');
    Route::get('/product/{id}/edit', 'HomeController@show_product_edit_form')->name('seller.products.edit');
    Route::resource('payments', 'PaymentController');

    Route::get('/shop/apply_for_verification', 'ShopController@verify_form')->name('shop.verify');
    Route::post('/shop/apply_for_verification', 'ShopController@verify_form_store')->name('shop.verify.store');

    Route::get('/reviews', 'ReviewController@seller_reviews')->name('reviews.seller');

    //digital Product
    Route::get('/digital-products', 'HomeController@seller_digital_product_list')->name('seller.digitalproducts');
    Route::get('/digital-products/upload', 'HomeController@show_digital_product_upload_form')->name('seller.digital-products.upload');
    Route::get('/digital-products/{id}/edit', 'HomeController@show_digital_product_edit_form')->name('seller.digital-products.edit');
});

Route::group(['middleware' => ['auth']], function () {
    Route::post('/products/store/', 'ProductController@store')->name('products.store');
    Route::post('/products/update/{id}', 'ProductController@update')->name('products.update');
    Route::get('/products/destroy/{id}', 'ProductController@destroy')->name('products.destroy');
    Route::get('/products/duplicate/{id}', 'ProductController@duplicate')->name('products.duplicate');
    Route::post('/products/sku_combination', 'ProductController@sku_combination')->name('products.sku_combination');
    Route::post('/products/sku_combination_edit', 'ProductController@sku_combination_edit')->name('products.sku_combination_edit');
    Route::post('/products/featured', 'ProductController@updateFeatured')->name('products.featured');
    Route::post('/products/published', 'ProductController@updatePublished')->name('products.published');

    Route::get('invoice/customer/{order_id}', 'InvoiceController@customer_invoice_download')->name('customer.invoice.download');
    Route::get('invoice/seller/{order_id}', 'InvoiceController@seller_invoice_download')->name('seller.invoice.download');

    Route::resource('orders', 'OrderController');
    Route::get('/orders/destroy/{id}', 'OrderController@destroy')->name('orders.destroy');
    Route::post('/orders/details', 'OrderController@order_details')->name('orders.details');
    Route::post('/orders/update_delivery_status', 'OrderController@update_delivery_status')->name('orders.update_delivery_status');
    Route::post('/orders/update_payment_status', 'OrderController@update_payment_status')->name('orders.update_payment_status');

    Route::resource('/reviews', 'ReviewController');

    Route::resource('/withdraw_requests', 'SellerWithdrawRequestController');
    Route::get('/withdraw_requests_all', 'SellerWithdrawRequestController@request_index')->name('withdraw_requests_all');
    Route::post('/withdraw_request/payment_modal', 'SellerWithdrawRequestController@payment_modal')->name('withdraw_request.payment_modal');
    Route::post('/withdraw_request/message_modal', 'SellerWithdrawRequestController@message_modal')->name('withdraw_request.message_modal');

    Route::resource('conversations', 'ConversationController');
    Route::get('/conversations/destroy/{id}', 'ConversationController@destroy')->name('conversations.destroy');
    Route::post('conversations/refresh', 'ConversationController@refresh')->name('conversations.refresh');
    Route::resource('messages', 'MessageController');

    //Product Bulk Upload
    Route::get('/product-bulk-upload/index', 'ProductBulkUploadController@index')->name('product_bulk_upload.index');
    Route::post('/bulk-product-upload', 'ProductBulkUploadController@bulk_upload')->name('bulk_product_upload');
    Route::get('/product-csv-download/{type}', 'ProductBulkUploadController@import_product')->name('product_csv.download');
    Route::get('/vendor-product-csv-download/{id}', 'ProductBulkUploadController@import_vendor_product')->name('import_vendor_product.download');
    Route::group(['prefix' => 'bulk-upload/download'], function () {
        Route::get('/category', 'ProductBulkUploadController@pdf_download_category')->name('pdf.download_category');
        Route::get('/sub_category', 'ProductBulkUploadController@pdf_download_sub_category')->name('pdf.download_sub_category');
        Route::get('/sub_sub_category', 'ProductBulkUploadController@pdf_download_sub_sub_category')->name('pdf.download_sub_sub_category');
        Route::get('/brand', 'ProductBulkUploadController@pdf_download_brand')->name('pdf.download_brand');
        Route::get('/seller', 'ProductBulkUploadController@pdf_download_seller')->name('pdf.download_seller');
    });

    //Product Export
    Route::get('/product-bulk-export', 'ProductBulkUploadController@export')->name('product_bulk_export.index');

    Route::get('/digitalproducts/edit/{id}', 'HomeController@seller_digital_product_list')->name('seller.digitalproducts.edit');
    Route::resource('digitalproducts', 'DigitalProductController');
    Route::get('/digitalproducts/destroy/{id}', 'DigitalProductController@destroy')->name('digitalproducts.destroy');
    Route::get('/digitalproducts/download/{id}', 'DigitalProductController@download')->name('digitalproducts.download');
    Route::get('/digitalproducts/listing', 'HomeController@seller_digital_product_list')->name('seller.digitalproducts.upload');

});

Route::resource('shops', 'ShopController');
Route::get('/track_your_order', 'HomeController@trackOrder')->name('orders.track');
//Route::get('/track_your_order', 'NewHomeController@trackOrder')->name('orders.track');
Route::get('/instamojo/payment/pay-success', 'InstamojoController@success')->name('instamojo.success');

Route::post('rozer/payment/pay-success', 'RazorpayController@payment')->name('payment.rozer');

Route::get('/paystack/payment/callback', 'PaystackController@handleGatewayCallback');

Route::get('/vogue-pay', 'VoguePayController@showForm');
Route::get('/vogue-pay/success/{id}', 'VoguePayController@paymentSuccess');
Route::get('/vogue-pay/failure/{id}', 'VoguePayController@paymentFailure');

//2checkout Start
Route::post('twocheckout/payment/callback', 'TwoCheckoutController@twocheckoutPost')->name('twocheckout.post');
//2checkout END

Route::resource('addresses', 'AddressController');
Route::get('/addresses/destroy/{address}', 'AddressController@destroy')->name('addresses.destroy');
Route::get('/addresses/set_default/{id}', 'AddressController@set_default')->name('addresses.set_default');

//payhere below
Route::get('/payhere/checkout/testing', 'PayhereController@checkout_testing')->name('payhere.checkout.testing');
Route::get('/payhere/wallet/testing', 'PayhereController@wallet_testing')->name('payhere.checkout.testing');
Route::get('/payhere/customer_package/testing', 'PayhereController@customer_package_testing')->name('payhere.customer_package.testing');

Route::any('/payhere/checkout/notify', 'PayhereController@checkout_notify')->name('payhere.checkout.notify');
Route::any('/payhere/checkout/return', 'PayhereController@checkout_return')->name('payhere.checkout.return');
Route::any('/payhere/checkout/cancel', 'PayhereController@chekout_cancel')->name('payhere.checkout.cancel');

Route::any('/payhere/wallet/notify', 'PayhereController@wallet_notify')->name('payhere.wallet.notify');
Route::any('/payhere/wallet/return', 'PayhereController@wallet_return')->name('payhere.wallet.return');
Route::any('/payhere/wallet/cancel', 'PayhereController@wallet_cancel')->name('payhere.wallet.cancel');

Route::any('/payhere/seller_package_payment/notify', 'PayhereController@seller_package_notify')->name('payhere.seller_package_payment.notify');
Route::any('/payhere/seller_package_payment/return', 'PayhereController@seller_package_payment_return')->name('payhere.seller_package_payment.return');
Route::any('/payhere/seller_package_payment/cancel', 'PayhereController@seller_package_payment_cancel')->name('payhere.seller_package_payment.cancel');

Route::any('/payhere/customer_package_payment/notify', 'PayhereController@customer_package_notify')->name('payhere.customer_package_payment.notify');
Route::any('/payhere/customer_package_payment/return', 'PayhereController@customer_package_return')->name('payhere.customer_package_payment.return');
Route::any('/payhere/customer_package_payment/cancel', 'PayhereController@customer_package_cancel')->name('payhere.customer_package_payment.cancel');

//N-genius
Route::any('ngenius/cart_payment_callback', 'NgeniusController@cart_payment_callback')->name('ngenius.cart_payment_callback');
Route::any('ngenius/wallet_payment_callback', 'NgeniusController@wallet_payment_callback')->name('ngenius.wallet_payment_callback');
Route::any('ngenius/customer_package_payment_callback', 'NgeniusController@customer_package_payment_callback')->name('ngenius.customer_package_payment_callback');
Route::any('ngenius/seller_package_payment_callback', 'NgeniusController@seller_package_payment_callback')->name('ngenius.seller_package_payment_callback');

//Custom page
Route::get('/{slug}', 'PageController@show_custom_page')->name('custom-pages.show_custom_page');
