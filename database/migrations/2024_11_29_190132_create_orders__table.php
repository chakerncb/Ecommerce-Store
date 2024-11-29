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
        Schema::create('orders', function (Blueprint $table) {
            $table->id('ord_id');
            $table->foreignId('cart_id')->constrained('carts', 'cart_id');
            $table->foreignId('costumer_id')->constrained('users', 'id');
            $table->decimal('total', 8, 2);
            $table->string('status'); // pending, processing, completed, cancelled
            $table->string('payment_method'); // cash, credit card, debit card, paypal
            $table->string('payment_status'); // pending, paid, failed
            $table->string('shipping_method'); // pickup, delivery
            $table->string('shipping_status'); // pending, shipped, delivered
            $table->foreignId('address_id')->constrained('addresses', 'addrs_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
