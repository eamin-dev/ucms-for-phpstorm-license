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
            $table->uuid('uuid')->nullable(false);
            $table->unsignedBigInteger('flow_id');
            $table->string('question_title');
            $table->string('ans_Type')->comment('1=input_answer,2=multiple_answer');
            $table->string('input_answer')->nullable();
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
