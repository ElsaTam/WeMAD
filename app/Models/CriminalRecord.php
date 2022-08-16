<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CriminalRecord extends Model
{
    protected $table = 'criminal_records';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'person_id',
        'crimes',
        'most_wanted',
        'aliases',
        'reward',
        'remarks',
        'caution',
        'danger'
    ];

    public function person()
    {
        return $this->belongsTo(App\Models\People\Person::class, 'person_id');
    }
}
