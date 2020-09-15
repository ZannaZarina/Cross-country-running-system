<?php

namespace App\Services\LevelResultsService;

use Illuminate\Support\Facades\DB;

class LevelResultsHandler implements LevelResultsInterface
{
    public function handle(string $param)
    {
        $races = DB::table('races')
            ->join('participants', 'races.participant_id', '=', 'participants.id')
            ->select('participants.*', 'races.*', 'races.points as level_points')
            ->where('level', $param)
            ->get()
            ->sortBy('age_group')
            ->groupBy('age_group');

        foreach ($races as $key=>$race) {
            $races[$key] = $race->sortBy('time')->values();
        }

        return $races;
    }
}
