<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('listing_id');
            $table->foreignId('header_id');
            $table->integer('quantity');
            $table->timestamps();

            $table->foreign('listing_id')
                ->references('id')
                ->on('listings');

            $table->foreign('header_id')
                ->references('id')
                ->on('purchase_headers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchase_details');
    }
}
