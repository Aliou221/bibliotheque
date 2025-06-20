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
        Schema::create('emprunts', function (Blueprint $table) {
            $table->id();
            $table->integer('id_livre');
            $table->integer('id_user');
            $table->date('date_emprunt');
            $table->date('date_retoure');
            $table->boolean('estEncours');
            $table->boolean('estRetourne');

            $table->foreign('id_livre')->references('id')->on('livres')->onDelete('cascade');
            $table->foreign('id_user')->references('id')->on('usagers')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emprunts');
    }
};
