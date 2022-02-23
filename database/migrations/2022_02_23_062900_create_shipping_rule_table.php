<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingRuleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_rule', function (Blueprint $table) {
            $table->id();
            $table->string('minimum_weight');
            $table->string('maximum_weight');
            $table->string('parcel_route');
            $table->string('delivery_types');
            $table->dateTime('expire_date');
            $table->string('shipping_cost');

            $table->string('status')->nullable();
            $table->string('active')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
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
        Schema::dropIfExists('shipping_rule');
    }
}
