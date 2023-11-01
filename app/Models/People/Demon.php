<?php

namespace App\Models\People;

use Parental\HasParent;
use Illuminate\Database\Eloquent\Model;

class Demon extends Person
{
    use HasParent;
    
    protected $fillable = [
        'type'
    ];

    public function warlocks()
    {
        return $this->hasMany(Warlock::class, 'demon_id', 'id');
    }
}
