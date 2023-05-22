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
            $table->string('comment');
            $table->unsignedBigInteger('workpackage_id');
            $table->foreign('workpackage_id')->references('id')->on('workpackages');
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
