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
            $table->foreignId('satker_id')->constrained('satuan_kerja')->onDelete('cascade');
            $table->foreignId('bidang_id')->constrained('bidang')->onDelete('cascade');
            // $table->string('jenis');
            $table->decimal('rp', 10, 2)->nullable();
            $table->decimal('pd', 10, 2)->nullable();
            $table->decimal('os', 10, 2)->nullable();
            $table->decimal('af_1_oq', 10, 2)->nullable();
            $table->decimal('af_2_oq', 10, 2)->nullable();
            $table->decimal('cf_1_oq', 10, 2)->nullable();
            $table->decimal('cf_2_oq', 10, 2)->nullable();

            $table->decimal('indirect_os_subject', 10, 2)->nullable();
            $table->decimal('indirect_os_context', 10, 2)->nullable();
            $table->decimal('indirect_os_low_power', 10, 2)->nullable();
            $table->decimal('indirect_af_1_oq', 10, 2)->nullable();
            $table->decimal('indirect_af_2_oq', 10, 2)->nullable();
            $table->decimal('indirect_cf_1_oq', 10, 2)->nullable();
            $table->decimal('indirect_cf_2_oq', 10, 2)->nullable();

            $table->timestamps();

            $table->index(['function_id', 'satker_id', 'bidang_id']);
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
