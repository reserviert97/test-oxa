<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class BadgesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Newbie',
                'description' => 'This is badge for new player',
                'minimum_level' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Beginner',
                'description' => 'This badge for new player who has stream on this app',
                'minimum_level' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Amateur',
                'description' => 'For those people who stream for a litle bit',
                'minimum_level' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Intermediate',
                'description' => 'these player is started enjoyed the stream world',
                'minimum_level' => 7,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()

            ],
            [
                'name' => 'Pro',
                'description' => 'these player is Pro streamer',
                'minimum_level' => 10,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Expert',
                'description' => 'These Human is a Legend',
                'minimum_level' => 15,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];

        
        DB::table('badges')->insert($data);
    }
}
