<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pedidos>
 */
class PedidosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::all() -> random() -> id,
            'nombre' => fake() -> unique() -> sentence(3, true),
            'estado' => fake() -> randomElement(['Pendiente', 'Procesado']),
            'cantidad' => $this->faker->randomFloat(2, 1, 9999.99),
            'created_at' => $createdAt = fake() -> dateTimeBetween('-1 month', 'now'),
            'updated_at' => $createdAt
        ];
    }
}
