<?php

use App\Admin;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::truncate();
        Admin::create([
            'name' => 'SuperAdmin',
            'email' => 'superadmin@gmail.com',
            'role' => 1,
            'password' => Hash::make('123456'),
            'created_at' => Carbon::now()
        ]);
    }
}
