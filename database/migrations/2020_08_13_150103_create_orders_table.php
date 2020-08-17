<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('billing_address')->nullable(false);
            $table->string('billing_postalcode')->nullable(false);
            $table->string('billing_city')->nullable(false);
            $table->string('delivery_address')->nullable(false);
            $table->string('delivery_postalcode')->nullable(false);
            $table->string('delivery_city')->nullable(false);
            $table->decimal('ttc_price', 8, 2);
            $table->decimal('ht_price', 8, 2);
            $table->timestamp();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
