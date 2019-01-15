<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        if(!Schema::hasTable('notifications'))
        {
            Schema::create('notifications', function (Blueprint $table) {
                $table->increments('id')->unsigned();
                $table->integer('order_id')->unsigned();
                $table->integer('user_id')->unsigned();
                $table->string('message');
                $table->integer('order_statue');
                $table->timestamps();
         });
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('notifications');
    }
}
