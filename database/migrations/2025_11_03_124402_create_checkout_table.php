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
        Schema::create('checkout', function (Blueprint $table) {
            $table->id();
            $table->string('name');               // Full Name
            $table->string('email');              // Email Address
            $table->string('domain');             // Store / Domain Name
            $table->string('payment_method');     // Payment Method (card / paypal / bank)
            $table->string('status')->default('pending'); // Status: pending, completed, failed, etc.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checkout');
    }
};
