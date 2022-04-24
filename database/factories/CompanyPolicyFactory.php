<?php

namespace Database\Factories;
use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CompanyPolicy>
 */
class CompanyPolicyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $type = ['Health', 'Life', 'Bike','Car'];
        $ran = rand(0,3);
        return [
            'companyid'=>Company::all()->random()->id,
            'policyname'=> $this->faker->name(),
            'policytype' => $this->type[$this->ran],
            'p_desc'=>$this->faker->text(20),
            'p_price'=>$this->faker->unique()->numberBetween(5,50) * 100,
            'p_claim'=>$this->faker->unique()->numberBetween(100,1000) * 100

        ];
    }
}
