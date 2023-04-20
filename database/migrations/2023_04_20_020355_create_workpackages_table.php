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
        Schema::create('workpackages', function (Blueprint $table) {
            $table->id();
            $table->string('number'); 
            $table->string('name'); 
            $table->string('status')->nullable();     
            $table->unsignedBigInteger('accountable_id');
            $table->foreign('accountable_id')->references('id')->on('users'); 
            $table->unsignedBigInteger('workarea_id');
            $table->foreign('workarea_id')->references('id')->on('workareas');     
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workpackages');
    }
};
