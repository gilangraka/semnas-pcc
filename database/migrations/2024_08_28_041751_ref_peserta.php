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
        Schema::create('ref_peserta', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('nomor_hp', 20);
            $table->string('instansi', 100);
            $table->string('profesi', 100);
            $table->string('foto_profil', 100);
            $table->string('link_facebook', 100);
            $table->string('link_instagram', 100);
            $table->string('link_twitter', 100);
            $table->string('link_tiktok', 100);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
