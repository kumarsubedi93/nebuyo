<?php
echo '<?xml version="1.0" encoding="utf-8" ?>';
/*echo '<?xml-stylesheet type="text/xsl" href="/sitemap.xsl"?>';*/
echo '<?xml-stylesheet type="text/xsl" href="/public/main-sitemap.xsl"?>';
?>

<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:n="http://www.google.com/schemas/sitemap-news/0.9">
    <?php
    foreach ($pages as $row){
    ?>

    <url>
        <loc>{{ $row->url }}</loc>
        <lastmod>{{ $row->lastmod }}</lastmod>
    </url>

    <?php } ?>
</urlset>
