<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('collecteurs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('secteur_id')->references('id')->on('secteurs')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string("last_name", 60);
            $table->string("first_name", 60);
            $table->string("contact", 15);
            $table->string("email_collecteur", 30);
            $table->text('password');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('collecteurs');
    }
};
