<?php

namespace App\Models\People;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table = 'people';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'kind',
        'first_name',
        'last_name',
        'sex',
        'height',
        'weight',
        'dead'
    ];

    /**
     * Get the photos associated with the person.
    */
    public function photos() {
        return $this->hasMany(App\Models\Photo::class, 'person_id');
    }

    /**
     * Get the first photo associated with the person.
    */
    public function featuredPhoto() {
        return $this->hasOne(App\Models\Photo::class, 'person_id');
    }

    public function criminalRecord() {
        return $this->hasOne(App\Models\CriminalRecord::class, 'person_id');
    }
}
