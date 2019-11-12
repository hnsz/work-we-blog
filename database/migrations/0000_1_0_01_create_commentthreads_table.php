<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentthreadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commentthreads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('threadstarter_id');
            $table->timestamps();
            $table->string('thread_namespace')->default("/");
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commentthreads');
    }
}
