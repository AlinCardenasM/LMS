<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'file',
        'due_date',
        'max_score',
        'module_id',
    ];

    public function module()
    {
        return $this->belongsTo(Module::class);
    }
}
