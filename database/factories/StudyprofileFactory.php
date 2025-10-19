<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StudyProfile>
 */
class StudyProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $subjects = ['Artificial Intelligence', 'Quantum Computing', 'Renewable Energy', 'Cybersecurity', 'Data Science', 'Machine Learning', 'Nervous System', 'Astrophysics', 
        'International Diplomacy', 'Graphic Design', 'Neuroscience', 'Genetics', 'Robotics', 'Environmental Science', 'Cognitive Psychology' ];


        return [
            'bio' => fake()->sentence(15), 
            'city' => fake()->city(), 
            'major' => fake()->randomElement(['Computer Science','Physics','International Relations',
                'Visual Communication Design',
                'Medicine',
                'Law',
                'Psychology',
                'Biology',
                'Mathematics',
                'Mechanical Engineering',
                'Electrical Engineering',
                'Naval Architecture',
                'Architecture Studies',
                'Civil Engineering',
                'Aerospace Engineering',
                'Literature',
                'Pharmacy'
            ]),
            'study_interests' => implode(', ', fake()->randomElements($subjects, rand(1, 3))),
        ];
    }
}
