<?php

namespace App\Models\Places;

use Illuminate\Database\Eloquent\Model;
use App\Models\People\Human;

class Office extends Place
{
    protected static $singleTableType = 'office';

    protected $fillable = [
        
    ];

    // -----------------------------
    //         RELATIONSHIPS
    // -----------------------------

    public function agents()
    {
        return $this->hasMany(Human::class, 'place_id', 'id')
            ->where('people.status', '=', 'agent')
            ->orderBy('people.last_name')
            ->orderBy('people.first_name');
    }
}
