<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update01UsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('phone')->nullable();
            $table->date('birthday')->nullable();
            $table->boolean('sex')->nullable();
            $table->text('avatar')->nullable();
            $table->string('address')->nullable();
            $table->string('part')->nullable();
            $table->date('day_in')->nullable();
            $table->integer('salary_day')->nullable();
            $table->string('role')->nullable();
            $table->SoftDeletes();
            $table->string('info')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('phone');
            $table->dropColumn('birthday');
            $table->dropColumn('sex');
            $table->dropColumn('avatar');
            $table->dropColumn('address');
            $table->dropColumn('part');
            $table->dropColumn('day_in');
            $table->dropColumn('salary_day');
            $table->dropColumn('role');
            $table->dropColumn('info');
        });
    }
}
