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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->integer('amount')->unsigned();
            /* $table->string('email');
            $table->string('phone_number'); */

            $table->string('transaction_id', 40)->nullable();

            $table->bigInteger('video_id', false, true)->nullable();
            $table->foreign('video_id')->references('id')->on('videos')->onDelete('restrict');

            $table->bigInteger('subscription_id', false, true)->nullable();
            $table->foreign('subscription_id')->references('id')->on('subscriptions')->onDelete('restrict');

            $table->bigInteger('user_id', false, true)->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');

            $table->boolean('isPaymentSucces')->default(false);

            /* $table->boolean('acheved')->default(false); */
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
