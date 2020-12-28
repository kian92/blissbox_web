<?php

use Illuminate\Database\Seeder;

class LookupCartTable extends Seeder
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
        		'description' => 'Added into Cart',
			],
			[
        		'status' => '2',
        		'description' => 'Checkout',
			],
		]);
    }
}
