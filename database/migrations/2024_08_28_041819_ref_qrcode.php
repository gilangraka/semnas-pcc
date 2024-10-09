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
        Schema::create('ref_qrcode', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->unsignedBigInteger('peserta_id');
            $table->string('file_qrcode', 100)->nullable();
            $table->unsignedBigInteger('status_id');
            $table->timestamps();

            $table->foreign('peserta_id')->references('id')->on('ref_peserta')->cascadeOnDelete();
            $table->foreign('status_id')->references('id')->on('ref_status')->cascadeOnDelete();
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
