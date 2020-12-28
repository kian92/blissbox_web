<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(CompanyTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(LookupVoucherTable::class);
        $this->call(LookupCartTable::class);
        $this->call(CouponTypeTableSeeder::class);
        $this->call(CouponSeeder::class);
    }
}