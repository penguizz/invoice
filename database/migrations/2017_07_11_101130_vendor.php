<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Vendor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->increments('vendor_id');
            $table->enum('vendortype',['customer','supplier']);
            $table->string('company_name_th');
            $table->string('company_name_en');
            $table->string('company_address_th',500);
            $table->string('company_address_en',500);
            $table->string('post');
            $table->string('country');
            $table->string('taxid');
            $table->string('company_tel');
            $table->string('company_fax');
            $table->string('credit');
            $table->string('payment_term');
            $table->string('customer_billing_document',500);
            $table->string('customer_cheuqe_document',500);
            $table->string('due_billing');
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
        Schema::drop('vendors');
        
    }
}
