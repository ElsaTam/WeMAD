<?php

namespace App\Models\People;

use Illuminate\Database\Eloquent\Model;

class Warlock extends HiddenHuman
{
    protected static $singleTableType = 'warlock';

    protected $fillable = [
        'demon_id'
    ];

    public function demon()
    {
        return $this->belongsTo(Demon::class, 'demon_id');
    }
}