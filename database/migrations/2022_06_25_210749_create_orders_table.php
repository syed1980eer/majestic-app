<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_unq_id');
            $table->string('customerName_input');
            $table->foreignId('linked_id')->constrained();
            $table->json('product_name_input');
            $table->json('item_name_input');
            $table->json('item_no_input');
            $table->json('item_description_input');
            $table->json('supplier_ref_no_input');
            $table->json('supplier_barcode_input');
            $table->json('item_cost_input');
            $table->json('item_quantity');
            $table->json('itemTotal_input');
            $table->decimal('subtotal_input');
            $table->decimal('tax_input');
            $table->decimal('total');
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
        Schema::dropIfExists('orders');
    }
}
