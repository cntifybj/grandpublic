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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('user_id', false, true);
            $table->foreign('user_id')->references('id')->on('users');

            $table->bigInteger('video_id', false, true);
            $table->foreign('video_id')->references('id')->on('videos');

            $table->text('content');
            $table->bigInteger('parent_comment_id')->nullable();
            $table->boolean('deleted')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->dropForeign('comments_user_id_foreign');
            $table->dropForeign('comments_video_id_foreign');
        });

        Schema::dropIfExists('comments');
    }
};
