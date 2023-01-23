<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('image')->nullable();
//            $table->tinyInteger('type')->comment('1=Admin,2=Editor');
            $table->unsignedBigInteger('region_id');
            $table->unsignedBigInteger('country_office_id');
//            $table->integer('platform')->nullable()->comment('1=rapidPro, 2=loGT, 3=both');
            $table->integer('status')->default(1)->comment('1=active, 2=inactive');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
