<?php

namespace App\Services\LevelResultsService;

use Illuminate\Support\Collection;

class LevelResultsResponse
{
    private Collection $result;

    public function __construct(Collection $result)
    {
        $this->result = $result;
    }

    public function getResult():Collection
    {
        return $this->result;
    }

}
