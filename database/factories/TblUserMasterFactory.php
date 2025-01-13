<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TblUserMaster>
 */
class TblUserMasterFactory extends Factory
{
    protected $model = \App\Models\TblUserMaster::class;

    public function definition(): array
    {
        try {
            $data = [
                'name' => $this->faker->name(),
                'email' => $this->faker->unique()->safeEmail(),
                'password' => bcrypt('password'),
                'phone_number' => $this->faker->numberBetween(1000, 9999),
                'user_delete' => 0,
            ];
             // Output the generated data
            return $data;
        } catch (\Exception $e) {
            dd('Factory Error:', $e->getMessage());
        }
    }
}
