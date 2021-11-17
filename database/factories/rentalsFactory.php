<?php

namespace Database\Factories;

use App\Models\rentals;
use Illuminate\Database\Eloquent\Factories\Factory;

class rentalsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = rentals::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'CustomerName' => $this->faker->word,
        'Address' => $this->faker->word,
        'Contact' => $this->faker->randomDigitNotNull,
        'CarType' => $this->faker->word,
        'RentDays' => $this->faker->randomDigitNotNull,
        'DateRented' => $this->faker->word,
        'DateReturned' => $this->faker->word,
        'RentAmount' => $this->faker->word,
        'RentPaid' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
