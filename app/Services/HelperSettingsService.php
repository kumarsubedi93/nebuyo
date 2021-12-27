<?php

namespace App\Services;

use App\BusinessSetting;
use App\Currency;
use App\FlashDeal;

class HelperSettingsService
{

    private $businessSettings;
    private $currencies;
    private $activeFlashDeals;
    private $generalSiteSetting;
    private $seoSetting;

    public function __construct()
    {
        $this->businessSettings = BusinessSetting::all();
        $this->currencies = Currency::all();
        $this->activeFlashDeals = FlashDeal::where('status', 1)->get();
        $this->seoSetting = \App\SeoSetting::first();
        $this->generalSiteSetting = \App\GeneralSetting::first();
    }

    public function getBusinessSettings()
    {
        return $this->businessSettings;
    }

    public function getAllSystemCurrencies()
    {
        return $this->currencies;
    }

    public function getActiveFlashDeals()
    {
        return $this->activeFlashDeals;
    }

    public function getSeoSettings()
    {
        return $this->seoSetting;
    }

    public function getGeneralSettings()
    {
        return $this->generalSiteSetting;
    }
}
