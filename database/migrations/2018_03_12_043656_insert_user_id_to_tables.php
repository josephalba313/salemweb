<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertUserIdToTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('baptismals', function (Blueprint $table) {
            $table->integer('user_id')->nullable();
            $table->string('requirement')->nullable();
            $table->boolean('approved')->default(0)->nullable();
            $table->integer('approved_user_id')->nullable();
            $table->string('certificate')->nullable();
            $table->string('photo')->nullable();
        });
        Schema::table('dedications', function (Blueprint $table) {
            $table->integer('user_id');
            $table->string('requirement')->nullable();
            $table->boolean('approved')->default(0)->nullable();
            $table->integer('approved_user_id')->nullable();
            $table->string('certificate')->nullable();
            $table->string('photo')->nullable();
        });

        Schema::table('funerals', function (Blueprint $table) {
            $table->integer('user_id');
            $table->string('requirement')->nullable();
            $table->boolean('approved')->default(0)->nullable();
            $table->integer('approved_user_id')->nullable();
            $table->string('certificate')->nullable();
            $table->string('photo')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('baptismals', function (Blueprint $table) {
            $table->dropColumn('user_id');
            $table->dropColumn('requirement');
            $table->dropColumn('approved');
            $table->dropColumn('approved_user_id');
            $table->dropColumn('certificate');
            $table->dropColumn('photo');
        });

        Schema::table('dedications', function (Blueprint $table) {
            $table->dropColumn('user_id');
            $table->dropColumn('requirement');
            $table->dropColumn('approved');
            $table->dropColumn('approved_user_id');
            $table->dropColumn('certificate');
            $table->dropColumn('photo');
        });

        Schema::table('funerals', function (Blueprint $table) {
            $table->dropColumn('user_id');
            $table->dropColumn('requirement');
            $table->dropColumn('approved');
            $table->dropColumn('approved_user_id');
            $table->dropColumn('certificate');
            $table->dropColumn('photo');
        });
    }
}
