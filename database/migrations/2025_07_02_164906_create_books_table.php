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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('author')->nullable();
            $table->string('publisher')->nullable();
            $table->year('year')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->string('language')->nullable();
            $table->string('isbn')->unique()->nullable();
            $table->text('description')->nullable();
            $table->string('cover_image')->nullable();
            $table->integer('quantity_total')->default(0);
            $table->unsignedBigInteger('enhancer_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('category_id')->references('id')->on('book_categories');
            $table->foreign('enhancer_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
