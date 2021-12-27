<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->composerLayoutFile();
        $this->callBusinessSettingForLayout();
        view()->composer([
            'newui.layouts.footer',
        ], function ($view) {
            $view->with('asset_path', '/public/newui/');
        });
    }

    public function composerLayoutFile()
    {
        view()->composer([
            'newui.layouts.header',
            'newui.home.banner_section',
        ], 'App\Http\Composers\LayoutComposer@composerGlobal');
    }

    public function callBusinessSettingForLayout()
    {
        view()->composer('newui.*', 'App\Http\Composers\LayoutComposer@businessSettingsForLayout');
    }
}
