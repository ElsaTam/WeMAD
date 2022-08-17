<?php

namespace App\Models\People;

use Illuminate\Database\Eloquent\Model;
use App\Models\Places\Place;
use App\Models\Message;

class Human extends Person
{
    protected static $singleTableSubclasses = [HiddenHuman::class];
    protected static $singleTableType = 'human';

    protected $fillable = [
        'birth_date',
        'birth_place',
        'hair',
        'eyes',
        'ethnic_group',
        'status',
        'languages',
        'place_id'
    ];

    // -----------------------------
    //         RELATIONSHIPS
    // -----------------------------

    public function place()
    {
        return $this->belongsTo(Place::class, 'place_id');
    }

    
    public function messages() {
        return $this->hasMany(Message::class, 'author_id');
    }


    // -----------------------------
    //           MUTATORS
    // -----------------------------

    public function getIsPrisonerAttribute() {
        return $this->status == "prisoner" && ! $this->dead;
    }

    public function getIsWantedAttribute() {
        return $this->status == "wanted" && ! $this->dead;
    }

    public function getIsMissingAttribute() {
        return $this->status == "missing" && ! $this->dead;
    }

    public function getEthnicGroupAttribute($value)
    {
        return $this->disableMutator ? $value : trans('database.'.$value);
    }
}
