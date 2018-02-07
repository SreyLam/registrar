<?php

namespace App\Models\Citizen;
use App\Models\Commune\Commune;
use App\Models\Lettertype\Lettertype;
use Illuminate\Database\Eloquent\Model;

class Citizen extends Model
{ public function commune(){
        return $this->belongsTo(Commune::class);
    }
    public function lettertype(){
        return $this->belongsTo(Lettertype::class);
    }
}
