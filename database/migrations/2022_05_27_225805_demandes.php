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
        Schema::create('demandes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('client_id')->references('id')->on('clients')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('ramassage_id')->nullable()->references('id')->on('ramassages')->cascadeOnDelete()->cascadeOnUpdate();
            $table->date('date_prevu');
            $table->string('periode_prevu', 20);
            $table->string('point_recuperation', 60);
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
        Schema::dropIfExists('demandes');
    }
};
