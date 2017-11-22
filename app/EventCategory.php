<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventCategory extends Model
{
<<<<<<< HEAD
    protected $fillable = ['name', 'price'];
=======
    public function events()
    {
        return $this->hasMany('App\Event');
    }
>>>>>>> 32bcc226bb612339012fa7a6e10ef926bc5dea68
}
