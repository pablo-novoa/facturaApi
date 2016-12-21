<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BillMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('bill_number');
            $table->string('bill_type');
            $table->string('buyer_name');
            $table->integer('buyer_rut');
            $table->string('buyer_address');
            $table->string('buyer_locality');
            $table->boolean('final_consumer');
            $table->text('bill_items');
            $table->string('currency');
            $table->decimal('sub_total', 6, 2);
            $table->decimal('taxes', 6, 2);
            $table->decimal('total', 6, 2);

            $table->integer('company_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('companies');

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
        Schema::drop('bills');
    }
}
