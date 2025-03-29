<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AlunoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'profissao' => $this->faker->jobTitle,
            'escolaridade' => $this->faker->randomElement(['Fundamental', 'Médio', 'Superior', 'Pós-graduação']),
            'estadoCivil' => $this->faker->randomElement(['Solteiro', 'Casado', 'Divorciado', 'Viúvo']),
            'tipoSanguineo' => $this->faker->randomElement(['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-']),
            'modalidade' => $this->faker->randomElement(['Musculação', 'Crossfit', 'Natação', 'Dança']),
            'comoSoubeAcademia' => $this->faker->randomElement(['Indicação', 'Redes Sociais', 'Panfleto', 'Outros']),
            'objetivo' => $this->faker->sentence,
            'idade' => $this->faker->numberBetween(15, 70),
            'peso' => $this->faker->randomFloat(2, 50, 120),
            'altura' => $this->faker->randomFloat(2, 1.50, 2.00),
            'situacao' => $this->faker->randomElement(['Ativo', 'Inativo']),
            'plano' => $this->faker->randomElement(['Mensal', 'Trimestral', 'Anual']),
            'valor' => $this->faker->randomFloat(2, 100, 300),
            'data_pagamento' => $this->faker->date(),
        ];
    }
}