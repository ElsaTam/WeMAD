<?php

namespace App\Models\People;

use Illuminate\Database\Eloquent\Model;
use App\Custom\Date;
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

    public function getAgeAttribute() {
        $this->disableMutator = True;
        $age = $this->birth_date ? Date::parse($this->birth_date)->age() : "N/A";
        $this->disableMutator = False;
        return $age;
    }

    public function getBirthDateAttribute($value)
    {
        return $this->disableMutator ? $value : ($value ? Date::parse($value)->to_string() : "N/A");
    }

    public function getEthnicGroupAttribute($value)
    {
        return $this->disableMutator ? $value : trans('database.'.$value);
    }
}
