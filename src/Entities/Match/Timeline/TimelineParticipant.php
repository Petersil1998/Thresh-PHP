<?php


namespace src\Entities\Match\Timeline;


class TimelineParticipant
{
    /**
     * @var int
     */
    private $participantId;

    /**
     * @var int
     */
    private $positionX;

    /**
     * @var int
     */
    private $positionY;

    /**
     * @var int
     */
    private $currentGold;

    /**
     * @var int
     */
    private $totalGold;

    /**
     * @var int
     */
    private $level;

    /**
     * @var int
     */
    private $xp;

    /**
     * @var int
     */
    private $minionsKilled;

    /**
     * @var int
     */
    private $jungleMinionsKilled;

    /**
     * @var int
     */
    private $dominionScore;

    /**
     * @var int
     */
    private $teamScore;

    /**
     * TimelineParticipant constructor.
     * @param $data
     */
    public function __construct($data)
    {
        $this->participantId = $data->participantId;
        $this->positionX = $data->position->x;
        $this->positionY = $data->position->y;
        $this->currentGold = $data->currentGold;
        $this->totalGold = $data->totalGold;
        $this->level = $data->level;
        $this->xp = $data->xp;
        $this->minionsKilled = $data->minionsKilled;
        $this->jungleMinionsKilled = $data->jungleMinionsKilled;
        $this->dominionScore = $data->dominionScore;
        $this->teamScore = $data->teamScore;
    }

    /**
     * @return int
     */
    public function getParticipantId(): int
    {
        return $this->participantId;
    }

    /**
     * @return int
     */
    public function getPositionX(): int
    {
        return $this->positionX;
    }

    /**
     * @return int
     */
    public function getPositionY(): int
    {
        return $this->positionY;
    }

    /**
     * @return int
     */
    public function getCurrentGold(): int
    {
        return $this->currentGold;
    }

    /**
     * @return int
     */
    public function getTotalGold(): int
    {
        return $this->totalGold;
    }

    /**
     * @return int
     */
    public function getLevel(): int
    {
        return $this->level;
    }

    /**
     * @return int
     */
    public function getXp(): int
    {
        return $this->xp;
    }

    /**
     * @return int
     */
    public function getMinionsKilled(): int
    {
        return $this->minionsKilled;
    }

    /**
     * @return int
     */
    public function getJungleMinionsKilled(): int
    {
        return $this->jungleMinionsKilled;
    }

    /**
     * @return int
     */
    public function getDominionScore(): int
    {
        return $this->dominionScore;
    }

    /**
     * @return int
     */
    public function getTeamScore(): int
    {
        return $this->teamScore;
    }
}