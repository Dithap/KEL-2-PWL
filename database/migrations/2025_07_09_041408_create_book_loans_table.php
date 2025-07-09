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
        Schema::create('book_loans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('book_id');
            $table->unsignedBigInteger('borrower_id');
            $table->date('loan_date');
            $table->date('due_date');
            $table->date('return_date')->nullable();
            $table->enum('status', ['0', '1', '2'])->default('0');
            $table->enum('loan_status', ['waiting', 'borrowed', 'returned', 'late'])->default('waiting');
            $table->integer('fine_amount')->default(0);
            $table->text('notes')->nullable();
            $table->unsignedBigInteger('enhancer_id');
            $table->foreign('book_id')->references('id')->on('books');
            $table->foreign('borrower_id')->references('id')->on('users');
            $table->foreign('enhancer_id')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_loans');
    }
};
