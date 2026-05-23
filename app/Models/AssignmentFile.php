<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssignmentFile extends Model
{
    protected $fillable = ['original_name', 'stored_name', 'path', 'mime_type', 'size', 'order'];

    protected $casts = [
        'due_date' => 'date',
    ];

    public function assignment()
    {
        return $this->belongsTo(Assignment::class);
    }
}
