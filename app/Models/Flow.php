<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flow extends Model
{
    use HasFactory;

    public function countryOffice(){

        return $this->belongsTo(Country::class,'country_id','id');
    }

    public function themeficArea(){

        return $this->belongsTo(ThemeficArea::class,'themefic_area_id','id');
    }

    public function questions()
    {
        return $this->hasMany(FlowQuestion::class,'flow_id');
    }

    public function creator(){
        return $this->belongsTo(User::class,'created_by');
    }
}
