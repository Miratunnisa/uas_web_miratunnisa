<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->string('product_name');
        $table->decimal('product_price', 10, 2);
        $table->integer('product_stock');
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('products');
}
};
