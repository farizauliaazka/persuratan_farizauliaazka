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
        Schema::create('surat', function (Blueprint $table) {
            $table->id('id_surat');
            $table->integer('id_jenis_surat', false)->index('FKIdJenisSurat');
            $table->integer('id_user', false)->index('FKIdUser');
            $table->date('tanggal_surat')->nullable(false)->default('2023-01-01');
            $table->text('ringkasan');
            $table->text('foto');
            //Foreign Key
             $table->foreign('id_jenis_surat')
                     ->references('id_jenis_surat')->on('jenis_surat')
                     ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_user')
                    ->references('id_user')->on('auth')
                    ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat');
    }
};
