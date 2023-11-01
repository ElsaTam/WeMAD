<?php

namespace App\Models\Places;

use Parental\HasParent;
use Illuminate\Database\Eloquent\Model;
use App\Models\People\Person;
use App\Models\People\Human;

class Prison extends Place
{
    use HasParent;

    protected $fillable = [
        'security_level'
    ];
    
    public function agents()
    {
        return $this->hasMany(Human::class, 'place_id', 'id')
            ->where('people.status', '=', 'agent')
            ->orderBy('people.last_name')
            ->orderBy('people.first_name');
    }
    
    public function prisoners()
    {
        return $this->hasMany(Person::class, 'place_id', 'id')
            ->where('people.status', '=', 'prisoners')
            ->orderBy('people.last_name')
            ->orderBy('people.first_name');
    }
}
