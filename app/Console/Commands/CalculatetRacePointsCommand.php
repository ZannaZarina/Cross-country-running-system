<?php

namespace App\Console\Commands;

use App\Services\PointsCalculatorService\CalculatorService;
use App\Services\PointsCalculatorService\PointsCalculator;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;

class CalculatetRacePointsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'race:points';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Calculate points depending on results of opponents';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $calculatorService = new CalculatorService(new PointsCalculator);
        return $calculatorService->execute();
    }
}
