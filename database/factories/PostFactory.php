<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //add data for body field
            'body' =>$this->faker->sentence(20),
        ];
    }

    //Use Laravel Tinker to generate factories
    //App\Models\Post::factory()->times(200)->create(['user_id' => 2]); //add 200 records where user_id is 2
}
