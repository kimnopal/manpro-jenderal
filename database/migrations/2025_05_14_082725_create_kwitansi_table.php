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
        Schema::create('kwitansi', function (Blueprint $table) {
            $table->id();
            $table->string('no_kwitansi')->unique();
            $table->foreignId('invoice_id')
                ->references('id')->on('invoice')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->decimal('total', 20, 0)->unsigned();
            $table->string('tujuan');
            $table->date('tanggal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kwitansi');
    }
};
