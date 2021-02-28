<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $status = [0, 1];
        $sort_order = [0, 1, 2, 3, 4, 5];

        return [
            'name' => $this->faker->company,
            'status' => Arr::random($status),
            'sort_order' => Arr::random($sort_order),
        ];
    }
}
