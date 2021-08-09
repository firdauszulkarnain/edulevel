<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EduLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('edulevels')->insert([
            'name' => 'SMP Sederajat',
            'desc' => 'SMP'
        ]);
    }
}
