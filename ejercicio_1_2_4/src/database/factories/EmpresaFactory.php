<?php

namespace Database\Factories;

use App\Models\Empresa;
use App\Models\Ciudad;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmpresaFactory extends Factory
{
    protected $model = Empresa::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->company(),
            'direccion' => $this->faker->address(),
            'codigo_postal' => $this->faker->postcode(),
            'fono' => $this->faker->e164PhoneNumber(),
        ];
    }
}
