<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChecklistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checklists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('ordered_date');
            $table->integer('order_id');
            $table->integer('ordered_product_total_price');
            $table->integer('customer_cd')->length(7)->nullable();
            $table->string('contact')->nullable();
            $table->date('contact_date')->nullable();
            $table->string('payment_confirmation')->nullable();
            $table->date('payment_confirmaton_date')->nullable();
            $table->string('shipping')->nullable();
            $table->date('shipping_date')->nullable();
            $table->string('remarks')->nullable();
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
        Schema::dropIfExists('checklists');
    }
}
