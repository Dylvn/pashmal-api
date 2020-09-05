<?php

use App\Genre;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genres = Genre::all();

        factory(App\Book::class, 50)->create()->each(function ($book) use ($genres) {
            $book->genres()->save($genres->random(1)->first());
        });
    }
}
