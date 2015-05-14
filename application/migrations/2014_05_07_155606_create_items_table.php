<?php

class Create_Items_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('items',function($table)
                {
                   $table->increments('id');
                   $table->string('barcode');
                   $table->string('name');
                   $table->float('vat');
                   $table->float('cp');
                   $table->float('wsp');
                   $table->float('sp');
                   $table->string('weight');
                   $table->string('unit');
                   $table->integer('qnty');
                   $table->timestamps();
                });
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('items');
	}

}