<?php


namespace App\Http\Composers;

use App\Models\Category;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;


class LayoutComposer
{
    public function composerGlobal($view)
    {
        $sidebarAllCategories = Cache::remember('sidebar_all_categories', 180, function () {
            return \App\Category::with(['subcategories'])
                ->where('menu_status', '1')
                ->orderby('order', 'asc')->get();
        });
        $view->with('parent_categories', $sidebarAllCategories);
    }

    public function businessSettingsForLayout($view)
    {
        $business_settings = Cache::remember('business_settings_', 120, function () {
            if (Schema::hasTable('business_settings')) {
                return \App\BusinessSetting::select('value', 'type')->whereIn('type', [
                    'paypal_payment',
                    'stripe_payment',
                    'sslcommerz_payment',
                    'instamojo_payment',
                    'razorpay',
                    'voguepay',
                    'paystack',
                    'payhere',
                    'cash_payment',
                    'offline_payment',

                    'system_default_currency',

                    // social media
                    'google_recaptcha',
                    'google_login',
                    'facebook_login',
                    'twitter_login',
                    'guest_checkout_active',

                ])
                    ->get()
                    ->pluck('value', 'type')
                    ->toArray();

            }
        });

        $view->with('business_settings', $business_settings);
    }
}