<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTabelCustomer extends Migration
{
	/**
     * Run the migrations.
     *
     * @return void
     */
	public function up()
	{
		Schema::create('customers', function(Blueprint $tabel) {
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
			schema::dropIfExists('customers');
		}
}