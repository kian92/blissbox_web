<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	[
                'role_id' => '3',
                'company_id' => '1',
                'title' => 'mr',
                'first_name' => 'Koh',
                'last_name' => 'Wee Hong',
                'email' => 'weehong@blissbox.asia',
                'designation' => 'Web Developer',
                'country' => '65',
                'phone' => '84013319',
                'postal_code' => '188979',
                'password' => bcrypt('password'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'role_id' => '3',
                'company_id' => '1',
                'title' => 'mr',
                'first_name' => 'Michel',
                'last_name' => 'Saliba',
                'email' => 'michel@blissbox.asia',
                'designation' => 'COO & Co-Founder',
                'country' => '65',
                'phone' => '84490444',
                'postal_code' => '188979',
                'password' => bcrypt('password'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'role_id' => '3',
                'company_id' => '1',
                'title' => 'mr',
                'first_name' => 'Cristiano',
                'last_name' => 'Reghettini',
                'email' => 'chris@blissbox.asia',
                'designation' => 'CEO',
                'country' => '65',
                'phone' => '98655057',
                'postal_code' => '188979',
                'password' => bcrypt('password'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'role_id' => '3',
                'company_id' => '1',
                'title' => 'ms',
                'first_name' => 'Kwek',
                'last_name' => 'Jennifer',
                'email' => 'jennifer@blissbox.asia',
                'designation' => 'Product Manager',
                'country' => '65',
                'phone' => '97923408',
                'postal_code' => '188979',
                'password' => bcrypt('password'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'role_id' => '3',
                'company_id' => '1',
                'title' => 'ms',
                'first_name' => 'Kim',
                'last_name' => 'Yong',
                'email' => 'kim@blissbox.asia',
                'designation' => 'Account Manager',
                'country' => '65',
                'phone' => '86133871',
                'postal_code' => '188979',
                'password' => bcrypt('password'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'role_id' => '3',
                'company_id' => '1',
                'title' => 'ms',
                'first_name' => 'Alin',
                'last_name' => 'Ali',
                'email' => 'alin@blissbox.asia',
                'designation' => 'Product Manager',
                'country' => '60',
                'phone' => '124335005',
                'postal_code' => '188979',
                'password' => bcrypt('password'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'role_id' => '3',
                'company_id' => '1',
                'title' => 'ms',
                'first_name' => 'Tuty',
                'last_name' => 'Alawiyah',
                'email' => 'tuty@blissbox.asia',
                'designation' => 'Product Manager',
                'country' => '62',
                'phone' => '811280987',
                'postal_code' => '188979',
                'password' => bcrypt('password'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'role_id' => '3',
                'company_id' => '1',
                'title' => 'ms',
                'first_name' => 'Eileen',
                'last_name' => 'Ho',
                'email' => 'eileen@blissbox.asia',
                'designation' => 'Intern',
                'country' => '65',
                'phone' => '81861002',
                'postal_code' => '188979',
                'password' => bcrypt('password'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'role_id' => '3',
                'company_id' => '1',
                'title' => 'mr',
                'first_name' => 'Bryan',
                'last_name' => 'Low',
                'email' => 'bryan@blissbox.asia',
                'designation' => 'Intern',
                'country' => '65',
                'phone' => '94511958',
                'postal_code' => '188979',
                'password' => bcrypt('password'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'role_id' => '3',
                'company_id' => '1',
                'title' => 'mr',
                'first_name' => 'Rui Xian',
                'last_name' => 'Ang',
                'email' => 'ruixian@blissbox.asia',
                'designation' => 'Intern',
                'country' => '65',
                'phone' => '87981651',
                'postal_code' => '188979',
                'password' => bcrypt('password'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ]);
    }
}