<?php

namespace Database\Factories;

use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    protected $model = Room::class;
    private static int $counter;

    public function __construct(...$parameters)
    {
        parent::__construct(...$parameters);
        self::$counter = Room::max('number') + 1;
    }

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'number' => self::$counter++,
            'name' => $this->faker->word . ' Room',
            'capacity' => $this->faker->numberBetween(1, 50),
            'description' => $this->faker->sentence,
            'state' => 'disponible',
        ];
    }
}
