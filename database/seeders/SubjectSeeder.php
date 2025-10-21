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
        'International Diplomacy', 'Graphic Design', 'Neuroscience', 'Genetics', 'Robotics', 'Environmental Science', 'Cognitive Psychology', 'Algebra', 'Thermodynamics', 'Fluid Mechanics', 'Structural Engineering', 'Aviation Technology', 'Creative Writing', 'Medicinal Chemistry',
        'Constitutional Law', 'Behavioral Science', 'Calculus', 'Digital Signal Processing', 'Maritime Engineering', 'Urban Planning', 'Human-Computer Interaction', 'Biochemistry', 'Optics', 'Microbiology', 'Embedded Systems', 'Cultural Studies', 'Pharmacology','Network Security',
        'Big Data Analytics', 'Renewable Resources', 'Virtual Reality', 'Epidemiology', 'Statistical Modeling', 'Control Systems', 'Therapeutic Techniques', 'Numerical Computation', 'Toxicology'];


        foreach ($subjects as $subjectName) {
            Subject::factory()->create(['name' => $subjectName]);
        }
    }
}


