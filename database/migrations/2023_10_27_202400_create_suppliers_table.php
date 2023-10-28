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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 200);
            $table->string('tax_number', 50)->nullable(); // adószám
            $table->string('registration_number', 50)->nullable(); // cégjegyzékszám
            $table->mediumInteger('zipcode')->nullable();
            $table->string('city', 30)->nullable();
            $table->string('street', 60)->nullable();
            $table->tinyInteger('street_number')->nullable();
            $table->string('phone_number')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};
