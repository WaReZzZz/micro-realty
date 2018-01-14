<?php

use Illuminate\Database\Seeder;
use App\Realty;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('RealtyTableSeeder');
        $this->call('UserTableSeeder');
    }
}
