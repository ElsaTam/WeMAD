<?php

namespace App\Models\People;

use Illuminate\Database\Eloquent\Model;

class Human extends Person
{
    use \App\Models\Child;

    protected $fillable = [
        'birth_date',
        'birth_place',
        'hair',
        'eyes',
        'ethnic_group',
        'status',
        'languages',
        'place_id'
    ];

    /**
     * Get the place associated with the person.
    */
    public function place()
    {
        return $this->belongsTo(App\Models\Places\Place::class, 'place_id');
    }

    
    public function messages() {
        return $this->hasMany(App\Models\Message::class, 'author_id');
    }
}
