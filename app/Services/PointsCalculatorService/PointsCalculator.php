<?php

namespace App\Services\PointsCalculatorService;

use Illuminate\Support\Facades\DB;

class PointsCalculator implements PointsCalculatorInterface
{
    public function handle()
    {
        for ($i = 1; $i <= 8; $i++) {
            $levels = DB::table('races')
                ->join('participants', 'races.participant_id', '=', 'participants.id')
                ->where('level', $i)
                ->get()
                ->groupBy('age_group')
                ->values();

            for ($j = 0; $j < count($levels); $j++) {
                $runnersSortedByTime = $levels[$j]->sortBy('time')->values();

                for ($k = 0; $k < count($runnersSortedByTime); $k++) {
                    $runnerId = $runnersSortedByTime[$k]->participant_id;
                    $points = $runnersSortedByTime[0]->time / $runnersSortedByTime[$k]->time * 1000;
                    if ($k == 0) {
                        DB::table('races')->where([
                            ['participant_id', $runnerId],
                            ['level', $i]
                        ])->update(['points' => 1000]);
                    } else {
                        DB::table('races')->where([
                            ['participant_id', $runnerId],
                            ['level', $i]
                        ])->update(['points' => round($points)]);
                    }
                }
            }
        }
    }
}
