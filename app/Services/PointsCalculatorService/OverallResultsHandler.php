<?php

namespace App\Services\PointsCalculatorService;

use App\Participant;
use Illuminate\Support\Facades\DB;

class OverallResultsHandler implements PointsCalculatorInterface
{
    public function handle()
    {
        $races = DB::table('races')
            ->join('participants', 'races.participant_id', '=', 'participants.id')
            ->select('participants.*', 'races.*', 'participants.points as points', 'races.points as level_points')
            ->get()
            ->sortBy('age_group')
            ->groupBy('age_group');

        foreach ($races as $age_group => $race) {
            $race = $race
                ->sortByDesc('points')
                ->groupBy('participant_id')
                ->values();

            foreach ($race as $key => $runner) {
                $fiveBestResults = $runner->sortByDesc('level_points')->take(5);
                $pointsForBestRaces = $fiveBestResults->sum('level_points');
                $id = $race[$key][0]->participant_id;
                $race[$key] = $fiveBestResults;

                Participant::where('id', $id)
                    ->update(['points' => $pointsForBestRaces]);
            }
            $races[$age_group] = $race;
        }
        return $races;
    }
}
