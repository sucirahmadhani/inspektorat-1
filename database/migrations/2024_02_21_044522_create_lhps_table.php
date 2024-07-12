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
        Schema::create('lhps', function (Blueprint $table) {
            $table->string('id_lhp')->unique();
            $table->string('judul_lhp');
            $table->date('tanggal_pengajuan');
            $table->string('opd');
            $table->string('ketua_tim');
            $table->string('anggota_tim');
            $table->string('penanggung_jawab');
            $table->string('wakil_penanggung_jawab');
            $table->string('pengendali_teknis');
            $table->string('anggota_tim_pendukung');
            $table->string('jenis_pengawasan');
            $table->string('file');
            $table->string('status_lhp_id');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lhps');
    }
};
