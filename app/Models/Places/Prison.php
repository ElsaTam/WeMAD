<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prison extends Place
{
    use \App\Models\Child;

    protected $fillable = [
        'security_level'
    ];
    
    public function agents()
    {
        return $this->hasMany(App\Models\People\Human::class, 'place_id', 'id')
            ->where('people.status', '=', 'agent')
            ->orderBy('people.last_name')
            ->orderBy('people.first_name');
    }
    
    public function prisoners()
    {
        return $this->hasMany(App\Models\People\Person::class, 'place_id', 'id')
            ->where('people.status', '=', 'prisoners')
            ->orderBy('people.last_name')
            ->orderBy('people.first_name');
    }
}
