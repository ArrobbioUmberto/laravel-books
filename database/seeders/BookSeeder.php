<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;
use Faker\Generator as Faker;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 100; $i++) {

            $first_name = $faker->firstName();
            $last_name = $faker->lastName();

            $full_name = $first_name . ' ' . $last_name;

            $new_book = new Book();

            $new_book->publishing_company = $faker->randomElement(['Mondadori', 'Rizzoli', 'Einaudi', 'Giunti', 'Feltrinelli']);
            $new_book->title = $faker->sentence(3);
            $new_book->author = $full_name;
            $new_book->pages = $faker->numberBetween(10, 3000);
            $new_book->ISBN = $faker->isbn13();
            $new_book->is_available = $faker->randomElement([true, false]);

            $new_book->save();
        }
    }
}
