<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'image',
        'access_code',
        'course_status_id'
    ];

    public function status()
    {
        return $this->belongsTo(Course_status::class, 'course_status_id');
    }

    public function modules()
    {
        return $this->hasMany(Module::class);
    }


}
