<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\studyprofile;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudyprofileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->count(60)->has(studyprofile::factory())->create();
        User::factory()->has(studyprofile::factory())->create(['name' => 'Atmin','email' => 'atmin67@example.com',]);
    }
}
