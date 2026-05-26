<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubmissionFile extends Model
{
    protected $fillable = ['original_name', 'stored_name', 'path', 'mime_type', 'size', 'order'];

    public function submission()
    {
        return $this->belongsTo(Submission::class);
    }
}
