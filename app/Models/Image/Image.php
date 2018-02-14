<?php

namespace App\Models\Image;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table="images";

    public function imageable()
    {
        return $this->morphTo();
    }
}
