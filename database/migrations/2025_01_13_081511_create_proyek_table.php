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
        Schema::create('proyek', function (Blueprint $table) {
            $table->id();
            $table->string('no_proyek')->unique();
            $table->date('tgl_mulai_kontrak');
            $table->date('tgl_selesai_kontrak');
            // $table->unsignedBigInteger('klien_id');
            // $table->foreign('klien_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreignId('klien_id')
                  ->constrained(table: 'client', indexName: 'proyek_klien_id')
                  ->onDelete('cascade');;
            // $table->unsignedBigInteger('klien_id');
            $table->integer('termin');
            $table->decimal('biaya', 15, 2)->default(0);
            $table->decimal('pajak', 15, 2)->default(0);
            $table->decimal('biaya_lain', 15, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyek');
    }
};
