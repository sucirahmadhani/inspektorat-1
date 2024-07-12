<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusLHP extends Model
{
    use HasFactory;

    protected $table = 'status_lhp';
    protected $primaryKey = 'id_status';

    protected $fillable = [
        'id_status',
        'status',
    ];

    public function lhps()
    {
        return $this->hasMany(LHP::class, 'status_lhp_id');
    }
}
