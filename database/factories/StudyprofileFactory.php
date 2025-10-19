<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\studyprofile>
 */
class StudyprofileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
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
            'study_interests' => implode(', ', fake()->words(3)),
        ];
    }
}
