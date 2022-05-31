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
        Schema::create('ramassages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('collecteur_id')->references('id')->on('collecteurs')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('commune_id')->references('id')->on('communes')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamp('date_ramassage');
            $table->string('coordonnes');
            $table->integer('total_points');
            $table->string('status');
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
        Schema::dropIfExists('ramassages');
    }
};
