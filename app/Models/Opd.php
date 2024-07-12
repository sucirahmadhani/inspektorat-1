<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class opd extends Model
{
    use HasFactory;

    protected $table = 'opds';

    protected $primaryKey = 'kode';
    protected $keyType = 'string';

    protected $fillable = [
        'kode',
        'nama',
    ];


    public function lhps()
    {
        return $this->hasMany(LHP::class, 'opd_id');
    }
}
