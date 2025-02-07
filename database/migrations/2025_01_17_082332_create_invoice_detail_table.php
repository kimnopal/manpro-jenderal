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
        Schema::create('invoice_detail', function (Blueprint $table) {
            $table->id();
            $table->foreignId('invoice_id')
                ->constrained('invoice')
                ->cascadeOnUpdate()
                ->cascadeOnDelete(); // Tambahkan cascadeOnDelete untuk menghapus detail jika invoice dihapus
            $table->string('deskripsi');
            $table->integer('harga');
            $table->integer('qty');
            $table->integer('total');
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice_detail');
    }
};
