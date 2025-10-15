<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Identifiant unique
            $table->string('name'); // Nom de l'utilisateur
            $table->string('email')->unique(); // Email unique
            $table->string('password'); // Mot de passe
            $table->string('google_id')->nullable();
            $table->string('facebook_id')->nullable();
            $table->boolean('terms_accepted')->default(false); // Acceptation des termes et conditions
            $table->timestamps(); // Créé et mis à jour à
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
