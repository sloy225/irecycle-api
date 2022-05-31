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
        Schema::create('collects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('ramassage_id')->references('id')->on('ramassages')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('type_dechet_id')->references('id')->on('type_dechets')->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer("poids");
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
        Schema::dropIfExists('collects');
    }
};
