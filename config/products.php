<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Product API Keys
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for products APIs such
    | as Open Food and more. This file provides the de facto
    | location for this type of information, allowing packages and services
    | to have a conventional file to locate the various APIs credentials.
    |
    */

    'OpenFoodFacts' => [
        'endpoint' => env('OPEN_FOOD_ENDPOINT')
    ]
];
