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
        $policytype = ['Health', 'Life', 'Bike', 'Car'];
        $a = $this->faker->numberBetween(0, 3);
        return [
            // 'companyid'(
            'companyid' => Company::all()->pluck('id')->random(),
            'policyname' => $this->faker->name,
            'policytype' =>  $policytype[$a],
            'p_desc' => $this->faker->text,
            'p_price' => $this->faker->numberBetween(1000, 5000),
            'c_price' => $this->faker->numberBetween(20000, 50000),
            'policy_period' => $this->faker->numberBetween(1, 24),  //
        ];
    }
}
