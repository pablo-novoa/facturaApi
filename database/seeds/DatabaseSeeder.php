<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Company;
use App\Bill;
use App\Client;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Company::truncate();
        Bill::truncate();
        Client::truncate();

        factory(Company::class, 3)->create();
        factory(Bill::class, 33)->create();
        factory(Client::class, 7)->create(['company_id' => mt_rand(1, 3)]);

    }
}
