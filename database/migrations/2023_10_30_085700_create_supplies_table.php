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
        Schema::create('supplies', function (Blueprint $table) {
            $table->id();
            $table->morphs('suppliable');
            $table->enum('supply_type', ['IN', 'OUT']);
            $table->double('quantity');
            $table->integer('unit_price')->nullable();
            $table->date('date');
            $table->foreignId('animal_id')->nullable()->constrained();
            $table->foreignId('supplier_id')->nullable()->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supplies');
    }
};
