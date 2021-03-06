<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymeInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payme_infos', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->bigInteger('amount')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('time')->nullable();
            $table->string('perform_time')->nullable();
            $table->string('cancel_time')->nullable();
            $table->integer('state')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payme_infos');
    }
}
