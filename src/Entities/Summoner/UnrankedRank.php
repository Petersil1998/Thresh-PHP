<?php

namespace Thresh\Entities\Summoner;

/**
 * This Class is used when a Player is 'Unranked'
 * @package Thresh\Entities\Summoner
 */
class UnrankedRank extends Rank
{
    public function __construct()
    {
        parent::__construct(false);
        $this->tier = 'Unranked';
        $this->rank = '';
    }
}