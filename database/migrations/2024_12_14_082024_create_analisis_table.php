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
        Schema::create('analisis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('function_id')->constrained('functions')->onDelete('cascade');
            $table->foreignId('type_id')->constrained('types')->onDelete('cascade');
            $table->foreignId('satker_id')->constrained('satuan_kerja')->onDelete('cascade');
            $table->foreignId('bidang_id')->constrained('bidang')->onDelete('cascade');
            $table->longText('af_1_oq');
            $table->longText('af_2_oq');
            $table->longText('cf_1_oq');
            $table->longText('cf_2_oq');
            $table->timestamps();


            $table->index(['function_id', 'type_id', 'satker_id', 'bidang_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('analisis');
    }
};