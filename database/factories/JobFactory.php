<?php

namespace Database\Factories;

use App\Models\Addresses;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobVacancie>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $address = Addresses::pluck('id');
        $type = ['Presencial', 'Remoto', 'Hibrido'];
        $modality = ['Freelancer', 'PJ', 'CLT'];
        $image = [
            'img/gestao-de-TI.jpg',
            'img/InternalUser.png',
            'img/Softwares-de-gestão-na-transformação-digital-2.png',
            'img/Gerenciamento-dos-Servico-de-TI-sua-empresa-esta-preparada-para-crescer.png'
        ];
        return [
            'title' => $this->faker->jobTitle,
            'modality' => $modality[rand(0, 2)],
            'type' => $type[rand(0, 2)],
            'salary' => $this->faker->buildingNumber,
            'image' => $image[rand(0, 3)],
            'description' => $this->faker->jobTitle,
            'address_id' => $address->random(1)[0]
        ];
    }
}
