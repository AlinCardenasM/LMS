<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    use HasFactory;

    protected $fillable =[
        'file',
        'comment',
        'status',
        'assignment_id',
        'user_id',
    ];

    protected $casts = [
        'status' => 'string',
    ];

    /**
     * Relación: cada entrega pertenece a un Assignment
     */
    public function assignment()
    {
        return $this->belongsTo(Assignment::class);
    }

    /**
     * Relación: cada entrega pertenece a un Usuario
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relación: cada entrega puede tener una calificación
     */
    public function grade()
    {
        return $this->hasOne(Grade::class);
    }
}
