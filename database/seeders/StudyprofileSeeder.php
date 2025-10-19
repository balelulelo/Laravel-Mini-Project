<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\StudyProfile;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudyProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->count(60)->has(StudyProfile::factory())->create();
        User::factory()->has(StudyProfile::factory())->create(['name' => 'Atmin','email' => 'atmin67@example.com',]);
    }
}
