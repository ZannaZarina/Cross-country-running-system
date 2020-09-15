<?php

namespace App\Services\LevelResultsService;

class LevelResultsService
{
    private LevelResultsInterface $levelResults;

    public function __construct(LevelResultsInterface $levelResults)
    {
        $this->levelResults = $levelResults;
    }

    public function execute(LevelResultsRequest $levelResultsRequest): LevelResultsResponse
    {
        $result = $this->levelResults->handle($levelResultsRequest->getParam());
        return new LevelResultsResponse($result);
    }
}
