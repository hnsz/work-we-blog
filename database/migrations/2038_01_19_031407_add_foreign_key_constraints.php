<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyConstraints extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        //
        Schema::table('posts',  function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        }); 

        Schema::table('comments', function (Blueprint $table) {
             $table->foreign('commentthread_id')->references('id')->on('commentthreads')->ondelete('cascade');
             $table->foreign('user_id')->references('id')->on('users')->ondelete('cascade');
        });
        Schema::table('commentthreads', function (Blueprint $table) {
            $table->foreign('threadstarter_id')->references('id')->on('threadstarters')->ondelete('cascade');
       });
       Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::disableForeignKeyConstraints();
    }
}

 

