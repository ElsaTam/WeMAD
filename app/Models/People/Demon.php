<?php

namespace App\Models\People;

use Illuminate\Database\Eloquent\Model;

class Demon extends Person
{
    protected static $singleTableType = 'demon';
    
    protected $fillable = [
        
    ];

    public function warlocks()
    {
        return $this->hasMany(Warlock::class, 'demon_id', 'id');
    }
}
