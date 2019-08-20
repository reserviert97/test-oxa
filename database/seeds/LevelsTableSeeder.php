<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class LevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];

        for ($i = 1; $i <= 20; $i++) {
            array_push($data, [
                'level' => $i,
                'minimum_generated' => $i == 1 ? 0 : $i + 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }

        DB::table('levels')->insert($data);
    }
}
