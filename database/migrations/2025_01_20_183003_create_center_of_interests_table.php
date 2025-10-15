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
        Schema::create('centers_of_interest', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('short_identifier')->nullable();
            $table->mediumText('short_description')->nullable();
            $table->timestamps();
        });

        Schema::create('center_of_interest_user', function (Blueprint $table) {
            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('center_of_interest_id')->references('id')->on('centers_of_interest')->cascadeOnDelete()->cascadeOnUpdate();
            $table->primary(['user_id', 'center_of_interest_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('center_of_interest_user');
        Schema::dropIfExists('centers_of_interest');
    }
};
