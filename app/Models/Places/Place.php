<?php

namespace App\Models\Places;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $table = 'places';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'name',
        'boss_id',
        'state_id'
    ];

    public function boss()
    {
        return $this->hasOne(App\Models\People\Human::class, 'id', 'boss_id');
    }
    
    public function state()
    {
        return $this->belongsTo(App\Models\Places\State::class, 'state_id');
    }
}
