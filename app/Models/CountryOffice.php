<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryOffice extends Model
{
    use HasFactory;

    protected $fillable = ['name','created_by','updated_by'];

    public function creator(){

        return $this->belongsTo(User::class, 'created_by', 'id')->select('id','name');
    }

}
