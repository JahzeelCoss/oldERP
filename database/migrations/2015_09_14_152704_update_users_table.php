<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('address_id')->unsigned()->nullable();           
            $table->foreign('address_id')->references('id')->on('addresses')->onDelete('cascade');
            $table->integer('contact_id')->unsigned()->nullable();           
            $table->foreign('contact_id')->references('id')->on('contacts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('users',function (Blueprint $table){
            $table->dropForeign('users_address_id_foreign');
            $table->dropColumn('address_id');
            $table->dropForeign('users_contact_id_foreign');
            $table->dropColumn('contact_id');
        }); 
    }
}
