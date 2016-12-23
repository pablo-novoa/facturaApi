<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ClientMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');

            $table->string('type');
            $table->integer('rut_CI');
            $table->string('nombre');
            $table->string('nombre_fantasia');
            $table->string('departamento');
            $table->string('ciudad');
            $table->string('direccion');
            $table->string('tel');
            $table->string('cel');
            $table->string('email');
            $table->string('nombre_contacto');
            $table->string('tel_contacto');
            $table->string('email_contacto');

            $table->integer('company_id');
            //$table->foreign('company_id')->references('id')->on('companies');

            
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('clients');
    }
}
