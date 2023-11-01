<?php

namespace App\Models\Places;

use Parental\HasParent;
use Illuminate\Database\Eloquent\Model;
use App\Models\People\Human;

class Office extends Place
{
    use HasParent;

    protected $fillable = [
        'type'
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
