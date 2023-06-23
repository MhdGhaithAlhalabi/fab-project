<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attribute>
 */
class AttributeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        //$name = $this->faker->department;
        return [
             'ar*.name' => $this->faker->name(),
             'en*.name' => $this->faker->name(),
             'tr*.name' => $this->faker->name()
        ];
    }
}
