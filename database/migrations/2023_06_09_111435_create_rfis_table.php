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
            $table->unsignedInteger('sender_index');
            $table->string('project_acronym');
            $table->string('number')->unique();
            $table->string('name');
            $table->string('status');
            $table->string('priority')->default('medium');
            $table->string('comment')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('workpackage_id');
            $table->foreign('workpackage_id')->references('id')->on('workpackages');
            $table->unsignedBigInteger('sender_organisation_id');
            $table->foreign('sender_organisation_id')->references('id')->on('organisations');
            $table->unsignedBigInteger('receiver_organisation_id');
            $table->foreign('receiver_organisation_id')->references('id')->on('organisations');
            $table->unsignedBigInteger('next_update_organisation_id');
            $table->foreign('next_update_organisation_id')->references('id')->on('organisations');

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
