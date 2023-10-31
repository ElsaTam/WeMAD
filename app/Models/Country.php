<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Country extends Model
{
    protected $table = 'countries';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'name'
    ];


    // -----------------------------
    //         RELATIONSHIPS
    // -----------------------------

    public function organisations(): BelongsToMany
    {
        return $this->belongsToMany(Organisation::class);
    }


    // -----------------------------
    //           MUTATORS
    // -----------------------------

    public function getNameAttribute($value)
    {
        return $this->disableMutator ? $value : trans('countries.'.$value);
    }
}
