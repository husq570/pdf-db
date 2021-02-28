<?php

namespace Database\Factories;

use App\Models\Document;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class DocumentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Document::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $status = [0, 1];

        return [
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'status' => Arr::random($status),
            'category_id' => Category::inRandomOrder()->first(),
        ];
    }
}
