<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class QuotationContact extends Migration
{
    /**
     * Run the migrations.
     *่ืท
     * @return void
     */
    public function up()
    {
        Schema::create('quotation_contacts', function (Blueprint $table) {
            $table->increments('quotation_contact_id');
            $table->integer('quotation_id');
            $table->integer('vendor_id');
            $table->string('quotation_contact_person');
            $table->string('quotation_contact_tel');
            $table->string('quotation_contact_email');
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
        Schema::drop('quotation_contact');        
    }
}
