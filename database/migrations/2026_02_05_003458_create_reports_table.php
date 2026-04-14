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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('nama_pelapor');
            $table->string('nisn');
            $table->string('kelas');
            $table->string('jurusan');
            $table->string('jenis_sarana');
            $table->enum('tingkat_kerusakan', ['Ringan', 'Sedang', 'Berat', 'Membahayakan']);
            $table->string('lokasi');
            $table->text('deskripsi');
            $table->date('tanggal_laporan');
            $table->enum('status', ['Pending', 'Diproses', 'Selesai', 'Ditolak'])->default('Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};