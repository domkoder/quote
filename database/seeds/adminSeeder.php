<?php

use Illuminate\Database\Seeder;
use App\Admin;

class adminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'adminName' => "nandom",
            'password' => bcrypt('12345')
        ]);
    }
}
