<?php

namespace App\Models\Records;

use Illuminate\Database\Eloquent\Model;
use App\Models\People\Person;

class PrisonerRecord extends Model
{
    protected $table = 'prisoner_records';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'person_id',
        'entry_date',
        'sentence',
        'psychological_notes',
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
}
