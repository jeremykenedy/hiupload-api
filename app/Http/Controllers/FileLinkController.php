<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FileLinkController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }

    public function store(Request $request, File $file)
    {
        $this->authorize('create-link', $file);

        $link = $file->link()->firstOrCreate([], [
            'token' =>  hash_hmac('sha256', Str::random(40), $file->uuid),
        ]);

        return [
            'data' => [
                'url' => config('app.client_url') . '/download/' . $file->uuid . '?token=' . $link->token,
            ],
        ];
    }
}
