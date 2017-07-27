<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Po extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchaseorders', function (Blueprint $table) {
            $table->increments('po_id');
            $table->integer('vendor_id');
            $table->integer('po_revision');
            // $table->date('po_revision_update');
            $table->string('po_no',13);
            $table->date('po_date');
            $table->string('quotation_no');
            $table->string('po_remark',500);
            $table->decimal('po_sub_total',10,2);
            $table->decimal('po_discount',10,2);
            $table->decimal('po_price_after_discount',10,2);
            // $table->decimal('po_vat_percen',10,2);
            $table->decimal('po_vat_money',10,2);
            $table->decimal('po_total',10,2);
            $table->enum('payment_credit_1',['Y','N'])->default("N");
            $table->enum('payment_credit_2',['Y','N'])->default("N");
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
        Schema::drop('purchaseorders');
        
    }
}
