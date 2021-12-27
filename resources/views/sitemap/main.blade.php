<?php
echo '<?xml version="1.0" encoding="utf-8" ?>';
/*echo '<?xml-stylesheet type="text/xsl" href="/sitemapindex.xsl"?>';*/
echo '<?xml-stylesheet type="text/xsl" href="/public/main-sitemap.xsl"?>';
?>

<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @if (isset($pages))
        @foreach($pages as $page)
            <sitemap>
                <loc>{{ $page->url }}</loc>
                <lastmod>{{ $page->lastmod }}</lastmod>
            </sitemap>
        @endforeach
    @endif
</sitemapindex>
