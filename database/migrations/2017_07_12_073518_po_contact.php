<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PoContact extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('po_contacts', function (Blueprint $table) {
            $table->increments('po_contact_id');
            $table->integer('po_id');
            $table->integer('vendor_id');
            $table->string('po_contact_person');
            $table->string('po_contact_tel');
            $table->string('po_contact_email');
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
        Schema::drop('purchaseorder_contact');
    }
}
