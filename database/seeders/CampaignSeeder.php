<?php

namespace Database\Seeders;

use App\Models\Campaign;
use Illuminate\Database\Seeder;

class CampaignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Campaign::create([
            "code" => "ANVSRY-19",
            "name" => "Anniversary 19",
            "start_date" => "2022-12-04 00:00:00",
            "end_date" => "2022-12-05 23:59:59",
        ]);
    }
}
