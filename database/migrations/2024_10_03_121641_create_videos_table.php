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
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->string('youtube_id')->unique();
            $table->string('title')->unique();
            $table->string('slug', 400)->unique();
            $table->text('description')->nullable();
            $table->boolean('premium_video')->default(false);
            $table->float('single_price')->nullable();
            $table->dateTime('date_time_to_offer_free_access')->nullable();
            $table->dateTime('publication_date');
            $table->string('video_thumbnail')->nullable();
            $table->string('video_preview')->nullable();
            $table->boolean('highlighted')->default(false);

            $table->string('category');

            $table->bigInteger('video_creator_id', false, true);
            $table->foreign('video_creator_id')->references('id')->on('staff_members');

            $table->integer('views', false, true)->default(0);
            $table->timestamps();

            // Ajout des index
            $table->index('highlighted');
            $table->index('premium_video');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('videos', function (Blueprint $table) {
            $table->dropForeign('videos_video_creator_id_foreign');
        });

        Schema::dropIfExists('videos');
    }
};
