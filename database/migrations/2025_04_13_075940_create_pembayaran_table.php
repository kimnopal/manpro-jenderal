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
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id();
            $table->integer('termin_no');
            $table->foreignId('invoice_id')
                ->references('id')->on('invoice')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->enum('status', ['paid', 'unpaid', 'pending'])->default('unpaid');
            $table->integer('nominal');
            $table->string('kode_pembayaran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};
