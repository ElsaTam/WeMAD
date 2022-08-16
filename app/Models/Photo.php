<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $table = 'photos';
    public $incrementing = false;
    protected $keyType = 'string';
    
    /**
     * Get the person that owns the photo.
    */
    public function person() {
        return $this->belongsTo(App\Models\People\Person::class, 'person_id');
    }
}
