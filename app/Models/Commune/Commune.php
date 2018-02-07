<?php

namespace App\Models\Commune;

use App\Models\Citizen\Citizen;
use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    public function citizen(){
        return $this->hasOne(Citizen::class);
    }

}
