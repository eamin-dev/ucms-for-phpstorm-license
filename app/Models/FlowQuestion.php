<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlowQuestion extends Model
{
    use HasFactory;

<<<<<<< HEAD
    public function questionanswer(){

        return $this->hasMany(FlowQuestionAnswer::class,'flow_question_id','id');
=======
    public function answers()
    {
        return $this->hasMany(FlowQuestionAnswer::class,'flow_question_id');
>>>>>>> 983269dd0d9d5b4dc89be6b06380c576edee731b
    }
}
