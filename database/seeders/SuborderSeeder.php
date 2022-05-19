<?php

namespace Database\Seeders;

use App\Models\Suborder;
use Illuminate\Database\Seeder;

class SuborderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Suborder::factory()->count(500)->create();
    }
}
