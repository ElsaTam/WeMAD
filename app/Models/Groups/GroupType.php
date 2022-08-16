<?php

namespace App\Models\Groups;

use Illuminate\Database\Eloquent\Model;

class GroupType extends Model
{
    protected $table = 'group_types';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'name',
        'leader_alias_m',
        'leader_alias_f',
        'kind'
    ];
}
