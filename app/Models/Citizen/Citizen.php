<?php

namespace App\Models\Citizen;
use App\Models\Commune\Commune;
use App\Models\Gender\Gender;
use App\Models\Lettertype\Lettertype;
use Illuminate\Database\Eloquent\Model;

class Citizen extends Model
{


    public $fillable = ['commune_id','number_list','number_book','lettertype_id','name','father_name','mother_name','date_birth'
        ,'child_order','gender','year','place_birth','f_place_birth','m_place_birth','m_place_birth','other'];

    public function commune()
    {
        return $this->belongsTo(Commune::class);
    }

    public function lettertype()
    {
        return $this->belongsTo(Lettertype::class);
    }

    public function gender_cityzen(){
        return $this->belongsTo(Gender::class, 'gender_id');
    }


    public function images(){
        return $this->morphMany('App\Models\Image\Image', 'imageable');
    }

//



}
