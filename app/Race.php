<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    protected $fillable = [
        'time',
        'level'
    ];

    public function participant()
    {
        return $this->belongsTo(Participant::class);
    }


}
