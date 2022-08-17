<?php

namespace App\Models\Places;

use Nanigans\SingleTableInheritance\SingleTableInheritanceTrait;

use Illuminate\Database\Eloquent\Model;
use App\Models\People\Human;
use App\Models\Places\State;

class Place extends Model
{
    use SingleTableInheritanceTrait;
    protected $table = 'places';
    protected static $singleTableTypeField = 'type';
    protected static $singleTableSubclasses = [Office::class, Prison::class];

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'name',
        'boss_id',
        'state_id'
    ];

    // -----------------------------
    //         RELATIONSHIPS
    // -----------------------------

    public function boss()
    {
        return $this->hasOne(Human::class, 'id', 'boss_id');
    }
    
    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }


    // -----------------------------
    //           MUTATORS
    // -----------------------------

    public function getFullNameAttribute()
    {
        return $this->name.', '.$this->state->name.' ('.$this->state_id.')';
    }

    public function getTypeAttribute($value)
    {
        return trans('database.'.$value);
    }
}
