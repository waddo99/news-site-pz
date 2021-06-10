<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin User',
            'email' => 'admin.user@site.com',
            'password' => Hash::make('SuperPassword'), // SuperPassword
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Editor User',
            'email' => 'editor.user@site.com',
            'password' => Hash::make('SuperDuperPassword'), // SuperDuperPassword
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
