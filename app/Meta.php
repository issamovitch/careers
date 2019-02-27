<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meta extends Model
{
    public function field(){
        return $this->belongsTo("App\Field", "field_id");
    }
}
