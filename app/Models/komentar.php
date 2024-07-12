<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    use HasFactory;

    protected $fillable = ['id_comment', 'id_lhp', 'content'];

    public $incrementing = false;

    protected $primaryKey = 'id_comment';

    // Override method boot to generate id_comment before saving
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id_comment = static::generateId();
        });
    }

    public function getFormattedIdAttribute()
    {
        return 'CMT' . str_pad($this->id_comment, 4, '0', STR_PAD_LEFT);
    }

    public function lhp()
    {
        return $this->belongsTo(Lhp::class, 'id_lhp', 'id_lhp'); 
    }

    // Method to generate a unique id_comment
    protected static function generateId()
    {
        // Find the latest comment
        $latestComment = static::orderBy('created_at', 'desc')->first();

        // If no comment exists, start with 1
        if (!$latestComment) {
            return 1;
        }

        // Extract the numeric part of id_comment and increment by 1
        $numericPart = (int) str_replace('CMT', '', $latestComment->id_comment);
        $nextNumericPart = $numericPart + 1;

        // Return the formatted id_comment
        return 'CMT' . str_pad($nextNumericPart, 4, '0', STR_PAD_LEFT);
    }
}
