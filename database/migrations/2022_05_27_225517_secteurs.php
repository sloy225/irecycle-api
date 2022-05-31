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
        Schema::create('secteurs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('commune_id')->references('id')->on('communes')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('nom_secteur', 60);
            $table->string('responsable', 60);
            $table->string("contact_secteur", 20);
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
        Schema::dropIfExists('secteurs');
    }
};
