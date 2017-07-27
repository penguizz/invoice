<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Quotation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotations', function (Blueprint $table) {
            $table->increments('quotation_id');
            $table->integer('vendor_id');
            $table->string('quotation_no',15);
            $table->integer('quotation_revision');
            $table->date('quotation_date');
            // $table->date('quotation_revision_update');
            // $table->string('quotation_remark',500);
            $table->decimal('quotation_sub_total',10,2);
            // $table->decimal('quotation_vat_percen',10,2);
            $table->decimal('quotation_vat_money',10,2);
            $table->decimal('quotation_total',10,2);
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
        Schema::drop('quotations');
    }
}
