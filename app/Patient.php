<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    public function user(){
      return $this->belongsTo('App\User');
    }

    public function insurance(){
      return $this->belongsTo('App\Insurance');
    }

    public function visit(){
      return $this->hasOne('App\Visit');
    }

}
