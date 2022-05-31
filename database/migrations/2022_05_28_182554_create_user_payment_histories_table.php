<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPaymentHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_payment_histories', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('click_trans_id');
            $table->bigInteger('service_id');
            $table->string('merchant_trans_id');
            $table->float('amount');
            $table->bigInteger('merchant_prepare_id');
            $table->bigInteger('click_paydoc_id');
            $table->bigInteger('status_error');
            $table->bigInteger('action');
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
        Schema::dropIfExists('user_payment_histories');
    }
}
