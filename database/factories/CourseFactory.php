<?php

namespace Database\Factories;

use App\Models\Score;
use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $language = ["PHP", "PYTHON", "JAVASCRIPT", "CSS", "VUEJS"];
        $score = Score::withoutGlobalScope(TestScope::class)->pluck('score')->toArray();
        return [
            'subject' => Arr::random($language),
            'score_id' => Arr::random($score),
        ];
    }
}
