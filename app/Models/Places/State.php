<?php

namespace App\Models\Places;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $table = 'states';
    public $incrementing = false;
    protected $keyType = 'string';
    
    protected $fillable = [
        'id',
        'name',
        'council'
    ];
    
    public function offices() {
        return $this->hasMany(Office::class, 'state_id', 'id');
    }
}
