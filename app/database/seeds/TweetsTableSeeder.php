<?php

class TweetsTableSeeder extends Seeder {
    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	// DB::table('tweets')->delete();

        $tweets = array(
        	'author'=>'rgrigga',
        	'body'=>'This is my first fake tweet.'
        );

        // Uncomment the below to run the seeder
        // DB::table('tweets')->insert($tweets);
    }

}