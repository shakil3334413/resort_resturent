<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('category_id');
            // $table->foreign('category_id')->references('id')->on('categories')
            //         ->onDelete('cascade')
            //         ->onUpdate('cascade');
            $table->unsignedInteger('subcategory_id');
            // $table->foreign('subcategory_id')->references('id')->on('sub_categories')
            //         ->onDelete('cascade')
            //         ->onUpdate('cascade');
            $table->unsignedInteger('brand_id');
            // $table->foreign('brand_id')->references('id')->on('brands')
            //         ->onDelete('cascade')
            //         ->onUpdate('cascade');
            $table->double('single_price',15,2);
            $table->double('quntity',15,2);
            $table->unsignedInteger('item_id');
            $table->double('total_price',15,2);
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('stocks');
    }
}
