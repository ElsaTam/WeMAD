<?php

namespace App\Models\Records;

use Illuminate\Database\Eloquent\Model;
use App\Models\People\Person;

class Crime extends Model
{
    protected $table = 'crimes';
    public $incrementing = true;
    protected $keyType = 'integer';

    protected $fillable = [
        'person_id',
        'charge',
        'city',
        'date',
        'disposition'
    ];

    // -----------------------------
    //         RELATIONSHIPS
    // -----------------------------

    public function person()
    {
        return $this->belongsTo(Person::class, 'person_id');
    }

    public function criminalRecord()
    {
        return $this->belongsTo(CriminalRecord::class, 'person_id', 'person_id');
    }

    public function prisonerRecord()
    {
        return $this->belongsTo(PrisonerRecord::class, 'person_id', 'person_id');
    }


    // -----------------------------
    //           MUTATORS
    // -----------------------------

    protected $disableMutator = False;

    public function getDispositionAttribute($value)
    {
        return $this->disableMutator ? $value : trans('database.'.$value);
    }
}
