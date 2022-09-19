<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
//use Illuminate\Support\Str;

class NoticeFactory extends Factory
{
    public static function factory(int $int)
    {
    }

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'from_time' => '16:00:00',
            'until_time' => '22:00:00',
            'location' => $this->faker->city(),
            'day_part_tags' => $this->faker->dayOfWeek(),
            'active' => $this->faker->boolean(),
        ];
    }

}
