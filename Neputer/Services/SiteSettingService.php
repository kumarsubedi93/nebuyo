<?php

namespace Neputer\Services;

use App\Models\SiteSetting;
use Foundation\Lib\Cache;
use Illuminate\Support\Arr;

class SiteSettingService
{
    /**
     * @var SiteSetting
     */
    protected $siteSetting;

    public function __construct(SiteSetting $siteSetting)
    {
        $this->siteSetting = $siteSetting;
    }

    public function updateOrCreate($request)
    {
       $setting = Arr::get($request, 'site_setting');

        if(Arr::has($setting,'default_image')){
            $setting['default_image'] = $setting['default_image']->store('uploads/site_setting/default_image');
        }

       foreach ($setting as $key => $value) {
           $this->siteSetting->updateOrCreate(
               ['key' => $key],
               ['value' => $value]
           );
       }
       Cache::clear();
    }

    public function getSiteSetting()
    {
       return $this->siteSetting->pluck('value', 'key');
    }
}