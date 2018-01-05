<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->integer('status_id')->unsigned()->nullable();           
            $table->foreign('status_id')->references('id')->on('status')->onDelete('cascade');
            $table->integer('task_id')->unsigned()->nullable();           
            $table->foreign('task_id')->references('id')->on('tasks')->onDelete('cascade');
            $table->integer('project_id')->unsigned()->nullable();           
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropForeign('tasks_status_id_foreign');
            $table->dropColumn('status_id');
            $table->dropForeign('tasks_task_id_foreign');
            $table->dropColumn('task_id');
            $table->dropForeign('tasks_project_id_foreign');
            $table->dropColumn('project_id');
        });
    }
}
