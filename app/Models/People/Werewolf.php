<?php

namespace App\Models\People;

use Illuminate\Database\Eloquent\Model;

class Werewolf extends HiddenHuman
{
    use \App\Models\Child;

    protected $fillable = [
        
    ];
}
