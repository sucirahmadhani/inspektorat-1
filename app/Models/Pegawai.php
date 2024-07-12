<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $fillable = [
        'name',
        'nip',
        'role'
    ];

    public function lhps()
    {
        return $this->belongsToMany(Lhp::class, 'anggota_tim', 'id', 'id_lhp')->withPivot('role');
    }
}
