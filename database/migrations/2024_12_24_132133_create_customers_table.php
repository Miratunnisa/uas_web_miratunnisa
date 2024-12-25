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
    Schema::create('customers', function (Blueprint $table) {
        $table->id();
        $table->string('customer_name');
        $table->string('customer_email')->unique();
        $table->string('customer_phone')->nullable();
        $table->text('customer_address')->nullable();
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('customers');
}
};
