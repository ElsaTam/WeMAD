<?php

namespace App\Models\People;

use Illuminate\Database\Eloquent\Model;

class Vampire extends HiddenHuman
{
    use \App\Models\Child;

    protected $fillable = [
        'sire_id',
        'self_control'
    ];

    /**
     * Get the sire of the vampire
    */
    public function sire() {
        return $this->belongsTo(App\Models\People\Vampire::class, 'sire_id');
    }

    /**
     * Get the brood of the vampire
    */
    public function brood() {
        return $this->hasMany(App\Models\People\Vampire::class, 'sire_id', 'person_id');
    }
}
