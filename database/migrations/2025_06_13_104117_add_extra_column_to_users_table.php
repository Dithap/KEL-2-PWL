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
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('role_id')->after('password');
            $table->foreign('role_id')->references('id')->on('roles');

            $table->string('phone_number')->after('email');
            $table->enum('status' ,['0', '1'])->after('role_id');
            $table->softDeletes();
            $table->unsignedBigInteger('role_id')->default(1)->after('password');
            $table->foreign('role_id')->references('id')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role_id');
            $table->dropForeign(['role']);
            $table->dropColumn('role');
        });
    }
};
