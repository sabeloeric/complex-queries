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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('interest_id'); // Foreign key for interests
            $table->unsignedBigInteger('person_id'); // Foreign key for personal_details
            $table->string('interest');
            $table->string('name');
            $table->string('url');
            $table->timestamps();

            // Define foreign key relationship with interests
            $table->foreign('interest_id')->references('id')->on('interests');

            // Define foreign key relationship with personal_details
            $table->foreign('person_id')->references('id')->on('personal_details');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
