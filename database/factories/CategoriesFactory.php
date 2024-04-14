<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CategoriesFactory extends Factory
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
        // Define an array of category names
        $categoryNames = [
            'Sleeping',
            'Tents',
            'Lighting',
            'Cooking',
            // Add more category names as needed
        ];

        // Get a random category name from the array
        $name = $this->faker->randomElement($categoryNames);

        return [
            'name' => $name,
        ];
    }
}
