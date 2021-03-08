<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }

    public function store(Request $request)
    {
        // TODO :: validate

        $plan = Plan::whereSlug($request->get('plan', 'medium'))->first();

        $request->user()->newSubscription('default', $plan->stripe_id)->create($request->token);
    }

    public function update(Request $request)
    {
        // TODO :: validate

        $plan = Plan::whereSlug($request->plan)->first();

        if (!$plan->buyable) {
            $request->user()->subscription('default')->cancel();

            return;
        }

        $request->user()->subscription('default')->swap($plan->stripe_id);
    }
}
