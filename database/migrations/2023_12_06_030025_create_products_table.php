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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
			$table->unsignedBigInteger('category_id');
			$table->unsignedBigInteger('seller_id');
			$table->string('name');
			$table->text('description');
			$table->string('photo_url');
			$table->integer('amount');
			$table->string('format');
			$table->integer('price');
			$table->boolean('is_display');
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
