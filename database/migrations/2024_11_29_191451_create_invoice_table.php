<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id('inv_id');
            $table->string('inv_status'); // paid, unpaid
            $table->string('inv_total');
            $table->string('inv_discount');
            $table->unsignedBigInteger('inv_order_id');
            $table->unsignedBigInteger('inv_customer_id');
            $table->foreign('inv_order_id')->references('ord_id')->on('orders');
            $table->foreign('inv_customer_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice');
    }
};
