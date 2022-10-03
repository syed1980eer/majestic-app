<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinkedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('linkeds', function (Blueprint $table) {
            $table->id();
            $table->string('linked_unq_id');
            $table->foreignId('customer_id')->constrained();
            $table->foreignId('product_id')->constrained();
            $table->foreignId('item_id')->constrained();
            $table->string('supplier_ref_no');
            $table->string('supplier_barcode');
            $table->string('item_image', 300);
            $table->decimal('item_cost');
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
        Schema::dropIfExists('linkeds');
    }
}
