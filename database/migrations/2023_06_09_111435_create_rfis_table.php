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
        Schema::create('rfis', function (Blueprint $table) {
            $table->id();
            $table->string('number');
            $table->string('name');
            $table->string('status');
            $table->string('comment')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('workpackage_id');
            $table->foreign('workpackage_id')->references('id')->on('workpackages');
            $table->unsignedBigInteger('organisation_sender');
            $table->foreign('organisation_sender')->references('id')->on('organisations');
            $table->unsignedBigInteger('organisation_receiver');
            $table->foreign('organisation_receiver')->references('id')->on('organisations');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rfis');
    }
};
