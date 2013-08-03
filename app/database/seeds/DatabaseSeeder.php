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

		$this->call('UsersTableSeeder');
	}

}

class UsersTableSeeder extends Seeder {
    public function run()
    {

        $now = date('U-m-d H:i:s');

        $users = array(

                        array(
                              'email' => 'johnsmith@example.com',
                              'password' => Hash::make('johnlikessoup'),
                              'phone' => '5555555555',
                              'first_name' => 'John',
                              'last_name' => 'Smith',
                              'street_address' => '555 Example Road',
                              'city' => 'Example City',
                              'state' => 'NY',
                              'zip_code' => '55555',
                              'stay_logged_in' => 1,
                              'active' => 1,
                              'created_at' => $now,
                              'updated_at' => $now
                              ),
                        array(
                              'email' => 'afterschoolprograms@live.com',
                              'password' => Hash::make('prerelease'),
                              'phone' => '6317768242',
                              'first_name' => 'Dave',
                              'last_name' => 'Brenner',
                              'street_address' => 'Dave\'s House',
                              'city' => 'Dave\'s City',
                              'state' => 'NY',
                              'zip_code' => '55555',
                              'stay_logged_in' => 0,
                              'active' => 1,
                              'created_at' => $now,
                              'updated_at' => $now
                              )
                        
                        );
        /**/
        foreach($users as $user) {
            User::create($user);
        }
        /**/
    }
}
