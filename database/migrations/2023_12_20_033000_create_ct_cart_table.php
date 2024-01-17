<?php

// database/migrations/[timestamp]_create_ct_cart_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCtCartTable extends Migration
{
    public function up()
{
    Schema::create('ct_cart', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('id_user');
        $table->unsignedBigInteger('id_product');
        $table->integer('qty');
        $table->timestamps();

        $table->foreign('id_user')->references('id')->on('users');
        $table->foreign('id_product')->references('id_product')->on('product');
    });
}

}

