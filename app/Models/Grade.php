<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $fillable = [
        'score',
        'feedback',
        'submission_id',

    ];

    protected $casts = [
        'score' => 'decimal:2',
    ];

    /**
     * Relación: cada calificación pertenece a una entrega
     */
    public function submission()
    {
        return $this->belongsTo(Submission::class);
    }
}
