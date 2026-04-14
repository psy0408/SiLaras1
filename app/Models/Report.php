<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama_pelapor',
        'username',
        'kelas',
        'jurusan',
        'jenis_sarana',
        'tingkat_kerusakan',
        'lokasi',
        'deskripsi',
        'foto_bukti',
        'tanggal_laporan',
        'status',
        'kategori',
        'admin_feedback',
    ];

    protected $casts = [
        'tanggal_laporan' => 'date',
    ];

    /**
     * Relasi ke User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}