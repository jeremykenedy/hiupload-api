<?php

namespace App\Models;

use App\Models\FileLink;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class File extends Model
{
    use HasFactory;

    public static function booted()
    {
        static::creating(function($file) {
            $file->uuid = Str::uuid();
        });

        static::deleted(function($file) {
            Storage::disk('s3')->delete($file->path);
        });
    }

    protected $fillable = [
        'name',
        'size',
        'path',
    ];

    public function link()
    {
        return $this->hasOne(FileLink::class);
    }
}
