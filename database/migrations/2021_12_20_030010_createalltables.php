<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Createalltables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('users', function(Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('cpf')->unique();
            $table->string('password');
        });

        schema::create('units', function(Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('id_owner');
        });

        schema::create('unitpeoples', function(Blueprint $table) {
            $table->id();
            $table->integer('id_unit');
            $table->string('name');
            $table->date('birthdate');
        });

        schema::create('unitvehicles', function(Blueprint $table) {
            $table->id();
            $table->integer('id_unit');
            $table->string('title');
            $table->string('color');
            $table->string('plate');
        });

        schema::create('unitpets', function(Blueprint $table) {
            $table->id();
            $table->integer('id_unit');
            $table->string('name');
            $table->string('race');
        });

        schema::create('walls', function(Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('body');
            $table->datetime('datecreated');
        });

        schema::create('walllikes', function(Blueprint $table) {
            $table->id();
            $table->integer('id_wall');
            $table->integer('id_user');
        });

        schema::create('docs', function(Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('fileurl');
        });

        schema::create('billets', function(Blueprint $table) {
            $table->id();
            $table->integer('id_unit');
            $table->string('title');
            $table->string('fileurl');
        });

        schema::create('warnings', function(Blueprint $table) {
            $table->id();
            $table->integer('id_unit');
            $table->string('title');
            $table->string('status')->default('IN_REVIEW');
            $table->date('datecreated');
            $table->text('photos');
        });

        schema::create('foundandlost', function(Blueprint $table) {
            $table->id();
            $table->string('status')->default('LOST');
            $table->string('photo');
            $table->string('description');
            $table->string('where');
            $table->date('datecreated');
        });

        schema::create('areas', function(Blueprint $table) {
            $table->id();
            $table->integer('allowed')->default(1);
            $table->string('title');
            $table->string('cover');
            $table->string('days');
            $table->time('start_time');
            $table->time('end_time');
        });

        schema::create('areadisableddays', function(Blueprint $table) {
            $table->id();
            $table->integer('id_area');
            $table->date('day');
        });

        schema::create('reservations', function(Blueprint $table) {
            $table->id();
            $table->integer('id_unit')->default(1);
            $table->integer('id_area');
            $table->datetime('reservation_date');
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
        Schema::dropIfExists('units');
        Schema::dropIfExists('unitpeoples');
        Schema::dropIfExists('unitvehicles');
        Schema::dropIfExists('unitpets');
        Schema::dropIfExists('walls');
        Schema::dropIfExists('walllikes');
        Schema::dropIfExists('docs');
        Schema::dropIfExists('billets');
        Schema::dropIfExists('warnings');
        Schema::dropIfExists('founandlost');
        Schema::dropIfExists('areas');
        Schema::dropIfExists('areadisableddays');
        Schema::dropIfExists('reservations');
    }
}
