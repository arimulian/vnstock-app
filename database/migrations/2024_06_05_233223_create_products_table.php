<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->string('name');
            $table->string('size', 20);
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->unsignedInteger('price');
            $table->foreignId('category_id')
                ->constrained('categories', 'id', 'product_category_id')
                ->cascadeOnDelete();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
