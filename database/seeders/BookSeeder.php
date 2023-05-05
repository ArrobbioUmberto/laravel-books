<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Genre;
use App\Models\Author;
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
        $genre_ids = Genre::all()->pluck('id')->all();
        $author_ids = Author::all()->pluck('id')->all();
        for ($i = 0; $i < 100; $i++) {

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
            $new_book->genre_id = $faker->randomElement($genre_ids);

            $new_book->save();
            $new_book->authors()->attach($faker->randomElements($author_ids, rand(2, 4)));
        }
    }
}
