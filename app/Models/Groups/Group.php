<?php

namespace App\Models\Groups;

use Illuminate\Database\Eloquent\Model;
use App\Models\People\Person;
use App\Models\People\Vampire;
use App\Models\People\Warlock;
use App\Models\People\Werewolf;
use App\Models\Places\Office;

class Group extends Model
{
    protected $table = 'groups';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'group_type_id',
        'name',
        'leader_id',
        'office_id'
    ];


    // -----------------------------
    //         RELATIONSHIPS
    // -----------------------------

    public function type()
    {
        return $this->belongsTo(GroupType::class, 'group_type_id');
    }

    /**
     * Get the leader that owns the group.
     */
    public function leader()
    {
        return $this->hasOne(Person::class, 'id', 'leader_id');
    }

    /**
     * Get the office managing the group (as a place).
    */
    public function office()
    {
        return $this->belongsTo(Office::class, 'office_id');
    }

    public function members()
    {
        switch ($this->group_type_id) {
            case "clan":
                return $this->hasMany(Vampire::class, 'group_id', 'id');
            case "circle":
                return $this->hasMany(Warlock::class, 'group_id', 'id');
            case "pack":
                return $this->hasMany(Werewolf::class, 'group_id', 'id');
        }
    }


    // -----------------------------
    //           MUTATORS
    // -----------------------------

    protected $disableMutator = False;

    public function getLinkAttribute()
    {
        $this->disableMutator = True;
        $link = $this->type->id.'s/'.$this->id;
        $this->disableMutator = False;
        return $link;
    }

    public function getFullNameAttribute()
    {
        return $this->type->name." ".$this->name;
    }
}
