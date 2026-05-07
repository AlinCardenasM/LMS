<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssignmentFile extends Model
{
     protected $fillable = ['title', 'description', 'due_date', 'max_score', 'module_id'];

    protected $casts = [
        'due_date' => 'date',
    ];

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function files()
    {
        return $this->hasMany(AssignmentFile::class);
    }
}
