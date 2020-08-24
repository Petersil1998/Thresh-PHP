<?php

namespace src\Entities\Summoner;

class UnrankedRank extends Rank
{
    public function __construct()
    {
        parent::__construct(false);
        $this->tier = 'Unranked';
    }
}