<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';

    protected $fillable = [
        'author_id',
        'subject',
        'message',
        'date'
    ];

    public function person()
    {
        return $this->belongsTo(App\Models\People\Human::class, 'author_id');
    }
}
