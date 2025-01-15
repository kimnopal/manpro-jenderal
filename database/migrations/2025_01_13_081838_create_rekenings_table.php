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
            $table->foreignId('supplier_id')
                    ->unique()
                    ->nullable()
                    ->constrained('supplier')
                    ->nullOnDelete()
                    ->cascadeOnUpdate();
            $table->foreignId('bank_id')
                    ->nullable()
                    ->constrained('bank')
                    ->nullOnDelete()
                    ->cascadeOnUpdate();
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
