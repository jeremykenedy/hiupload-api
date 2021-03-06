<?php

namespace App\Http\Controllers;

use App\Http\Requests\FileSignedRequest;
use App\Http\Resources\FileResource;
use App\Models\File;
use Aws\S3\PostObjectV4;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }

    /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return FileResource::collection($request->user()->files);
    }

    /**
     * Create signed file upload request for filepond upload to s3.
     * @param  \Illuminate\Http\FileSignedRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function signed(FileSignedRequest $request)
    {
        $filename = md5($request->name . microtime()) . '.' . $request->extension;

        $object = new PostObjectV4(
            Storage::disk('s3')->getAdapter()->getClient(),
            config('filesystems.disks.s3.bucket'),
            ['key' => 'files/' . $filename],
            [
                ['bucket' => config('filesystems.disks.s3.bucket')],
                ['starts-with', '$key', 'files/']
            ]
        );

        return response()->json([
            'attributes'        => $object->getFormAttributes(),
            'additionalData'    => $object->getFormInputs(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->user()->files()->firstOrCreate($request->only('path'), $request->only('name', 'size'));

        return new FileResource($file);
    }

    /**
     * Remove the specified resource from storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, File $file)
    {
        $this->authorize('destroy', $file);

        $file->delete();
    }
}
