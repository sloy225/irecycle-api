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
        Schema::create('admins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('role_id')->references('id')->on('roles')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('nom', 60);
            $table->string('prenom', 60);
            $table->string('email', 60);
            $table->string('password', 255);
            $table->text('token_admin');
            $table->timestamp('email_verified_at')->nullable();
            $table->dateTime('password_change_at')->default(null)->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('admins');
    }
};
