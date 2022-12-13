<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRapidFlowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rapid_flows', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('question_title');
            $table->string('ans_Type');
            $table->string('multiple_answer')->nullable();
            $table->string('input_answer')->nullable();
            $table->string('checkbox_answer')->nullable();
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
        Schema::dropIfExists('rapid_flows');
    }
}
