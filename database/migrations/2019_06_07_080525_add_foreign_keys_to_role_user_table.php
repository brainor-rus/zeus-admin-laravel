<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToRoleUserTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::table('role_user', function(Blueprint $table)
//        {
//            $table->foreign('role_id', 'role_user_fk0')->references('id')->on('roles')->onUpdate('RESTRICT')->onDelete('RESTRICT');
//            $table->foreign('user_id', 'role_user_fk1')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
//        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::table('role_user', function(Blueprint $table)
//        {
//            $table->dropForeign('role_user_fk0');
//            $table->dropForeign('role_user_fk1');
//        });
    }

}