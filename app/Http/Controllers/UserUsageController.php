<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserUsageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function __invoke(Request $request)
    {
        return [
            'data' => [
                'usage' => $request->user()->usage(),
            ]
        ];
    }
}
