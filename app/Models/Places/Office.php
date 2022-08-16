<?php

namespace App\Models\Places;

use Illuminate\Database\Eloquent\Model;

class Office extends Place
{
    use \App\Models\Child;

    protected $fillable = [
        
    ];

    public function agents()
    {
        return $this->hasMany(App\Models\People\Human::class, 'place_id', 'id')
            ->where('people.status', '=', 'agent')
            ->orderBy('people.last_name')
            ->orderBy('people.first_name');
    }
}
