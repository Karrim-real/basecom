<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->foreignId('user_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('prod_id')->constrained('products')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('prod_qty');
            $table->string('twitter');
            $table->string('discord');
            $table->string('instagram')->nullable();
            $table->string('image')->nullable();
            $table->string('message')->nullable();
            $table->string('reference_id');
            $table->string('payment_type');
            $table->string('payment_ref');
            $table->boolean('status')->default('0');
            $table->timestamps();
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
};
