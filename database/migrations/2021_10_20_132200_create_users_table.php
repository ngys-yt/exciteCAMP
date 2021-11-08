<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('name',10)->nullable();
            $table->string('email',100)->unique();
            $table->string('password',200)->nullable();
            $table->string('image',200)->nullable();
            $table->string('cover',200)->nullable();
            $table->string('region',5)->nullable();
            $table->string('profile',300)->nullable();
            $table->string('twitter',1000)->nullable();
            $table->string('instagram',1000)->nullable();
            $table->string('facebook',1000)->nullable();
            $table->string('youtube',1000)->nullable();
            $table->string('token',200)->unique()->nullable();
            $table->string('status',30)->nullable();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
