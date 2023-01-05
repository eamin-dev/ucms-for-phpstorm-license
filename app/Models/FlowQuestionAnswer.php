<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlowQuestionAnswer extends Model
{
    use HasFactory;

    protected $fillable = ['flow_question_id','answer'];
}
