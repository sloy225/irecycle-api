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
        Schema::create('medias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('publication_id')->nullable()->references('id')->on('publications')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('titre', 60)->nullable();
            $table->string('type', 60);
            $table->text("path");
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
        Schema::dropIfExists('media');
    }
};
