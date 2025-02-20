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
        Schema::create('distributors', function (Blueprint $table) {
            $table->id();

            $table->string('username')->nullable(); 
            $table->string('full_name')->nullable(); 
            $table->string('status')->nullable(); 
            $table->string('product_name')->nullable(); 
            $table->string('category_name')->nullable(); 

            $table->enum('binary_placement', ['Left', 'Right'])->nullable();

            $table->foreignId('distributor_id')->nullable()->on('distributors')->constrained()->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('distribuidors');
    }
};
