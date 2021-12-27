<?php

namespace Neputer\Traits;

use Carbon\Carbon;
use Illuminate\Support\Collection;

trait SiteMap
{
    /**
     * If true, and $modified_date_column for the data passed is
     * null then the date from the $date_mapper_fallback_column will be used
     * as last modified date
     * @var bool
     */
    protected $need_last_modified_date_processing = true;
    /**
     * if $need_last_modified_date_processing has true value then
     * it should have fallback column for date
     * If in case last modified date do not exist it should fall back
     * to created date column value ie. $date_mapper_fallback_column column
     * @var string
     */
    protected $date_mapper_fallback_column = 'postdate';
    /**
     * Column from where last modified date is to be taken
     * @var string
     */
    protected $modified_date_column = 'last_modified_date';

    /**
     * @param Collection $pages
     * @param null $view Xml View to be rendered
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     * @throws \Exception Execute if view path isn't passed or invalid view path is passed
     */
    protected function getSiteMap(Collection $pages, $view = null)
    {
        if (!$view && !view()->exists($view))
            throw new \Exception('View path missing or invalid view path.');

        $posts = $this->validateLastModifiedDate($pages);
        $pages = $this->changeLastModifiedDateFormat($posts);
        $pages = $this->setFrequencyForPage($pages);
        $pages = $this->setPriorityForPage($pages);
        $pages = $pages->sortBy($this->modified_date_column, 0, true);
        return response(view($view, compact('pages')), 200, ['Content-Type' => 'text/xml']);
    }

    /**
     * Checks if passed data contains last modified date or need to set post date
     * in case last modified date field is null
     *
     * @param Collection $pages
     * @return Collection
     * @throws \Exception Execute in case required columns for last modified date or post date do not exist
     */
    protected function validateLastModifiedDate(Collection $pages)
    {
        if ($this->need_last_modified_date_processing)
            foreach ($pages as $page) {
                if ($this->needToMakeLastModifiedDate($page))
                    $this->setLastModifiedDate($page);
            }
        return $pages;
    }

    /**
     * Validate row if has last modified date column
     *
     * @param $page
     * @return bool
     * @throws \Exception Executed if any row has no column for last modifed date
     */
    protected function needToMakeLastModifiedDate($page)
    {
        if (!property_exists($page, $this->modified_date_column))
            throw new \Exception('Last modified date property does not exit.');

        if ($page->{$this->modified_date_column})
            return false;

        return true;
    }

    /**
     * Assign post date to last modified date
     *
     * @param $page
     * @throws \Exception Execute if in case $page do not have property for post date
     */
    protected function setLastModifiedDate($page)
    {
        if (!property_exists($page, $this->date_mapper_fallback_column))
            throw new \Exception('Post date property does not exit.');

        $page->{$this->modified_date_column} = $page->{$this->date_mapper_fallback_column};
    }

    /**
     * Set the appropriate date format supporting for sitemap date
     *
     * @param Collection $pages
     * @return Collection
     */
    protected function changeLastModifiedDateFormat(Collection $pages)
    {
        foreach ($pages as $page) {

            $c_date = Carbon::parse($page->{$this->modified_date_column});
            $c_date->setTimezone('UTC');

            $page->lastmod = $c_date->format('Y-m-d') . 'T' . $c_date->format('H:i:s') . 'Z';

        }

        return $pages;
    }

    /**
     * Add property for update frequency
     *
     * @param Collection $pages
     * @return Collection
     */
    protected function setFrequencyForPage(Collection $pages)
    {
        foreach ($pages as $page) {

            $c_date = new Carbon($page->{$this->modified_date_column});
            $now = Carbon::now();
            $day_difference = $c_date->diff($now)->days;
            $page->day_difference = $day_difference;

            // < 12 hrs always
            // < 24 hourly
            // < 7 daily

            if ($day_difference < 1) {
                $page->changefreq = 'hourly';
            } elseif ($day_difference == 1) {
                $page->changefreq = 'daily';
            } elseif ($day_difference < 7) {
                $page->changefreq = 'weekly';
            } elseif ($day_difference < 31) {
                $page->changefreq = 'weekly';
            } elseif ($day_difference < 365) {
                $page->changefreq = 'monthly';
            } else {
                $page->changefreq = 'yearly';
            }

        }

        return $pages;
    }

    protected function setPriorityForPage(Collection $pages)
    {
        foreach ($pages as $page) {

            if ($page->day_difference < 1)
                $page->priority = '1.0';
            elseif ($page->day_difference < 3)
                $page->priority = '1.0';
            elseif ($page->day_difference < 7)
                $page->priority = '0.9';
            elseif ($page->day_difference < 15)
                $page->priority = '0.9';
            elseif ($page->day_difference < 31)
                $page->priority = '0.8';
            elseif ($page->day_difference < 60)
                $page->priority = '0.7';
            elseif ($page->day_difference < 90)
                $page->priority = '0.6';
            elseif ($page->day_difference < 120)
                $page->priority = '0.5';
            elseif ($page->day_difference < 150)
                $page->priority = '0.4';
            elseif ($page->day_difference < 180)
                $page->priority = '0.3';
            elseif ($page->day_difference < 210)
                $page->priority = '0.2';
            elseif ($page->day_difference < 240)
                $page->priority = '0.1';
            else
                $page->priority = '0.1';
        }

        return $pages;
    }

}
