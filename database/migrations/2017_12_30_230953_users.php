<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Users extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('login', 100)->unique();
            $table->string('firstname', 100)->nullable(false);
            $table->string('company_name', 100);
            $table->string('lastname', 100)->nullable(false);
            $table->string('password', 100)->nullable(false);
            $table->enum('civility', ['MR', 'MRS']);
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('emails', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email', 100)->nullable(false)->unique();
            $table->enum('type', ["PERSONAL", "PROFESSIONAL"])->nullable(false);
            $table->timestamp('validated_at', 0)->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->integer('user_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users');
        });
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('type', ["PERSONAL", "PROFESSIONAL"])->nullable(false);
            $table->string('name', 100)->nullable(false);
            $table->string('street_number', 10);
            $table->string('route', 150);
            $table->string('locality', 150);
            $table->string('postal_code', 50);
            $table->string('administrative_area_level_1', 150);
            $table->string('country', 100)->nullable(false);
            $table->timestamps();
            $table->softDeletes();
            $table->integer('user_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::enableForeignKeyConstraints();
        Schema::dropIfExists('addresses');
        Schema::dropIfExists('emails');
        Schema::dropIfExists('users');
        Schema::disableForeignKeyConstraints();
    }
}
