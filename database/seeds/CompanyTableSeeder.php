<?php

use Illuminate\Database\Seeder;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            [
                'name' => 'Blissbox Pte Ltd.',
                'registration_no' => '201617504N',
                'nature_of_business' => 'Retailer',
                'website' => 'https://www.blissbox.asia/',
                'phone' => '',
                'fax' => '',
                'country' => 'Singapore',
                'registered_address' => '190 Middle Road, Fortune Centre #13-01',
                'postal_code' => '188979',
                'business_type' => 'hour',
                'business_hours' => '[  
                                       {  
                                          "from":"9:00 AM",
                                          "to":"6:00 PM",
                                          "shiftFrom":null,
                                          "shiftTo":null
                                       },
                                       {  
                                          "from":"9:00 AM",
                                          "to":"6:00 PM",
                                          "shiftFrom":null,
                                          "shiftTo":null
                                       },
                                       {  
                                          "from":"9:00 AM",
                                          "to":"6:00 PM",
                                          "shiftFrom":null,
                                          "shiftTo":null
                                       },
                                       {  
                                          "from":"9:00 AM",
                                          "to":"6:00 PM",
                                          "shiftFrom":null,
                                          "shiftTo":null
                                       },
                                       {  
                                          "from":"9:00 AM",
                                          "to":"6:00 PM",
                                          "shiftFrom":null,
                                          "shiftTo":null
                                       },
                                       {  
                                          "status":"closed"
                                       },
                                       {  
                                          "status":"closed"
                                       }
                                    ]'
            ]
        ]);
    }
}
