<?php

namespace src\Entities\Match;

class MatchParticipant
{
    /**
     * @var int
     */
    private $participantId;

    /**
     * @var int
     */
    private $championId;

    /**
     * @var int
     */
    private $teamId;

    /**
     * @var int
     */
    private $spell1Id;

    /**
     * @var int
     */
    private $spell2Id;

    /**
     * @var int
     */
    private $item0;

    /**
     * @var int
     */
    private $item1;

    /**
     * @var int
     */
    private $item2;

    /**
     * @var int
     */
    private $item3;

    /**
     * @var int
     */
    private $item4;

    /**
     * @var int
     */
    private $item5;

    /**
     * @var int
     */
    private $item6;

    /**
     * @var int
     */
    private $kills;

    /**
     * @var int
     */
    private $deaths;

    /**
     * @var int
     */
    private $assists;

    /**
     * @var int
     */
    private $largestKillingSpree;

    /**
     * @var int
     */
    private $largestMultiKill;

    /**
     * @var int
     */
    private $killingSprees;

    /**
     * @var int
     */
    private $longestTimeSpentLiving;

    /**
     * @var int
     */
    private $doubleKills;

    /**
     * @var int
     */
    private $tripleKills;

    /**
     * @var int
     */
    private $quadraKills;

    /**
     * @var int
     */
    private $pentaKills;

    /**
     * @var int
     */
    private $unrealKills;

    /**
     * @var int
     */
    private $totalDamageDealt;

    /**
     * @var int
     */
    private $magicDamageDealt;

    /**
     * @var int
     */
    private $physicalDamageDealt;

    /**
     * @var int
     */
    private $trueDamageDealt;

    /**
     * @var int
     */
    private $largestCriticalStrike;

    /**
     * @var int
     */
    private $totalDamageDealtToChampions;

    /**
     * @var int
     */
    private $magicDamageDealtToChampions;

    /**
     * @var int
     */
    private $physicalDamageDealtToChampions;

    /**
     * @var int
     */
    private $trueDamageDealtToChampions;

    /**
     * @var int
     */
    private $totalHeal;

    /**
     * @var int
     */
    private $totalUnitsHealed;

    /**
     * @var int
     */
    private $damageSelfMitigated;

    /**
     * @var int
     */
    private $damageDealtToObjectives;

    /**
     * @var int
     */
    private $damageDealtToTurrets;

    /**
     * @var int
     */
    private $visionScore;

    /**
     * @var int
     */
    private $timeCCingOthers;

    /**
     * @var int
     */
    private $totalDamageTaken;

    /**
     * @var int
     */
    private $magicalDamageTaken;

    /**
     * @var int
     */
    private $physicalDamageTaken;

    /**
     * @var int
     */
    private $trueDamageTaken;

    /**
     * @var int
     */
    private $goldEarned;

    /**
     * @var int
     */
    private $goldSpent;

    /**
     * @var int
     */
    private $turretKills;

    /**
     * @var int
     */
    private $inhibitorKills;

    /**
     * @var int
     */
    private $totalMinionsKilled;

    /**
     * @var int
     */
    private $neutralMinionsKilled;

    /**
     * @var int
     */
    private $neutralMinionsKilledTeamJungle;

    /**
     * @var int
     */
    private $neutralMinionsKilledEnemyJungle;

    /**
     * @var int
     */
    private $totalTimeCrowdControlDealt;

    /**
     * @var int
     */
    private $champLevel;

    /**
     * @var int
     */
    private $visionWardsBoughtInGame;

    /**
     * @var int
     */
    private $sightWardsBoughtInGame;

    /**
     * @var int
     */
    private $wardsPlaced;

    /**
     * @var int
     */
    private $wardsKilled;

    /**
     * @var int
     */
    private $firstBloodKill;

    /**
     * @var int
     */
    private $firstBloodAssist;

    /**
     * @var int
     */
    private $firstTowerKill;

    /**
     * @var int
     */
    private $firstTowerAssist;

    /**
     * @var int
     */
    private $firstInhibitorKill;

    /**
     * @var int
     */
    private $firstInhibitorAssist;

    /**
     * @var int
     */
    private $combatPlayerScore;

    /**
     * @var int
     */
    private $objectivePlayerScore;

    /**
     * @var int
     */
    private $totalPlayerScore;

    /**
     * @var int
     */
    private $totalScoreRank;

    /**
     * @var int
     */
    private $playerScore0;

    /**
     * @var int
     */
    private $playerScore1;

    /**
     * @var int
     */
    private $playerScore2;

    /**
     * @var int
     */
    private $playerScore3;

    /**
     * @var int
     */
    private $playerScore4;

    /**
     * @var int
     */
    private $playerScore5;

    /**
     * @var int
     */
    private $playerScore6;

    /**
     * @var int
     */
    private $playerScore7;

    /**
     * @var int
     */
    private $playerScore8;

    /**
     * @var int
     */
    private $playerScore9;

    /**
     * @var int
     */
    private $perk0;

    /**
     * @var int
     */
    private $perk0Var1;

    /**
     * @var int
     */
    private $perk0Var2;

    /**
     * @var int
     */
    private $perk0Var3;

    /**
     * @var int
     */
    private $perk1;

    /**
     * @var int
     */
    private $perk1Var1;

    /**
     * @var int
     */
    private $perk1Var2;

    /**
     * @var int
     */
    private $perk1Var3;

    /**
     * @var int
     */
    private $perk2;

    /**
     * @var int
     */
    private $perk2Var1;

    /**
     * @var int
     */
    private $perk2Var2;

    /**
     * @var int
     */
    private $perk2Var3;

    /**
     * @var int
     */
    private $perk3;

    /**
     * @var int
     */
    private $perk3Var1;

    /**
     * @var int
     */
    private $perk3Var2;

    /**
     * @var int
     */
    private $perk3Var3;

    /**
    * @var int
    */
    private $perk4;

    /**
     * @var int
     */
    private $perk4Var1;

    /**
     * @var int
     */
    private $perk4Var2;

    /**
     * @var int
     */
    private $perk4Var3;

    /**
     * @var int
     */
    private $perk5;

    /**
     * @var int
     */
    private $perk5Var1;

    /**
     * @var int
     */
    private $perk5Var2;

    /**
     * @var int
     */
    private $perk5Var3;

    /**
     * @var int
     */
    private $perkPrimaryStyle;

    /**
     * @var int
     */
    private $perkSubStyle;

    /**
     * @var int
     */
    private $statPerk0;

    /**
     * @var int
     */
    private $statPerk1;

    /**
     * @var int
     */
    private $statPerk2;

    /**
     * @var array
     */
    private $creepsPerMinDeltas;

    /**
     * @var array
     */
    private $xpPerMinDeltas;

    /**
     * @var array
     */
    private $goldPerMinDeltas;

    /**
     * @var array
     */
    private $csDiffPerMinDeltas;

    /**
     * @var array
     */
    private $xpDiffPerMinDeltas;

    /**
     * @var array
     */
    private $damageTakenPerMinDeltas;

    /**
     * @var array
     */
    private $damageTakenDiffPerMinDeltas;

    /**
     * @var string
     */
    private $role;

    /**
     * @var string
     */
    private $lane;

    /**
     * MatchParticipant constructor.
     * @param $participant
     */
    public function __construct($participant)
    {
        $this->participantId = $participant->participantId;
        $this->teamId = $participant->teamId;
        $this->championId = $participant->championId;
        $this->spell1Id = $participant->spell1Id;
        $this->spell2Id = $participant->spell2Id;
        $stats = $participant->stats;
        $this->item0 = $stats->item0;
        $this->item1 = $stats->item1;
        $this->item2 = $stats->item2;
        $this->item3 = $stats->item3;
        $this->item4 = $stats->item4;
        $this->item5 = $stats->item5;
        $this->item6 = $stats->item6;
        $this->kills = $stats->kills;
        $this->deaths = $stats->deaths;
        $this->assists = $stats->assists;
        $this->largestKillingSpree = $stats->largestKillingSpree;
        $this->largestMultiKill = $stats->largestMultiKill;
        $this->killingSprees = $stats->killingSprees;
        $this->longestTimeSpentLiving = $stats->longestTimeSpentLiving;
        $this->doubleKills = $stats->doubleKills;
        $this->tripleKills = $stats->tripleKills;
        $this->quadraKills = $stats->quadraKills;
        $this->pentaKills = $stats->pentaKills;
        $this->unrealKills = $stats->unrealKills;
        $this->totalDamageDealt = $stats->totalDamageDealt;
        $this->magicDamageDealt = $stats->magicDamageDealt;
        $this->physicalDamageDealt = $stats->physicalDamageDealt;
        $this->trueDamageDealt = $stats->trueDamageDealt;
        $this->largestCriticalStrike = $stats->largestCriticalStrike;
        $this->totalDamageDealtToChampions = $stats->totalDamageDealtToChampions;
        $this->magicDamageDealtToChampions = $stats->magicDamageDealtToChampions;
        $this->physicalDamageDealtToChampions = $stats->physicalDamageDealtToChampions;
        $this->trueDamageDealtToChampions = $stats->trueDamageDealtToChampions;
        $this->totalHeal = $stats->totalHeal;
        $this->totalUnitsHealed = $stats->totalUnitsHealed;
        $this->damageSelfMitigated = $stats->damageSelfMitigated;
        $this->damageDealtToObjectives = $stats->damageDealtToObjectives;
        $this->damageDealtToTurrets = $stats->damageDealtToTurrets;
        $this->visionScore = $stats->visionScore;
        $this->timeCCingOthers = $stats->timeCCingOthers;
        $this->totalDamageTaken = $stats->totalDamageTaken;
        $this->magicalDamageTaken = $stats->magicalDamageTaken;
        $this->physicalDamageTaken = $stats->physicalDamageTaken;
        $this->trueDamageTaken = $stats->trueDamageTaken;
        $this->goldEarned = $stats->goldEarned;
        $this->goldSpent = $stats->goldSpent;
        $this->turretKills = $stats->turretKills;
        $this->inhibitorKills = $stats->inhibitorKills;
        $this->totalMinionsKilled = $stats->totalMinionsKilled;
        $this->neutralMinionsKilled = $stats->neutralMinionsKilled;
        $this->neutralMinionsKilledTeamJungle = $stats->neutralMinionsKilledTeamJungle;
        $this->neutralMinionsKilledEnemyJungle = $stats->neutralMinionsKilledEnemyJungle;
        $this->totalTimeCrowdControlDealt = $stats->totalTimeCrowdControlDealt;
        $this->champLevel = $stats->champLevel;
        $this->visionWardsBoughtInGame = $stats->visionWardsBoughtInGame;
        $this->sightWardsBoughtInGame = $stats->sightWardsBoughtInGame;
        $this->wardsPlaced = $stats->wardsPlaced;
        $this->wardsKilled = $stats->wardsKilled;
        $this->firstBloodKill = $stats->firstBloodKill;
        $this->firstBloodAssist = $stats->firstBloodAssist;
        $this->firstTowerKill = $stats->firstTowerKill;
        $this->firstTowerAssist = $stats->firstTowerAssist;
        $this->firstInhibitorKill = $stats->firstInhibitorKill;
        $this->firstInhibitorAssist = $stats->firstInhibitorAssist;
        $this->combatPlayerScore = $stats->combatPlayerScore;
        $this->objectivePlayerScore = $stats->objectivePlayerScore;
        $this->totalPlayerScore = $stats->totalPlayerScore;
        $this->totalScoreRank = $stats->totalScoreRank;
        $this->playerScore0 = $stats->playerScore0;
        $this->playerScore1 = $stats->playerScore1;
        $this->playerScore2 = $stats->playerScore2;
        $this->playerScore3 = $stats->playerScore3;
        $this->playerScore4 = $stats->playerScore4;
        $this->playerScore5 = $stats->playerScore5;
        $this->playerScore6 = $stats->playerScore6;
        $this->playerScore7 = $stats->playerScore7;
        $this->playerScore8 = $stats->playerScore8;
        $this->playerScore9 = $stats->playerScore9;
        $this->perk0 = $stats->perk0;
        $this->perk0Var1 = $stats->perk0Var1;
        $this->perk0Var2 = $stats->perk0Var2;
        $this->perk0Var3 = $stats->perk0Var3;
        $this->perk1 = $stats->perk1;
        $this->perk1Var1 = $stats->perk1Var1;
        $this->perk1Var2 = $stats->perk1Var2;
        $this->perk1Var3 = $stats->perk1Var3;
        $this->perk2 = $stats->perk2;
        $this->perk2Var1 = $stats->perk2Var1;
        $this->perk2Var2 = $stats->perk2Var2;
        $this->perk2Var3 = $stats->perk2Var3;
        $this->perk3 = $stats->perk3;
        $this->perk3Var1 = $stats->perk3Var1;
        $this->perk3Var2 = $stats->perk3Var2;
        $this->perk3Var3 = $stats->perk3Var3;
        $this->perk4 = $stats->perk4;
        $this->perk4Var1 = $stats->perk4Var1;
        $this->perk4Var2 = $stats->perk4Var2;
        $this->perk4Var3 = $stats->perk4Var3;
        $this->perk5 = $stats->perk5;
        $this->perk5Var1 = $stats->perk5Var1;
        $this->perk5Var2 = $stats->perk5Var2;
        $this->perk5Var3 = $stats->perk5Var3;
        $this->perkPrimaryStyle = $stats->perkPrimaryStyle;
        $this->perkSubStyle = $stats->perkSubStyle;
        $this->statPerk0 = $stats->statPerk0;
        $this->statPerk1 = $stats->statPerk1;
        $this->statPerk2 = $stats->statPerk2;
        $timeline = $participant->timeline;
        if(property_exists($timeline, 'creepsPerMinDeltas')) {
            $this->creepsPerMinDeltas = json_decode(json_encode($timeline->creepsPerMinDeltas), true);
        }
        if(property_exists($timeline, 'xpPerMinDeltas')) {
            $this->xpPerMinDeltas = json_decode(json_encode($timeline->xpPerMinDeltas), true);
        }
        if(property_exists($timeline, 'goldPerMinDeltas')) {
            $this->goldPerMinDeltas = json_decode(json_encode($timeline->goldPerMinDeltas), true);
        }
        if(property_exists($timeline, 'csDiffPerMinDeltas')) {
            $this->csDiffPerMinDeltas = json_decode(json_encode($timeline->csDiffPerMinDeltas), true);
        }
        if(property_exists($timeline, 'xpDiffPerMinDeltas')) {
            $this->xpDiffPerMinDeltas = json_decode(json_encode($timeline->xpDiffPerMinDeltas), true);
        }
        if(property_exists($timeline, 'damageTakenPerMinDeltas')) {
            $this->damageTakenPerMinDeltas = json_decode(json_encode($timeline->damageTakenPerMinDeltas), true);
        }
        if(property_exists($timeline, 'damageTakenDiffPerMinDeltas')) {
            $this->damageTakenDiffPerMinDeltas = json_decode(json_encode($timeline->damageTakenDiffPerMinDeltas), true);
        }
        $this->role = $timeline->role;
        $this->lane = $timeline->lane;
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
    public function getChampionId(): int
    {
        return $this->championId;
    }

    /**
     * @return int
     */
    public function getTeamId(): int
    {
        return $this->teamId;
    }

    /**
     * @return int
     */
    public function getSpell1Id(): int
    {
        return $this->spell1Id;
    }

    /**
     * @return int
     */
    public function getSpell2Id(): int
    {
        return $this->spell2Id;
    }

    /**
     * @return int
     */
    public function getItem0(): int
    {
        return $this->item0;
    }

    /**
     * @return int
     */
    public function getItem1(): int
    {
        return $this->item1;
    }

    /**
     * @return int
     */
    public function getItem2(): int
    {
        return $this->item2;
    }

    /**
     * @return int
     */
    public function getItem3(): int
    {
        return $this->item3;
    }

    /**
     * @return int
     */
    public function getItem4(): int
    {
        return $this->item4;
    }

    /**
     * @return int
     */
    public function getItem5(): int
    {
        return $this->item5;
    }

    /**
     * @return int
     */
    public function getItem6(): int
    {
        return $this->item6;
    }

    /**
     * @return int
     */
    public function getKills(): int
    {
        return $this->kills;
    }

    /**
     * @return int
     */
    public function getDeaths(): int
    {
        return $this->deaths;
    }

    /**
     * @return int
     */
    public function getAssists(): int
    {
        return $this->assists;
    }

    /**
     * @return int
     */
    public function getLargestKillingSpree(): int
    {
        return $this->largestKillingSpree;
    }

    /**
     * @return int
     */
    public function getLargestMultiKill(): int
    {
        return $this->largestMultiKill;
    }

    /**
     * @return int
     */
    public function getKillingSprees(): int
    {
        return $this->killingSprees;
    }

    /**
     * @return int
     */
    public function getLongestTimeSpentLiving(): int
    {
        return $this->longestTimeSpentLiving;
    }

    /**
     * @return int
     */
    public function getDoubleKills(): int
    {
        return $this->doubleKills;
    }

    /**
     * @return int
     */
    public function getTripleKills(): int
    {
        return $this->tripleKills;
    }

    /**
     * @return int
     */
    public function getQuadraKills(): int
    {
        return $this->quadraKills;
    }

    /**
     * @return int
     */
    public function getPentaKills(): int
    {
        return $this->pentaKills;
    }

    /**
     * @return int
     */
    public function getUnrealKills(): int
    {
        return $this->unrealKills;
    }

    /**
     * @return int
     */
    public function getTotalDamageDealt(): int
    {
        return $this->totalDamageDealt;
    }

    /**
     * @return int
     */
    public function getMagicDamageDealt(): int
    {
        return $this->magicDamageDealt;
    }

    /**
     * @return int
     */
    public function getPhysicalDamageDealt(): int
    {
        return $this->physicalDamageDealt;
    }

    /**
     * @return int
     */
    public function getTrueDamageDealt(): int
    {
        return $this->trueDamageDealt;
    }

    /**
     * @return int
     */
    public function getLargestCriticalStrike(): int
    {
        return $this->largestCriticalStrike;
    }

    /**
     * @return int
     */
    public function getTotalDamageDealtToChampions(): int
    {
        return $this->totalDamageDealtToChampions;
    }

    /**
     * @return int
     */
    public function getMagicDamageDealtToChampions(): int
    {
        return $this->magicDamageDealtToChampions;
    }

    /**
     * @return int
     */
    public function getPhysicalDamageDealtToChampions(): int
    {
        return $this->physicalDamageDealtToChampions;
    }

    /**
     * @return int
     */
    public function getTrueDamageDealtToChampions(): int
    {
        return $this->trueDamageDealtToChampions;
    }

    /**
     * @return int
     */
    public function getTotalHeal(): int
    {
        return $this->totalHeal;
    }

    /**
     * @return int
     */
    public function getTotalUnitsHealed(): int
    {
        return $this->totalUnitsHealed;
    }

    /**
     * @return int
     */
    public function getDamageSelfMitigated(): int
    {
        return $this->damageSelfMitigated;
    }

    /**
     * @return int
     */
    public function getDamageDealtToObjectives(): int
    {
        return $this->damageDealtToObjectives;
    }

    /**
     * @return int
     */
    public function getDamageDealtToTurrets(): int
    {
        return $this->damageDealtToTurrets;
    }

    /**
     * @return int
     */
    public function getVisionScore(): int
    {
        return $this->visionScore;
    }

    /**
     * @return int
     */
    public function getTimeCCingOthers(): int
    {
        return $this->timeCCingOthers;
    }

    /**
     * @return int
     */
    public function getTotalDamageTaken(): int
    {
        return $this->totalDamageTaken;
    }

    /**
     * @return int
     */
    public function getMagicalDamageTaken(): int
    {
        return $this->magicalDamageTaken;
    }

    /**
     * @return int
     */
    public function getPhysicalDamageTaken(): int
    {
        return $this->physicalDamageTaken;
    }

    /**
     * @return int
     */
    public function getTrueDamageTaken(): int
    {
        return $this->trueDamageTaken;
    }

    /**
     * @return int
     */
    public function getGoldEarned(): int
    {
        return $this->goldEarned;
    }

    /**
     * @return int
     */
    public function getGoldSpent(): int
    {
        return $this->goldSpent;
    }

    /**
     * @return int
     */
    public function getTurretKills(): int
    {
        return $this->turretKills;
    }

    /**
     * @return int
     */
    public function getInhibitorKills(): int
    {
        return $this->inhibitorKills;
    }

    /**
     * @return int
     */
    public function getTotalMinionsKilled(): int
    {
        return $this->totalMinionsKilled;
    }

    /**
     * @return int
     */
    public function getNeutralMinionsKilled(): int
    {
        return $this->neutralMinionsKilled;
    }

    /**
     * @return int
     */
    public function getNeutralMinionsKilledTeamJungle(): int
    {
        return $this->neutralMinionsKilledTeamJungle;
    }

    /**
     * @return int
     */
    public function getNeutralMinionsKilledEnemyJungle(): int
    {
        return $this->neutralMinionsKilledEnemyJungle;
    }

    /**
     * @return int
     */
    public function getTotalTimeCrowdControlDealt(): int
    {
        return $this->totalTimeCrowdControlDealt;
    }

    /**
     * @return int
     */
    public function getChampLevel(): int
    {
        return $this->champLevel;
    }

    /**
     * @return int
     */
    public function getVisionWardsBoughtInGame(): int
    {
        return $this->visionWardsBoughtInGame;
    }

    /**
     * @return int
     */
    public function getSightWardsBoughtInGame(): int
    {
        return $this->sightWardsBoughtInGame;
    }

    /**
     * @return int
     */
    public function getWardsPlaced(): int
    {
        return $this->wardsPlaced;
    }

    /**
     * @return int
     */
    public function getWardsKilled(): int
    {
        return $this->wardsKilled;
    }

    /**
     * @return int
     */
    public function getFirstBloodKill(): int
    {
        return $this->firstBloodKill;
    }

    /**
     * @return int
     */
    public function getFirstBloodAssist(): int
    {
        return $this->firstBloodAssist;
    }

    /**
     * @return int
     */
    public function getFirstTowerKill(): int
    {
        return $this->firstTowerKill;
    }

    /**
     * @return int
     */
    public function getFirstTowerAssist(): int
    {
        return $this->firstTowerAssist;
    }

    /**
     * @return int
     */
    public function getFirstInhibitorKill(): int
    {
        return $this->firstInhibitorKill;
    }

    /**
     * @return int
     */
    public function getFirstInhibitorAssist(): int
    {
        return $this->firstInhibitorAssist;
    }

    /**
     * @return int
     */
    public function getCombatPlayerScore(): int
    {
        return $this->combatPlayerScore;
    }

    /**
     * @return int
     */
    public function getObjectivePlayerScore(): int
    {
        return $this->objectivePlayerScore;
    }

    /**
     * @return int
     */
    public function getTotalPlayerScore(): int
    {
        return $this->totalPlayerScore;
    }

    /**
     * @return int
     */
    public function getTotalScoreRank(): int
    {
        return $this->totalScoreRank;
    }

    /**
     * @return int
     */
    public function getPlayerScore0(): int
    {
        return $this->playerScore0;
    }

    /**
     * @return int
     */
    public function getPlayerScore1(): int
    {
        return $this->playerScore1;
    }

    /**
     * @return int
     */
    public function getPlayerScore2(): int
    {
        return $this->playerScore2;
    }

    /**
     * @return int
     */
    public function getPlayerScore3(): int
    {
        return $this->playerScore3;
    }

    /**
     * @return int
     */
    public function getPlayerScore4(): int
    {
        return $this->playerScore4;
    }

    /**
     * @return int
     */
    public function getPlayerScore5(): int
    {
        return $this->playerScore5;
    }

    /**
     * @return int
     */
    public function getPlayerScore6(): int
    {
        return $this->playerScore6;
    }

    /**
     * @return int
     */
    public function getPlayerScore7(): int
    {
        return $this->playerScore7;
    }

    /**
     * @return int
     */
    public function getPlayerScore8(): int
    {
        return $this->playerScore8;
    }

    /**
     * @return int
     */
    public function getPlayerScore9(): int
    {
        return $this->playerScore9;
    }

    /**
     * @return int
     */
    public function getPerk0(): int
    {
        return $this->perk0;
    }

    /**
     * @return int
     */
    public function getPerk0Var1(): int
    {
        return $this->perk0Var1;
    }

    /**
     * @return int
     */
    public function getPerk0Var2(): int
    {
        return $this->perk0Var2;
    }

    /**
     * @return int
     */
    public function getPerk0Var3(): int
    {
        return $this->perk0Var3;
    }

    /**
     * @return int
     */
    public function getPerk1(): int
    {
        return $this->perk1;
    }

    /**
     * @return int
     */
    public function getPerk1Var1(): int
    {
        return $this->perk1Var1;
    }

    /**
     * @return int
     */
    public function getPerk1Var2(): int
    {
        return $this->perk1Var2;
    }

    /**
     * @return int
     */
    public function getPerk1Var3(): int
    {
        return $this->perk1Var3;
    }

    /**
     * @return int
     */
    public function getPerk2(): int
    {
        return $this->perk2;
    }

    /**
     * @return int
     */
    public function getPerk2Var1(): int
    {
        return $this->perk2Var1;
    }

    /**
     * @return int
     */
    public function getPerk2Var2(): int
    {
        return $this->perk2Var2;
    }

    /**
     * @return int
     */
    public function getPerk2Var3(): int
    {
        return $this->perk2Var3;
    }

    /**
     * @return int
     */
    public function getPerk3(): int
    {
        return $this->perk3;
    }

    /**
     * @return int
     */
    public function getPerk3Var1(): int
    {
        return $this->perk3Var1;
    }

    /**
     * @return int
     */
    public function getPerk3Var2(): int
    {
        return $this->perk3Var2;
    }

    /**
     * @return int
     */
    public function getPerk3Var3(): int
    {
        return $this->perk3Var3;
    }

    /**
     * @return int
     */
    public function getPerk4(): int
    {
        return $this->perk4;
    }

    /**
     * @return int
     */
    public function getPerk4Var1(): int
    {
        return $this->perk4Var1;
    }

    /**
     * @return int
     */
    public function getPerk4Var2(): int
    {
        return $this->perk4Var2;
    }

    /**
     * @return int
     */
    public function getPerk4Var3(): int
    {
        return $this->perk4Var3;
    }

    /**
     * @return int
     */
    public function getPerk5(): int
    {
        return $this->perk5;
    }

    /**
     * @return int
     */
    public function getPerk5Var1(): int
    {
        return $this->perk5Var1;
    }

    /**
     * @return int
     */
    public function getPerk5Var2(): int
    {
        return $this->perk5Var2;
    }

    /**
     * @return int
     */
    public function getPerk5Var3(): int
    {
        return $this->perk5Var3;
    }

    /**
     * @return int
     */
    public function getPerkPrimaryStyle(): int
    {
        return $this->perkPrimaryStyle;
    }

    /**
     * @return int
     */
    public function getPerkSubStyle(): int
    {
        return $this->perkSubStyle;
    }

    /**
     * @return int
     */
    public function getStatPerk0(): int
    {
        return $this->statPerk0;
    }

    /**
     * @return int
     */
    public function getStatPerk1(): int
    {
        return $this->statPerk1;
    }

    /**
     * @return int
     */
    public function getStatPerk2(): int
    {
        return $this->statPerk2;
    }

    /**
     * @return array
     */
    public function getCreepsPerMinDeltas(): array
    {
        return $this->creepsPerMinDeltas;
    }

    /**
     * @return array
     */
    public function getXpPerMinDeltas(): array
    {
        return $this->xpPerMinDeltas;
    }

    /**
     * @return array
     */
    public function getGoldPerMinDeltas(): array
    {
        return $this->goldPerMinDeltas;
    }

    /**
     * @return array
     */
    public function getCsDiffPerMinDeltas(): array
    {
        return $this->csDiffPerMinDeltas;
    }

    /**
     * @return array
     */
    public function getXpDiffPerMinDeltas(): array
    {
        return $this->xpDiffPerMinDeltas;
    }

    /**
     * @return array
     */
    public function getDamageTakenPerMinDeltas(): array
    {
        return $this->damageTakenPerMinDeltas;
    }

    /**
     * @return array
     */
    public function getDamageTakenDiffPerMinDeltas(): array
    {
        return $this->damageTakenDiffPerMinDeltas;
    }

    /**
     * @return string
     */
    public function getRole(): string
    {
        return $this->role;
    }

    /**
     * @return string
     */
    public function getLane(): string
    {
        return $this->lane;
    }
}