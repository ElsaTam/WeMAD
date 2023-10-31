<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Organisation extends Model
{
    protected $table = 'organisations';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'name',
        'name_fr',
        'acronym',
        'danger_level',
        'security_index',
        'part_of_ugb',
        'description'
    ];


    // -----------------------------
    //         RELATIONSHIPS
    // -----------------------------

    public function countries(): BelongsToMany
    {
        return $this->belongsToMany(Country::class);
    }
}
