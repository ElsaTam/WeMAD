<?php

namespace App\Models\Places;

use Nanigans\SingleTableInheritance\SingleTableInheritanceTrait;

use Illuminate\Database\Eloquent\Model;
use App\Models\People\Human;

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

    protected $disableMutator = False;

    public function getFullNameAttribute()
    {
        return $this->name.', '.$this->state->name.' ('.$this->state_id.')';
    }

    public function getLinkAttribute()
    {
        $this->disableMutator = True;
        $link = $this->type.'s/'.$this->id;
        $this->disableMutator = False;
        return $link;
    }

    public function getIsOfficeAttribute()
    {
        $this->disableMutator = True;
        $is_office = $this->type == "office";
        $this->disableMutator = False;
        return $is_office;
    }

    public function getIsPrisonAttribute()
    {
        $this->disableMutator = True;
        $is_office = $this->type == "prison";
        $this->disableMutator = False;
        return $is_office;
    }

    public function getTypeAttribute($value)
    {
        return $this->disableMutator ? $value : trans('database.'.$value);
    }
}
