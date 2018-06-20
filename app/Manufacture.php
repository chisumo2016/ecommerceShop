<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manufacture extends Model
{
    //
    protected  $fillable =[
        'manufacture_name',
        'manufacture_description',
        'publication_status'
    ];

    public function products()
    {
        return $this->hasMany('App\Product');
    }

}
