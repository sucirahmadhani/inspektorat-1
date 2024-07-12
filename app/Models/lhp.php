<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lhp extends Model
{
    use HasFactory;
    protected $table = 'lhps';

    protected $fillable = [

        'judul_lhp',
        'tanggal_pengajuan',
        'opd_id',
        'ketua_tim',
        'anggota_tim',
        'jenis_pengawasan',
        'file',
        'status_lhp_id',
        'id_lhp'
    ];

    protected $keyType = 'string';
    protected $primaryKey = 'id_lhp';
    public function getFormattedIdAttribute()
    {
        return 'LHP' . str_pad($this->id, 4, '0', STR_PAD_LEFT);
    }

    protected $attributes = [
        'status_lhp_id' => 'STT02'
    ];


    public function status()
    {
        return $this->belongsTo(StatusLHP::class, 'status_lhp_id');
    }

    public function komentars()
    {
        return $this->hasMany(Komentar::class, 'id_lhp', 'id_lhp');
    }

    public function pegawai()
    {
        return $this->belongsToMany(Pegawai::class, 'anggota_tim', 'id_lhp', 'id')->withPivot('role');
    }

    public function opd()
    {
        return $this->belongsTo(Opd::class, 'opd_id');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
