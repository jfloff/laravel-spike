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
                'username' => 'firstuser',
                'password' => Hash::make('first_password'),
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ]
        );
        User::create(
            [
                'username' => 'seconduser',
                'password' => Hash::make('second_password'),
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ]
        );
	}
}
