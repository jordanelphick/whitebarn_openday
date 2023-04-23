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
        Schema::create('records', function (Blueprint $table) {
            $table->id();
            $table->string('document_number');
            $table->string('document_name');
            $table->string('document_revision');
            $table->string('status');
            $table->string('comment');
            $table->date('date_reviewed');
            $table->date('date_closed')->nullable();
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
        Schema::dropIfExists('records');
    }
};
