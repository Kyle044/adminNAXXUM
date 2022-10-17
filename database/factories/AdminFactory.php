<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = User::class;
    public function definition()
    {
        return [
            'username' => $this->faker->userName(),
            'password' => $this->faker->password(),
            'full_name' => $this->faker->name(),
            'email' => $this->faker->email(),
            "contact_number" => "0956" . rand(1, 50),
        ];
    }
}
