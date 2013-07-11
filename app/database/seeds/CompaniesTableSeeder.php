<?php

class CompaniesTableSeeder extends Seeder {
    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	DB::table('companies')->delete();

        $companies = array(
// brand:string, 
// description:text, 
// email:text, 
// menus:text, 
// phone:text
        	'brand'=>'Buckeye Mower',
        	'phone'=>'7405076198',
        	'description'=>'Mobile Mower Repair',
        	'slogan'=>'Get your Grass in gear',
        	'image'=>'buckeye.png',
        	'menus'=>'services, about'
        	
        );

        // Uncomment the below to run the seeder
        DB::table('companies')->insert($companies);
    }

}