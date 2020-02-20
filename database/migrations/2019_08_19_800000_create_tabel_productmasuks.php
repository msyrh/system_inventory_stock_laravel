<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTabelProductMasuks extends Migration
{
	/**
     * Run the migrations.
     *
     * @return void
     */
	public function up()
	{
		schema::create('productmasuks',function(Blueprint $tabel){
			$tabel->increments('id');
			$tabel->integer('product_id')->unsigned();
			$tabel->integer('supplier_id')->unsigned();
			$tabel->integer('qty');
			$tabel->integer('tanggal');
			$tabel->timestamps();

			$tabel->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
			$tabel->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade');
		});
	}
	/**
     * Reverse the migrations.
     *
     * @return void
     */
	public function down()
	{
		schema::dropIfExists('productmasuks');
	}
}