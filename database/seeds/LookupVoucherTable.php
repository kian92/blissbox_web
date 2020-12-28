<?php

use Illuminate\Database\Seeder;

class LookupVoucherTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lookup_voucher_status')->insert([
        	[
        		'status' => '1',
        		'description' => 'Generated',
			],
			[
        		'status' => '2',
        		'description' => 'Instock',
			],
			[
        		'status' => '3',
        		'description' => 'Active Sold',
			],
			[
        		'status' => '4',
        		'description' => 'Booked',
			],
			[
        		'status' => '5',
        		'description' => 'Invoiced / Paid',
			],
			[
        		'status' => '6',
        		'description' => 'Suspended',
			],
			[
        		'status' => '7',
        		'description'   => 'Exchanged',
			],
        ]);
    }
}
