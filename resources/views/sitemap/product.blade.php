<?php
echo '<?xml version="1.0" encoding="utf-8" ?>';
echo '<?xml-stylesheet type="text/xsl" href="/public/main-sitemap.xsl"?>';
?>

<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:n="http://www.google.com/schemas/sitemap-news/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
    <?php
    foreach ($pages as $row){
    if(is_null($row->slug)){
        $link = route('new.home');
    }
    else{
        $link = route('new.product', $row->slug);
    }
    ?>
    <url>
        <loc>{{ $link }}</loc>
        <lastmod>{{ $row->lastmod }}</lastmod>
    </url>

    <?php } ?>
</urlset>
