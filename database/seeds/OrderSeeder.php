<?php

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
        factory(App\Order::class, 50)->create()->each(function ($order) {
            $order->books()->save(factory(App\Book::class)->make());
        });
    }
}
