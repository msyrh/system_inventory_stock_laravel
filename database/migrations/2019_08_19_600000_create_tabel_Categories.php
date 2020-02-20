<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTabelCategories extends Migration
{
	/**
     * Run the migrations.
     *
     * @return void
     */
	public function up()
	{
		schema::create('categories',function(Blueprint $tabel){
			$tabel->increments('id');
			$tabel->string('name');
			$tabel->timestamps();
		});
	}
	/**
     * Reverse the migrations.
     *
     * @return void
     */
	public function down()
	{
		schema::dropIfExists('categories');
	}
}