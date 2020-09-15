<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'surname',
        'number',
        'age_group'
    ];

    public function races()
    {
        return $this->hasMany(Race::class, 'participant_id');
    }
}
