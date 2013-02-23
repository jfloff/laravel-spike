<?php

class UsersTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('users')->delete();

        User::create(
            [
                'username' => 'test',
                'password' => Hash::make('test_password'),
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ]
        );
	}
}
