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
        Schema::create('satuan_item', function (Blueprint $table) {
            $table->id();
            $table->foreignId('satuan_id')
                  ->constrained('satuan')
                  ->cascadeOnUpdate();
            $table->foreignId('item_id')
                  ->constrained('item')
                  ->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('satuan_item');
    }
};
