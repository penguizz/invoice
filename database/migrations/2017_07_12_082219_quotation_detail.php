<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class QuotationDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('quotation_details', function (Blueprint $table) {
            $table->increments('quotation_detail_id');
            $table->integer('quotation_id');
            $table->string('quotation_detail_part_no');
            $table->string('quotation_description');
            $table->integer('quotation_quantity');
            $table->decimal('quotation_unit_price',10,2);
            $table->decimal('quotation_amount',10,2);
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
        Schema::drop('quotation_detail');
    }
}
