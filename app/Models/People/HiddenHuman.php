<?php

namespace App\Models\People;

use Illuminate\Database\Eloquent\Model;

class HiddenHuman extends Human
{
    protected static $singleTableSubclasses = [Vampire::class, Warlock::class, Werewolf::class];

    protected $fillable = [
        'group_id'
    ];

    // -----------------------------
    //         RELATIONSHIPS
    // -----------------------------

    /**
     * Get the group associated with the creature (clan, circle, pack, ...).
    */
    public function group() {
        return $this->belongsTo(App\Models\Groups\Group::class, 'group_id', 'id');
    }


    // -----------------------------
    //           MUTATORS
    // -----------------------------

    public function getIsRenegadeAttribute() {
        return $this->group_id == NULL && ! $this->dead;
    }
}
