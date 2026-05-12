<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ContentFile extends Model
{
    protected $fillable = [
        'content_id', 
        'original_name', 
        'stored_name', 
        'path', 
        'mime_type', 
        'size', 
        'order'
    ];

    public function content()
    {
        return $this->belongsTo(Content::class);
    }

}
