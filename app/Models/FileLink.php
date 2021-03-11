<?php

namespace App\Models;

use App\Models\File;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileLink extends Model
{
    use HasFactory;

    protected $fillable = [
        'token',
    ];

    public function file()
    {
        return $this->belongsTo(File::class);
    }
}
