<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertFirstnameToProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->string('firstname')->nullable();
            $table->string('middlename')->nullable();
            $table->string('lastname')->nullable();
            $table->date('birthday')->nullable();
            $table->string('gender')->nullable();
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->string('cellphone')->nullable();
            $table->string('telephone')->nullable();
        });


        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->dropColumn('firstname');
            $table->dropColumn('middlename');
            $table->dropColumn('lastname');
            $table->dropColumn('birthday');
            $table->dropColumn('gender');
            $table->dropColumn('address1');
            $table->dropColumn('address2');
            $table->dropColumn('cellphone');
            $table->dropColumn('telephone');
        });
        //
    }
}
