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
        schema::create('user_notes', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string("judul_notes");
            $table->longText("isi_notes");
            $table->uuid('id_user');
            $table->foreign('id_user')->on('users')->references('id')->onDelete('Cascade')->onUpdate('Cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_notes');
    }
};
