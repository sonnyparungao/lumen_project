<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('user_id');
            $table->tinyInteger('account_type')->default('0')->comment = 'Account Types 1=admin,2=client,3=default user';
            $table->string('email')->unique();
            $table->string('firstname');
            $table->string('lastname');
            $table->integer('created_by')->default('0');
            $table->tinyInteger('active')->default('1')->comment = 'active user=1, inactive=0';
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
