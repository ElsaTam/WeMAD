<?php

namespace App\Models\People;

use Nanigans\SingleTableInheritance\SingleTableInheritanceTrait;

use Illuminate\Database\Eloquent\Model;
use App\Models\Places\Place;
use App\Models\Photo;
use App\Models\CriminalRecord;

class Person extends Model
{
    use SingleTableInheritanceTrait;
    protected $table = 'people';
    protected static $singleTableTypeField = 'type';
    protected static $singleTableSubclasses = [Human::class, Demon::class];

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

    // -----------------------------
    //         RELATIONSHIPS
    // -----------------------------

    public function place() {
        return $this->belongsTo(Place::class, 'place_id');
    }

    public function photos() {
        return $this->hasMany(Photo::class, 'person_id');
    }

    public function featuredPhoto() {
        return $this->hasOne(Photo::class, 'person_id');
    }

    public function criminalRecord() {
        return $this->hasOne(CriminalRecord::class, 'person_id');
    }


    // -----------------------------
    //           MUTATORS
    // -----------------------------

    public function getSexAttribute($value)
    {
        return trans('database.'.$value);
    }

    public function getTypeAttribute($value)
    {
        return trans('database.'.$value);
    }
}
