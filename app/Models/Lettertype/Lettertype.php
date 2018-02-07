<?php

namespace App\Models\Lettertype;

use App\Models\Citizen\Citizen;
use Illuminate\Database\Eloquent\Model;

class Lettertype extends Model
{
    protected $table = 'letter_types';

    public function citizen(){
        return $this->hasMany(Citizen::class);
    }
}
