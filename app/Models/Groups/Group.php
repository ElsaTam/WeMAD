<?php

namespace App\Models\Groups;

use Illuminate\Database\Eloquent\Model;

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

    public function type()
    {
        return $this->belongsTo(App\Models\Groups\GroupType::class, 'group_type_id');
    }

    /**
     * Get the leader that owns the group.
     */
    public function leader()
    {
        return $this->hasOne(App\Models\People\HiddenHuman::class, 'id', 'leader_id');
    }

    /**
     * Get the office managing the group (as a place).
    */
    public function office()
    {
        return $this->belongsTo(App\Models\Places\Office::class, 'office_id');
    }

    public function members()
    {
        switch ($this->type->id) {
            case "circle":
                return $this->hasMany(App\Models\People\Warlock::class, 'group_id', 'id');
            case "clan":
                return $this->hasMany(App\Models\People\Vampire::class, 'group_id', 'id');
            case "pack":
                return $this->hasMany(App\Models\People\Werewolf::class, 'group_id', 'id');
        }
    }
}
