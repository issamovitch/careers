<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    public function fields(){
        return $this->hasMany("App\Field");
    }
}
