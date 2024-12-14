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
        Schema::create('ssi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('function_id')->constrained('functions')->onDelete('cascade');
            $table->foreignId('type_id')->constrained('types')->onDelete('cascade');
            $table->foreignId('satker_id')->constrained('satuan_kerja')->onDelete('cascade');
            $table->foreignId('bidang_id')->constrained('bidang')->onDelete('cascade');
            // $table->string('jenis');
            $table->double('rp');
            $table->double('pd');
            $table->double('os');
            $table->double('af');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ssi');
    }
};
