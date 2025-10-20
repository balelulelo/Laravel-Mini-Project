<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class StudyProfile extends Model
{
    /** @use HasFactory<\Database\Factories\StudyprofileFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'bio',
        'city',
        'major',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function subjects(): BelongsToMany
    {
        return $this->belongsToMany(Subject::class, 'subject_study_profile');
    }
}
