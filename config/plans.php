<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Plan Tiers to be seeded
    |--------------------------------------------------------------------------
     */
    'tiers' => [
        [
            'enabled'   => env('PLAN_TIER_ONE_ENABLED', true),
            'name'      => env('PLAN_TIER_ONE_NAME', 'Free'),
            'slug'      => env('PLAN_TIER_ONE_SLUG', 'free'),
            'price'     => env('PLAN_TIER_ONE_PRICE', 0),
            'buyable'   => env('PLAN_TIER_ONE_BUYABLE', 0),
            'stripe_id' => env('PLAN_TIER_ONE_STRIPE_ID', null),
            'storage'   => env('PLAN_TIER_ONE_STORAGE', 5000000),
        ],
        [
            'enabled'   => env('PLAN_TIER_TWO_ENABLED', false),
            'name'      => env('PLAN_TIER_TWO_NAME', 'Small'),
            'slug'      => env('PLAN_TIER_TWO_SLUG', 'small'),
            'price'     => env('PLAN_TIER_TWO_PRICE', 300),
            'buyable'   => env('PLAN_TIER_TWO_BUYABLE', 1),
            'stripe_id' => env('PLAN_TIER_TWO_STRIPE_ID', null),
            'storage'   => env('PLAN_TIER_TWO_STORAGE', 10000000),
        ],
        [
            'enabled'   => env('PLAN_TIER_THREE_ENABLED', false),
            'name'      => env('PLAN_TIER_THREE_NAME', 'Medium'),
            'slug'      => env('PLAN_TIER_THREE_SLUG', 'medium'),
            'price'     => env('PLAN_TIER_THREE_PRICE', 600),
            'buyable'   => env('PLAN_TIER_THREE_BUYABLE', 1),
            'stripe_id' => env('PLAN_TIER_THREE_STRIPE_ID', null),
            'storage'   => env('PLAN_TIER_THREE_STORAGE', 15000000),
        ],
        [
            'enabled'   => env('PLAN_TIER_FOUR_ENABLED', false),
            'name'      => env('PLAN_TIER_FOUR_NAME', 'Large'),
            'slug'      => env('PLAN_TIER_FOUR_SLUG', 'large'),
            'price'     => env('PLAN_TIER_FOUR_PRICE', 900),
            'buyable'   => env('PLAN_TIER_FOUR_BUYABLE', 1),
            'stripe_id' => env('PLAN_TIER_FOUR_STRIPE_ID', null),
            'storage'   => env('PLAN_TIER_FOUR_STORAGE', 20000000),
        ],
        [
            'enabled'   => env('PLAN_TIER_FIVE_ENABLED', false),
            'name'      => env('PLAN_TIER_FIVE_NAME', 'Huge'),
            'slug'      => env('PLAN_TIER_FIVE_SLUG', 'huge'),
            'price'     => env('PLAN_TIER_FIVE_PRICE', 1200),
            'buyable'   => env('PLAN_TIER_FIVE_BUYABLE', 1),
            'stripe_id' => env('PLAN_TIER_FIVE_STRIPE_ID', null),
            'storage'   => env('PLAN_TIER_FIVE_STORAGE', 25000000),
        ],
        [
            'enabled'   => env('PLAN_TIER_SIX_ENABLED', false),
            'name'      => env('PLAN_TIER_SIX_NAME', 'Jumbo'),
            'slug'      => env('PLAN_TIER_SIX_SLUG', 'jumbo'),
            'price'     => env('PLAN_TIER_SIX_PRICE', 1500),
            'buyable'   => env('PLAN_TIER_SIX_BUYABLE', 1),
            'stripe_id' => env('PLAN_TIER_SIX_STRIPE_ID', null),
            'storage'   => env('PLAN_TIER_SIX_STORAGE', 30000000),
        ],
    ],
];
