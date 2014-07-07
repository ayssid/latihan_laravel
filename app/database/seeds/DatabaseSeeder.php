<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
                $this->call('SentrySeeder');
                $this->call('AuthorsTableSeeder');
                $this->call('BooksTableSeeder');
		// $this->call('UserTableSeeder');
	}

}
