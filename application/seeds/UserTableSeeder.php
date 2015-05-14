<?php
class UserTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('users')->delete();
		User::create(array(
			'username' => 'admin',
			'password' => Hash::make('pass'),
			'type' => '1',
			'del' => '0'
			));
		}
}