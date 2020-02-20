<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTabelSales extends Migration
{
	/**
     * Run the migrations.
     *
     * @return void
     */
	public function up()
	{
		Schema::create('sales',function (Blueprint $tabel){
			$tabel->increments('id');
			$tabel->string('nama');
			$tabel->text('alamat');
			$tabel->string('email');
			$tabel->string('telepon');
			$tabel->timestamps();
		});
	}
	/**
     * Run the migrations.
     *
     * @return void
     */
	public function down()
	{
		Schema::dropIfExists('sales');
	}
}