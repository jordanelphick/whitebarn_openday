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
        Schema::create('rfi_user', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('rfi_id')->nullable();
            $table->foreign('rfi_id')->references('id')->on('rfis');

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');

            $table->boolean('create')->default('0');
            $table->boolean('read')->default('0');
            $table->boolean('update')->default('0');
            $table->boolean('delete')->default('0');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rfis_user');
    }
};
