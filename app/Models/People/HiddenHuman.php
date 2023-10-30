<?php

namespace App\Models\People;

use Illuminate\Database\Eloquent\Model;
use App\Models\Groups\Group;

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
        return $this->belongsTo(Group::class, 'group_id', 'id');
    }


    // -----------------------------
    //           MUTATORS
    // -----------------------------

    public function getIsRenegadeAttribute() {
        return $this->group_id == NULL && ! $this->dead;
    }

    public function getIsLeaderAttribute() {
        return $this->group->leader_id == $this->id;
    }

    public function getLeaderTitleAttribute() {
        $this->disableMutator = True;
        $title = $this->sex == "male" ? $this->group->type->leader_alias_m : $this->group->type->leader_alias_f;
        $this->disableMutator = False;
        return $title;
    }
}
