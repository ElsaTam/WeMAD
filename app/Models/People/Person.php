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
    protected static $singleTableType = 'unknown';

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

    protected $disableMutator = False;

    public function getFirstLastNameAttribute()
    {
        return $this->first_name." ".strtoupper($this->last_name);
    }

    public function getTitleAttribute()
    {
        $this->disableMutator = True;
        $title = $this->sex == "male" ? "Mr." : "Mme.";
        $this->disableMutator = False;
        return $title;
    }

    public function getLinkAttribute()
    {
        $this->disableMutator = True;
        $link = "#";
        if ($this->status == "wanted") {
            $link = 'wanteds/fugitives/'.$this->id;
        }
        elseif ($this->status == "missing") {
            $link = 'wanteds/missings/'.$this->id;
        }
        else {
            $link = $this->status.'s/'.$this->id;
        }
        $this->disableMutator = False;
        return $link;
    }

    public function getLastFirstNameAttribute()
    {
        return strtoupper($this->last_name)." ".$this->first_name;
    }

    public function getSexAttribute($value)
    {
        return $this->disableMutator ? $value : trans('database.'.$value);
    }

    public function getTypeAttribute($value)
    {
        return $this->disableMutator ? $value : trans('database.'.$value);
    }
}
