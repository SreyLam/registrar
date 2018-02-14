<?php

namespace App\Models\Citizen;
use App\Models\Commune\Commune;
use App\Models\Gender\Gender;
use App\Models\Lettertype\Lettertype;
use Illuminate\Database\Eloquent\Model;

class Citizen extends Model
{
    public function commune(){
        return $this->belongsTo(Commune::class);
    }

    public function lettertype(){
        return $this->belongsTo(Lettertype::class);
    }

    public function gender_cityzen(){
        return $this->belongsTo(Gender::class, 'gender');
    }
}
