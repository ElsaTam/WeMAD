<?php

namespace App\Models\People;

use Illuminate\Database\Eloquent\Model;

class Vampire extends HiddenHuman
{
    protected static $singleTableType = 'vampire';

    protected $fillable = [
        'sire_id',
        'self_control'
    ];

    /**
     * Get the sire of the vampire
    */
    public function sire() {
        return $this->belongsTo(Vampire::class, 'sire_id');
    }

    /**
     * Get the brood of the vampire
    */
    public function brood() {
        return $this->hasMany(Vampire::class, 'sire_id', 'id');
    }
}
