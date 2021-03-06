<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StripIntentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }

    public function __invoke(Request $request)
    {
        return [
            'data' => [
                'client_secret' => $request->user()->createSetupIntent()->client_secret,
            ]
        ];
    }
}
