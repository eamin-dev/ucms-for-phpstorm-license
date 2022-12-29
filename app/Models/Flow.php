<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flow extends Model
{
    use HasFactory;

    public function countryOffice(){

        return $this->belongsTo(CountryOffice::class,'country_office_id','id')->select('id','name');
    }

    public function themeficArea(){

        return $this->belongsTo(ThemeficArea::class,'themefic_area_id','id')->select('id','name');
    }

    public function questions()
    {
        return $this->hasMany(FlowQuestion::class,'flow_id');
    }
}
