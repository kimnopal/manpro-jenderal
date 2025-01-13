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
        Schema::create('rekening', function (Blueprint $table) {
            $table->id();
            $table->integer('rekening_id');
            $table->foreignId('supplier_id')->constrained(
                table:'supplier',column:'supplier_id', indexName:'rekening_supplier_id'
            );
            $table->foreignId('bank_id')->constrained(
                table:'bank', column:'bank_id', indexName:'rekening_bank_id'
            );
            $table->string('nomor_rekening');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekening');
    }
};
