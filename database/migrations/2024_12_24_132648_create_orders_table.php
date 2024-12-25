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
    Schema::create('orders', function (Blueprint $table) {
        $table->id();
        $table->foreignId('customer_id')->constrained()->onDelete('cascade');
        $table->decimal('total_amount', 10, 2);
        $table->foreignId('payment_method_id')->constrained()->onDelete('set null');
        $table->foreignId('shipping_method_id')->constrained()->onDelete('set null');
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('orders');
}
};
