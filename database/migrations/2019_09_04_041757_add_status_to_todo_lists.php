<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusToTodoLists extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      if (Schema::hasTable('todo_lists') ){
        Schema::table('todo_lists', function (Blueprint $table) {
          if (!Schema::hasColumn('todo_lists','status')) {
            $table->integer('status')->after('description');
          }
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
    }
}
