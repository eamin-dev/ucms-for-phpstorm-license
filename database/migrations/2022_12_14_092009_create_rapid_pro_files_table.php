<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRapidProFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rapid_pro_files', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('country_office_id');
            $table->dateTime('datetime')->nullable();
            $table->string('file_id');
            $table->unsignedBigInteger('themefic_area_id');
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
        Schema::dropIfExists('rapid_pro_files');
    }
}
