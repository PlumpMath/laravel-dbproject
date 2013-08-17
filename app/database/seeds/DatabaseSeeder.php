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
        $this->call('PermissionsTableSeeder');
        $this->call('RoleTableSeeder');
	}

}

class RoleTableSeeder extends Seeder {
    public function run()
    {
        $now = date('Y-m-d H:i:s');

        $role = new Role;
        $role->name = 'admin';
        $role->save();

        $role = Role::find(1);
        for($i = 1; $i < 50; $i++) {
            $role->permissions()->attach($i);
        }
        $role->users()->attach(1);
        $role->save();
        
        $user = User::find(1);
        $user->roles()->attach(1);
        $user->save();
    }
}

class PermissionsTableSeeder extends Seeder {
    public function run()
    {
        $now = date('Y-m-d H:i:s');

        $resources = array('permissions', 'locations', 'classes', 'users', 'activities', 'permissions', 'roles');
        $actions = array('index', 'create', 'store', 'edit', 'update', 'destroy', 'show');

        foreach($resources as $resource) {
            foreach($actions as $action) {
                Permission::create(array(
                                         'resource' => $resource,
                                         'action'   => $action,
                                         'created_at' => $now,
                                         'updated_at' => $now,
                                         ));
            }
        }
    }
}

class UsersTableSeeder extends Seeder {
    public function run()
    {

        $now = date('Y-m-d H:i:s');
        $names = array(
                       'James',
                       'Mary',
                       'Ruthie',
                       'William',
                       'Timmy',
                       'Heidi',
                       'Craig',
                       'Ryan',
                       'Danny',
                       'Jordan',
                       'John',
                       'Betsy',
                       'Clementine',
                       'Nostrodamus',
                       'Daniel',
                       'David',
                       'Nancy',
                       'Claire',
                       'Simmons',
                       'Williams',
                       'Bernie',
                       'Clements',
                       'Tabbitha',
                       'George',
                       'Brock',
                       'Leslie',
                       );


        $users = array(
                        array(
                              'email' => 'admin',
                              'password' => Hash::make('admin'),
                              'phone' => '',
                              'first_name' => '',
                              'last_name' => 'Admin',
                              'street_address' => '',
                              'city' => '',
                              'state' => '',
                              'zip_code' => '',
                              'stay_logged_in' => 1,
                              'active' => 1,
                              'created_at' => $now,
                              'updated_at' => $now
                              ),
                        );

        for($i = 0; $i < 10; $i++) {
            $first_name = $names[array_rand($names)];
            $last_name = $names[array_rand($names)];
            $email = strtolower($first_name.''.$last_name).'@example.com';

            $users[] = array(
                             'email' => $email,
                             'password' => Hash::make($email),
                             'phone' => '5555555555',
                             'first_name' => $first_name,
                             'last_name' => $last_name,
                             'street_address' => '555 Example Road',
                             'city' => 'Example City',
                             'state' => 'NY',
                             'zip_code' => '55555',
                             'stay_logged_in' => 1,
                             'active' => 1,
                             'created_at' => $now,
                             'updated_at' => $now
                             );
        }

        foreach($users as $user) {
            User::create($user);
        }
    }
}

class ActivitiesTableSeeder
{
    public function run()
    {
    }
}
