<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'image',
        'course_status_id'
    ];

    protected static function booted()
    {
        static::creating(function (Course $course) {
        do {
            $code = strtoupper(Str::random(6));
        } while (self::where('access_code', $code)->exists());
            $course->access_code = $code;
        });
    }

    public function status()
    {
        return $this->belongsTo(Course_status::class, 'course_status_id');
    }

    public function modules()
    {
        return $this->hasMany(Module::class);
    }

}
