<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Ambil semua author yang ada di database
        $authors = Author::all();

        // Loop untuk membuat beberapa buku
        foreach ($authors as $author) {
            for ($i = 0; $i < 3; $i++) {
                Book::create([
                    'title' => $faker->sentence,
                    'serial_number' => $faker->unique()->isbn13,
                    'published_at' => $faker->date,
                    'author_id' => $author->id,
                ]);
            }
        }
    }
}
