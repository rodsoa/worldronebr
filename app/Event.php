<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    protected $fillable = [
        'name', 'content', 'beginning', 'end', 'address', 'event_category_id'
    ];

    public function category_event()
    {
        return $this->belongsTo('App\EventCategory');
    }
}
