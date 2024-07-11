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

        Schema::create('customer_addresses', function (Blueprint $table) {
            $table->integerIncrements('id')->primary();
            $table->unsignedInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customer_stores');
            $table->string('address');
            $table->string('district');
            $table->string('city');
            $table->string('province');
            $table->string('postal_code');
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_addresses');
    }
};
