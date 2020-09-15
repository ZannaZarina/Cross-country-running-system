<?php

namespace App\Http\Controllers;

use App\Services\LevelResultsService\LevelResultsRequest;
use App\Services\LevelResultsService\LevelResultsHandler;
use App\Services\LevelResultsService\LevelResultsService;
use App\Services\PointsCalculatorService\CalculatorService;
use App\Services\PointsCalculatorService\OverallResultsHandler;

class LevelResultsController extends Controller
{
    public function __invoke(string $param)
    {
        if (is_numeric($param)) {
            $calculatorService = new LevelResultsService(new LevelResultsHandler);
            $request = new LevelResultsRequest($param);
            $response = $calculatorService->execute($request);
            $races = $response->getResult();

            return view('results', [
                'levels' => $races,
                'isNumeric' => true
            ]);

        } else {
            $calculatorService = new CalculatorService(new OverallResultsHandler);
            $races = $calculatorService->execute();

            return view('results', [
                'levels' => $races,
                'isNumeric' => false
            ]);
        }
    }
}
