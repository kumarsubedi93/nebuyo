<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Neputer\Services\SiteSettingService;

class SiteSettingController extends Controller
{
    /**
     * @var SiteSettingService
     */
    protected $siteSettingService;

    /**
     * @param SiteSettingService $siteSettingService
     */
    public function __construct(SiteSettingService $siteSettingService)
    {
        $this->siteSettingService = $siteSettingService;
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $data = [];
        $data['setting'] = $this->siteSettingService->getSiteSetting();
        return view('frontend.other.index', compact('data'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $this->siteSettingService->updateOrCreate($request->except('_token'));
        flash(translate('Limit has been updated successfully'))->success();
        return redirect()->route('site-setting.index');
    }
}
