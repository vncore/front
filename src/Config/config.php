<?php
return [        
    // Config for front
    'front' => [
        'middleware' => [
            1 => 'localization',
            1 => 'check.domain',
        ],
        'route' => [
            //Prefix member, as domain.com/customer/login
            'VNCORE_PREFIX_MEMBER' => env('VNCORE_PREFIX_MEMBER', 'customer'), 
    
            //Prefix lange on url, as domain.com/en/abc.html
            //If value is empty, it will not be displayed, as dommain.com/abc.html
            'VNCORE_SEO_LANG' => env('VNCORE_SEO_LANG', 0),
        ],
    ],
];
