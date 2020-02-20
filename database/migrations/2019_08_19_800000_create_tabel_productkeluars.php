<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTabelProductKeluars extends Migration
{
	/**
     * Run the migrations.
     *
     * @return void
     */
	public function up()
	{
		schema::create('product_keluars',function(Blueprint $tabel){
			$tabel->increments('id');
			$tabel->integer('product_id')->unsigned();
			$tabel->integer('customer_id')->unsigned();
			$tabel->integer('qty');
			$tabel->integer('tanggal');
			$tabel->timestamps();

			$tabel->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
			$tabel->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
		});
	}
	/**
     * Reverse the migrations.
     *
     * @return void
     */
	public function down()
	{
		schema::dropIfExists('product_keluars');
	}
}