<?php

use App\Book;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $books = Book::all();

        factory(App\Order::class, 50)->create()->each(function ($order) use ($books) {
            $order->books()->save($books->random(1)->first());
        });
    }
}
