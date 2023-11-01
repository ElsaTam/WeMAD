<?php

namespace App\Models\People;

use Parental\HasParent;
use Illuminate\Database\Eloquent\Model;

class Warlock extends Person
{
    use HasParent;

    protected $fillable = [
        'type',
        'group_id',
        'demon_id'
    ];

    public function demon()
    {
        return $this->belongsTo(Demon::class, 'demon_id');
    }
}