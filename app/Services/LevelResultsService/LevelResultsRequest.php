<?php

namespace App\Services\LevelResultsService;

class LevelResultsRequest
{
    private string $param;

    public function __construct(string $param)
    {
        $this->param = $param;
    }

    public function getParam(): string
    {
        return $this->param;
    }
}
