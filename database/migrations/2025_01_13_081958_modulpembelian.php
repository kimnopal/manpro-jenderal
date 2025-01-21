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
        Schema::create('pembelian', function (Blueprint $table) {
            $table->id();
            $table->foreignId('proyekid')
            ->constrained('proyek')
            ->cascadeOnUpdate();
            
            $table->integer('qty');
            
            $table->foreignId('satuanid')
            ->constrained('satuan')
            ->cascadeOnUpdate();

            $table->integer('hargabeli');

            $table->foreignId('supplierid')
            ->constrained('supplier')
            ->cascadeOnUpdate();
            
            $table->timestamps();
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembelian');
    }
};
