<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Author;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        for ($i = 0; $i < 10; $i++) {
            $first_name = $faker->firstName();
            $last_name = $faker->lastName();
            $full_name = $first_name . ' ' . $last_name;
            $new_author = new Author();
            $new_author->name = $full_name;
            $new_author->save();
        }
    }
}
