<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Subject extends Model
{
    /** @use HasFactory<\Database\Factories\SubjectFactory> */
    use HasFactory;

    protected $fillable = ['name'];

    public function studyProfiles(): BelongsToMany
    {
        return $this->belongsToMany(StudyProfile::class, 'subject_study_profile');
    }
}

