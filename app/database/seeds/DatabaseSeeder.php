<?php

class DatabaseSeeder extends Seeder {

    public function run()
    {
        /////DANGER:
        //Uncommenting will blast things here!
        //Don't forget to return if you're going to do something silly.
        //Eloquent::unguard();

        // Add calls to Seeders here
         $this->call('UsersTableSeeder');
         $this->call('PostsTableSeeder');
         $this->call('CommentsTableSeeder');
        $this->call('RolesTableSeeder');
        $this->call('PermissionsTableSeeder');
    }

}