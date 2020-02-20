<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTabelProducts extends Migration
{
	/**
     * Run the migrations.
     *
     * @return void
     */
	public function up()
	{
		schema::create('products',function(Blueprint $tabel){
			$tabel->increments('id');
			$tabel->integer('category_id')->unsigned();
			$tabel->string('nama');
			$tabel->integer('harga');
			$tabel->string('image');
			$tabel->integer('qty');
			$tabel->timestamps();
			$tabel->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
		});
	}
	/**
     * Reverse the migrations.
     *
     * @return void
     */
	public function down()
	{
		schema::dropIfExists('products');
	}
}