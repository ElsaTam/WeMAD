<?php

namespace App\Models\People;

use Illuminate\Database\Eloquent\Model;

class Werewolf extends HiddenHuman
{
    protected static $singleTableType = 'werewolf';

    protected $fillable = [
        
    ];
}
