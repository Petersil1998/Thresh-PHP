<?php

namespace Thresh\Entities\Match\Timeline\Events;

use Thresh\Entities\Match\Team;

class DragonSoulGivenEvent extends AbstractTimelineEvent
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var Team
     */
    private $team;

    public function __construct(int $timestamp, string $name, Team $team)
    {
        parent::__construct($timestamp, TimelineEvents::DRAGON_SOUL_GIVEN);
        $this->name = $name;
        $this->team = $team;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return Team
     */
    public function getTeam(): Team
    {
        return $this->team;
    }
}