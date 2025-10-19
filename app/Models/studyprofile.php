<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudyProfile extends Model
{
    /** @use HasFactory<\Database\Factories\StudyprofileFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'bio',
        'city',
        'major',
        'study_interests',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
