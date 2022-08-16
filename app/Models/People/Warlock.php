<?php

namespace App\Models\People;

use Illuminate\Database\Eloquent\Model;

class Warlock extends HiddenHuman
{
    use \App\Models\Child;

    protected $fillable = [
        'demon_id'
    ];

    public function demon()
    {
        return $this->belongsTo(App\Models\People\Demon::class, 'demon_id');
    }
}