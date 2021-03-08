<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;

class UserPlanAvailabilityController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }

    public function __invoke(Request $request)
    {
        return [
            'data' => Plan::get()->flatMap(function ($plan) use ($request) {
                return [
                    $plan->slug => $request->user()->canDowngradeToPlan($plan)
                ];
            })
        ];
    }
}
