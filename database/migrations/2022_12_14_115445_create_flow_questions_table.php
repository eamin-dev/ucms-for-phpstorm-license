<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlowQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flow_questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('flow_id')->constrained('flows')->cascadeOnDelete();
            $table->string('question_title');
            $table->string('ans_Type')->comment('1=input_answer,2=multiple_answer');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flow_questions');
    }
}
