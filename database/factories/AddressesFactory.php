<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Addresses>
 */
class AddressesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $states = [
            'AC', 'AL', 'AP',
            'AM', 'BA', 'CE',
            'DF', 'ES', 'GO',
            'MA', 'MS', 'MT',
            'MG', 'PA', 'PB',
            'PR', 'PE', 'PI',
            'RJ', 'RN', 'RS',
            'RO', 'RR', 'SC',
            'SP', 'SE', 'TO',
        ];

        return [
            'state' => $states[rand(0, 26)],
            'city' => $this->faker->city,
            'cep' => $this->faker->postcode,
            'street' => $this->faker->streetName,
            'number' => $this->faker->buildingNumber,
            'complement' => $this->faker->streetAddress,
            'neighborhood' => $this->faker->citySuffix
        ];
    }
}
