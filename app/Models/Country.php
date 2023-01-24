<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = ['region_id', 'name', 'code'];

    public function flows(){
        return $this->hasMany(Flow::class,'country_id');
    }
}
