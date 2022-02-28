<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDachasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dachas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')
                ->references('id')->on('categories');
            $table->string('name_uz');
            $table->string('name_ru');
//            $table->text('comforts_uz'); // qulayliklari
//            $table->text('comforts_ru'); // qulayliklari
            $table->integer('room_count');
            $table->integer('bathroom_count');
            $table->integer('capacity'); //odamlar soni
            $table->bigInteger('cost');
            $table->bigInteger('phone')->nullable();
            $table->boolean('top_rated')->default(false);
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
        Schema::dropIfExists('dachas');
    }
}
