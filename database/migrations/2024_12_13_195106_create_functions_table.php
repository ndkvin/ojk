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


        Schema::create('bidang', function (Blueprint $table) {
            $table->id();
            $table->foreignId('function_id')->constrained('functions')->onDelete('cascade');
            $table->string('bidang');
            $table->timestamps();
        });

        Schema::create('satuan_kerja', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bidang_id')->constrained('bidang')->onDelete('cascade');
            $table->string('satker');
            $table->timestamps();
        });

        Schema::create('wilayah_kerja', function (Blueprint $table) {
            $table->id();
            $table->foreignId('satker_id')->constrained('satuan_kerja')->onDelete('cascade');
            $table->string('wilker');
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
        Schema::dropIfExists('wilayah_kerja');
        Schema::dropIfExists('bidang');
    }
};
