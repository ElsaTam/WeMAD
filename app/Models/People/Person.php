<?php

namespace App\Models\People;

use Illuminate\Database\Eloquent\Model;
use App\Models\Places\Place;
use App\Models\Photo;
use App\Models\CriminalRecord;

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

    public function place() {
        return $this->belongsTo(Place::class, 'place_id');
    }

    /**
     * Get the photos associated with the person.
    */
    public function photos() {
        return $this->hasMany(Photo::class, 'person_id');
    }

    /**
     * Get the first photo associated with the person.
    */
    public function featuredPhoto() {
        return $this->hasOne(Photo::class, 'person_id');
    }

    public function criminalRecord() {
        return $this->hasOne(CriminalRecord::class, 'person_id');
    }
}
