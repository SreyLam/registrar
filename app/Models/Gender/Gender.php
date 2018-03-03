<?php

namespace App\Models\Gender;
use App\Models\Citizen\Citizen;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    public function citizens(){
        return $this->hasMany(Citizen::class);
    }
}
