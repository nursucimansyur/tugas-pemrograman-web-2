<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('item_code')->unique(); // Kolom 1
            $table->string('name');                // Kolom 2
            $table->string('category');            // Kolom 3
            $table->integer('quantity');           // Kolom 4
            $table->string('condition');           // Kolom 5
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};