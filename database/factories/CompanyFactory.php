<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'r_no'=>$this->faker->unique()->numberBetween(135012233,9999999999 ),
            'name' => $this->faker->name(),
            'about'=>$this->faker->text(20)
        ];
    }
}
