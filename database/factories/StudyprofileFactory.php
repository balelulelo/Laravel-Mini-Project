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

        $majors = ['Computer Science','Physics','International Relations','Visual Communication Design','Medicine','Law','Psychology','Biology','Mathematics','Mechanical Engineering',
                'Electrical Engineering','Naval Architecture','Architecture Studies','Civil Engineering','Aerospace Engineering','Literature','Pharmacy'];

        return [
            'bio' => fake()->sentence(15), 
            'city' => fake()->city(), 
            'major' => fake()->randomElement($majors),
        ];
    }

    public function configure() :static
    {
        return $this->afterCreating(function (\App\Models\StudyProfile $studyProfile) {

            $subjectIds = \App\Models\Subject::inRandomOrder()->take(rand(1, 3))->pluck('id');
            $studyProfile->subjects()->attach($subjectIds);
        });
    }
}
