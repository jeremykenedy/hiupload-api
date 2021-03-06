<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Seeder;

class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plans = config('plans.tiers');
        $uniqueKeyOne = 'name';
        $uniqueKeyTwo = 'slug';
        $model = new Plan();

        foreach ($plans as $plan) {
            if ($plan['enabled']) {
                $model::updateOrCreate([
                    $uniqueKeyOne => $plan[$uniqueKeyOne],
                    $uniqueKeyTwo => $plan[$uniqueKeyTwo]
                ], [
                    'name'      => $plan['name'],
                    'slug'      => $plan['slug'],
                    'price'     => $plan['price'],
                    'buyable'   => $plan['buyable'],
                    'stripe_id' => $plan['stripe_id'],
                    'storage'   => $plan['storage'],
                ]);
            }
        }
    }
}
