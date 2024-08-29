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
        Schema::create('trx_pembayaran', function (Blueprint $table) {
            $table->id();
            $table->string('code', 20);
            $table->unsignedBigInteger('peserta_id');
            $table->integer('amount');
            $table->string('status', 100);
            $table->string('snap_token', 100);
            $table->timestamps();

            $table->foreign('peserta_id')->references('id')->on('ref_peserta')->cascadeOnDelete();
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
