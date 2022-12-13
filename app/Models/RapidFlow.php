<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RapidFlow extends Model
{
    use HasFactory;

    protected $fillable =[ 'question_title',
                            'ans_type',
                            'multiple_answer',
                            'input_answer',
                            'checkbox_answer'];
}
