<?php

namespace App\Http\Controllers;

use App\Http\Resources\FileResource;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileDownloadController extends Controller
{
    public function show(Request $request, File $file)
    {
        $file = File::whereUuid($file->uuid)
            ->whereHas('link', function ($query) use ($request) {
                $query->where('token', $request->token);
            })
            ->firstOrFail();

        return (new FileResource($file))
            ->additional([
                'meta' => [
                    'url' => Storage::disk('s3')->temporaryUrl(
                        $file->path,
                        now()->addHours(2),
                        [
                            'ResponseContentType'           => 'application/octet-stream; charset=UTF-8',
                            'ResponseContentDisposition'    => 'attachment; filename=' . $file->name,
                        ]
                    ),
                ],
            ]);
    }
}
