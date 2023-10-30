<?php

namespace App\Models\Records;

use Illuminate\Database\Eloquent\Model;
use App\Models\People\Person;

class CriminalRecord extends Model
{
    protected $table = 'criminal_records';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'person_id',
        'most_wanted',
        'aliases',
        'reward',
        'remarks',
        'caution',
        'danger'
    ];

    // -----------------------------
    //         RELATIONSHIPS
    // -----------------------------

    public function person()
    {
        return $this->belongsTo(Person::class, 'person_id');
    }

    public function crimes()
    {
        return $this->hasMany(Crime::class, 'person_id', 'person_id');
    }


    // -----------------------------
    //           MUTATORS
    // -----------------------------
}
