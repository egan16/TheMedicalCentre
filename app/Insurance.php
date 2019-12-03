<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Insurance extends Model
{
    public function patient(){
      return $this->hasOne('App\Patient');
    }
}
