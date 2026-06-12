<?php

namespace App\Models;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'path'
    ];

    public function article() : BelongsTo{
        return $this->belongsTo(Article::class);
    }

public function getUrl($w = null, $h = null)
{
    if (!$w && !$h) {
        return Storage::url($this->path);
    }

    $path = dirname($this->path);
    $filename = basename($this->path);

    $file = ($path === '.' ? '' : $path . '/')
        . "crop_{$w}x{$h}_{$filename}";

    if (Storage::disk('public')->exists($file)) {
        return Storage::url($file);
    }

    return Storage::url($this->path);
}
}
