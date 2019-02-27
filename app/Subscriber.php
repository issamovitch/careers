<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    public function metas(){
        return $this->hasMany("App\Meta", "subscriber_id");
    }
    
    public function job(){
        return $this->belongsTo("App\Job");
    }
}
