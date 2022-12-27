<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlowQuestion extends Model
{
    use HasFactory;

    public function answers()
    {
        return $this->hasMany(FlowQuestionAnswer::class,'flow_question_id');
    }
}
