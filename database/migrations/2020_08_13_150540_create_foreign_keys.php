<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_genre', function (Blueprint $table) {
            $table->foreignId('book_id')->constrained('books');
            $table->foreignId('genre_id')->constrained('genres');
        });

        Schema::create('book_order', function (Blueprint $table) {
            $table->foreignId('book_id')->constrained('books');
            $table->foreignId('order_id')->constrained('orders');
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_genre');
        Schema::dropIfExists('book_order');
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['user_id']);
        });
    }
}
