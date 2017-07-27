<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PoDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('po_details', function (Blueprint $table) {
            $table->increments('po_detail_id');
            $table->integer('po_id');
            $table->string('po_detail_part_no');
            $table->string('po_description');
            $table->integer('po_quantity');
            $table->decimal('po_unit_price',10,2);
            $table->decimal('po_amount',10,2);
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
        Schema::drop('po_detail');        
    }
}
