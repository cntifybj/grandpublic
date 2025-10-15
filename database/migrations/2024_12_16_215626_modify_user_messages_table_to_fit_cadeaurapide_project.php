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
        Schema::table('user_messages', function (Blueprint $table) {
            $table->renameColumn('content', 'message');
            $table->string('subject')->nullable();
            $table->boolean('read')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_messages', function (Blueprint $table) {
            $table->dropColumn('read');
            $table->dropColumn('subject');
            $table->renameColumn('message', 'content');
        });
    }
};
