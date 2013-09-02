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
        //$this->call('PermissionsTableSeeder');
        //$this->call('RolesTableSeeder');
        $this->call('LocationsTableSeeder');
        //$this->call('MapsTableSeeder');
    }

}

/*

class MapsTableSeeder extends Seeder {
    public function geocode($query)
    {
        $placeSearchURL = 'https://maps.googleapis.com/maps/api/geocode/json?address=' . $query . '&sensor=false';

        $placeSearchJSON = file_get_contents($placeSearchURL);
        $dataArray = json_decode($placeSearchJSON);
        $location = $dataArray->results[0]->geometry->location;
        return array($location->lat, $location->lng);
    }
    
    public function run()
    {
        $now = date('Y-m-d H:i:s');
        $locations = Location::all();
        
        foreach($locations as $location) {
            $address = urlencode($location['address'] . $location['city'] . $location['state']);
            $latlng = self::geocode($address);

            Maps::create(array(
                    'id' => $location['id'],
                    'latitude' => $latlng[0],
                    'longitude' => $latlng[1],
                    )
            );
        }
    }
}

*/

class LocationsTableSeeder extends Seeder {
    public function run()
    {
        $now = date('Y-m-d H:i:s');

        $locations = array(
                           array(
                                 'name' => 'Sportime Massapequa',
                                 'contact_name' => 'Fayez',
                                 'phone' => '5167993550',
                                 'address' => '5600 Old Sunrise Highway',
                                 'city' => 'Massapequa',
                                 'state' => 'NY',
                                 'zip_code' => '11758',
                                 'capacity' => 8,
                                 'status' => 1,
                                 'notes' => NULL,
                                 ),
                           array(
                                 'name' => 'Bethpage Park Tennis Center',
                                 'contact_name' => 'Andrea, Steve',
                                 'phone' => '5137771358',
                                 'address' => '99 Quaker Meeting House Road',
                                 'city' => 'Farmingdale',
                                 'state' => 'NY',
                                 'zip_code' => '11735',
                                 'capacity' => 8,
                                 'status' => 1,
                                 'notes' => NULL,
                                 ),
                           array(
                                 'name' => 'Long Beach Tennis Center',
                                 'contact_name' => 'Sid, Sunil',
                                 'phone' => '5164326060',
                                 'address' => '899 Monroe Boulevard',
                                 'city' => 'Long Beach',
                                 'state' => 'NY',
                                 'zip_code' => '11561',
                                 'capacity' => 8,
                                 'status' => 1,
                                 'notes' => NULL,
                                 ),
                           array(
                                 'name' => 'Eastern Athletic Club',
                                 'contact_name' => 'Kristin, Cira',
                                 'phone' => '6314642882',
                                 'address' => '9A Montauk Highway',
                                 'city' => 'Blue Point',
                                 'state' => 'NY',
                                 'zip_code' => '11715',
                                 'capacity' => 6,
                                 'status' => 1,
                                 'notes' => NULL,
                                 ),
                           array(
                                 'name' => 'Eastern Athletic Club',
                                 'contact_name' => 'Marc, Jamie',
                                 'phone' => '6314201310',
                                 'address' => '100 Ruland Road',
                                 'city' => 'Melville',
                                 'state' => 'NY',
                                 'capacity' => 6,
                                 'zip_code' => '11747',
                                 'status' => 1,
                                 'notes' => NULL,
                                 ),
                           array(
                                 'name' => 'Eastern Athletic Club',
                                 'contact_name' => 'Sheldon, Betsy',
                                 'phone' => '6312716616',
                                 'address' => '854 East Jericho Turnpike',
                                 'city' => 'Dix Hills',
                                 'state' => 'NY',
                                 'capacity' => 6,
                                 'zip_code' => '11746',
                                 'status' => 1,
                                 'notes' => NULL,
                                 ),
                           array(
                                 'name' => 'Sportime Kings Park',
                                 'contact_name' => 'Jason, Joe, Will',
                                 'phone' => '6312696300',
                                 'address' => '275 Old Indian Head Road',
                                 'city' => 'Kings Park',
                                 'state' => 'NY',
                                 'capacity' => 8,
                                 'zip_code' => '11754',
                                 'status' => 1,
                                 'notes' => NULL,
                                 ),
                           array(
                                 'name' => 'Sportime Quogue',
                                 'contact_name' => 'Mark, Jeannie',
                                 'phone' => '6316536767',
                                 'address' => '2571 Quogue-Riverhead Road',
                                 'city' => 'East Quogue',
                                 'state' => 'NY',
                                 'capacity' => 8,
                                 'zip_code' => '11942',
                                 'status' => 1,
                                 'notes' => NULL,
                                 ),
                           array(
                                 'name' => 'Bay Terrace Tennis Center',
                                 'contact_name' => 'Sunil',
                                 'phone' => '7182295151',
                                 'address' => '212-00 23rd Avenue',
                                 'city' => 'Bayside',
                                 'state' => 'NY',
                                 'zip_code' => '11360',
                                 'capacity' => 0,
                                 'status' => 1,
                                 'notes' => NULL,
                                 ),
                           array(
                                 'name' => 'Jericho Westbury Indoor Tennis',
                                 'contact_name' => 'Don, Laura',
                                 'phone' => '5169974060',
                                 'address' => '44 Jericho Turnpike',
                                 'city' => 'Jericho',
                                 'state' => 'NY',
                                 'zip_code' => '11753',
                                 'capacity' => 0,
                                 'status' => 1,
                                 'notes' => NULL,
                                 ),
                           array(
                                 'name' => 'West Hampton Beach',
                                 'contact_name' => 'Bobby Lum',
                                 'phone' => '6312886060',
                                 'address' => '86 Depot Road',
                                 'city' => 'West Hampton Beach',
                                 'state' => 'NY',
                                 'zip_code' => '11978',
                                 'capacity' => 8,
                                 'status' => 1,
                                 'notes' => NULL,
                                 ),
                           array(
                                 'name' => 'Studio Art Commack',
                                 'contact_name' => 'Karen Hogan',
                                 'phone' => '9736700572',
                                 'address' => '213 Commck Road',
                                 'city' => 'Commack',
                                 'state' => 'NY',
                                 'zip_code' => '11725',
                                 'capacity' => 0,
                                 'status' => 1,
                                 'notes' => NULL,
                                 ),
                           );

        foreach($locations as $location) {
            Location::create($location);
        }

    }
}

/*

class RolesTableSeeder extends Seeder {
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

*/

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
                              'address' => '',
                              'city' => '',
                              'state' => '',
                              'zip_code' => '',
                              'remember' => 1,
                              'status' => 1,
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
                             'address' => '555 Example Road',
                             'city' => 'Example City',
                             'state' => 'NY',
                             'zip_code' => '55555',
                             'remember' => 1,
                             'status' => 1,
                             'created_at' => $now,
                             'updated_at' => $now
                             );
        }

        foreach($users as $user) {
            User::create($user);
        }
    }
}
