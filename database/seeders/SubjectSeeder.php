<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Subject;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subjects = ['Artificial Intelligence', 'Quantum Computing', 'Renewable Energy', 'Cybersecurity', 'Data Science', 'Machine Learning', 'Nervous System', 'Astrophysics', 
        'International Diplomacy', 'Graphic Design', 'Neuroscience', 'Genetics', 'Robotics', 'Environmental Science', 'Cognitive Psychology' ];


        foreach ($subjects as $subjectName) {
            Subject::factory()->create(['name' => $subjectName]);
        }
    }
}
