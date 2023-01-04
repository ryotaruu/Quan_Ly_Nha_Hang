<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_dishes', function (Blueprint $table) {
            $table->Increments('dishes_id');
            $table->integer('category_id');
            $table->integer('local_id');
            $table->text('dishes_desc');
            $table->text('dishes_content');
            $table->string('dishes_price');
            $table->string('dishes_image');
            $table->integer('dishes_status');
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
        Schema::dropIfExists('tbl_dishes');
    }
};
