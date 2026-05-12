<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'module_id'
    ];

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function files()
    {
        return $this->hasMany(ContentFile::class);
    }
}
