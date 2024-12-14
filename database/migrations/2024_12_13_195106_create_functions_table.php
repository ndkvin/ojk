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
        Schema::create('functions', function (Blueprint $table) {
            $table->id();
            $table->string('function');
            $table->timestamps();
        });

        Schema::create('types', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->timestamps();
        });

        Schema::create('satuan_kerja', function (Blueprint $table) {
            $table->id();
            $table->string('satker');
            $table->timestamps();
        });

        Schema::create('bidang', function (Blueprint $table) {
            $table->id();
            $table->string('bidang');
            $table->timestamps();
        });

        Schema::create('ssi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('function_id')->constrained('functions')->onDelete('cascade');
            $table->foreignId('type_id')->constrained('types')->onDelete('cascade');
            $table->foreignId('satker_id')->constrained('satuan_kerja')->onDelete('cascade');
            $table->foreignId('bidang_id')->constrained('bidang')->onDelete('cascade');
            $table->string('jenis');
            $table->double('RP');
            $table->double('PD');
            $table->double('OS');
            $table->double('AF');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fungsionalitas');
        Schema::dropIfExists('functions');
        Schema::dropIfExists('types');
        Schema::dropIfExists('satuan_kerja');
        Schema::dropIfExists('bidang');
    }
};
