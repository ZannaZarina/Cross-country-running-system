<?php

use App\Participant;
use App\Race;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class ParticipantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Participant::class, 100)->create()
            ->each(function ($participant) {
                for ($i = 1; $i <= 8; $i++) {
                    Race::create([
                        'participant_id' => $participant->id,
                        'level' => $i,
                        'time' => rand(100, 3600)
                    ]);
                }
            });

        Artisan::call('race:points');
    }
}






