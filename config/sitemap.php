<?php
$today = \Carbon\Carbon::now();
$last_modified_date = $today->subDays(20);

return [
    'sitemap' => [
        'main' => [
            [
                'name' => 'Page',
                'route' => 'new.sitemap.page',
                'last_modified_date' => $last_modified_date
            ],
            [
                'name' => 'Category',
                'route' => 'new.sitemap.category',
                'last_modified_date' => $today->subDays(5)
            ],
//            [
//                'name' => 'product',
//                'route' => 'new.sitemap.product',
//                'last_modified_date' => $today->subDays(5)
//            ],

        ],
        'pages' => [
            [
                'name' => 'Home Page',
                'route' => 'new.home',
                'last_modified_date' => $last_modified_date
            ],
            [
                'name' => 'Terms of use',
                'route' => 'new.terms',
                'last_modified_date' => $last_modified_date
            ],
        ],
    ],

];
