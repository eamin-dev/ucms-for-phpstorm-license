<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlowQuestion extends Model
{
    use HasFactory;

    public function questionanswer()
    {
        return $this->hasMany(FlowQuestionAnswer::class, 'flow_question_id', 'id');
    }

    public function answers()
    {
        return $this->hasMany(FlowQuestionAnswer::class, 'flow_question_id', 'id')->select('id','flow_question_id','answer');
    }
}
