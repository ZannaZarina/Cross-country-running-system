<?php

namespace App\Services\PointsCalculatorService;

class CalculatorService
{
    private PointsCalculatorInterface $calculator;

    public function __construct(PointsCalculatorInterface $calculator)
    {
        $this->calculator = $calculator;
    }

    public function execute()
    {
        return $this->calculator->handle();
    }
}
