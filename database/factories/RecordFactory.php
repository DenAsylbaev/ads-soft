<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Record;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Record>
 */
class RecordFactory extends Factory
{    protected $model = Record::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>r
     */
    public function definition(): array
    {
        $data = [];
        
        $numberOfKeys = rand(1, 10);
        for ($i = 0; $i < $numberOfKeys; $i++) {
            $data["key$i"] = $this->faker->word;
        }

        return [
            'data' => $data,
            'access' => 0
        ];
    }
}
