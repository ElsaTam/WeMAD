<?php

namespace App\Models\People;

use Parental\HasParent;
use Illuminate\Database\Eloquent\Model;

class UnknownPerson extends Person
{
    use HasParent;
    
    protected $fillable = [
        'type'
    ];
}
