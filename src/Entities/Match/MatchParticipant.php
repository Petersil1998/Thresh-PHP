<?php

namespace Thresh\Entities\Match;

use stdClass;
use Thresh\Entities\Summoner\Summoner;
use Thresh_Core\Collections\Champions;
use Thresh_Core\Collections\Items;
use Thresh_Core\Collections\Runes;
use Thresh_Core\Collections\RuneStats;
use Thresh_Core\Collections\RuneStyles;
use Thresh_Core\Collections\SummonerSpells;
use Thresh_Core\Objects\Champions\Champion;
use Thresh_Core\Objects\Item;
use Thresh_Core\Objects\Runes\Rune;
use Thresh_Core\Objects\Runes\RuneStat;
use Thresh_Core\Objects\Runes\RuneStyle;
use Thresh_Core\Objects\SummonerSpell;

/**
 * This class represents a Match Participant
 * @package Thresh\Entities\Match
 */
class MatchParticipant
{
    /**
     * @var int
     */
    private $participantId;

    /**
     * @var Champion
     */
    private $champion;

    /**
     * @var SummonerSpell
     */
    private $summonerSpell1;

    /**
     * @var SummonerSpell
     */
    private $summonerSpell2;

    /**
     * @var Item
     */
    private $item0;

    /**
     * @var Item
     */
    private $item1;

    /**
     * @var Item
     */
    private $item2;

    /**
     * @var Item
     */
    private $item3;

    /**
     * @var Item
     */
    private $item4;

    /**
     * @var Item
     */
    private $item5;

    /**
     * @var Item
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
    private $magicDamageTaken;

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
    private $totalTimeCCDealt;

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
     * @var Rune
     */
    private $keyStone;

    /**
     * @var int
     */
    private $keyStoneExtra1;

    /**
     * @var int
     */
    private $keyStoneExtra2;

    /**
     * @var int
     */
    private $keyStoneExtra3;

    /**
     * @var Rune
     */
    private $primarySub1;

    /**
     * @var int
     */
    private $primarySub1Extra1;

    /**
     * @var int
     */
    private $primarySub1Extra2;

    /**
     * @var int
     */
    private $primarySub1Extra3;

    /**
     * @var Rune
     */
    private $primarySub2;

    /**
     * @var int
     */
    private $primarySub2Extra1;

    /**
     * @var int
     */
    private $primarySub2Extra2;

    /**
     * @var int
     */
    private $primarySub2Extra3;

    /**
     * @var Rune
     */
    private $primarySub3;

    /**
     * @var int
     */
    private $primarySub3Extra1;

    /**
     * @var int
     */
    private $primarySub3Extra2;

    /**
     * @var int
     */
    private $primarySub3Extra3;

    /**
    * @var Rune
    */
    private $secondarySub1;

    /**
     * @var int
     */
    private $secondarySub1Extra1;

    /**
     * @var int
     */
    private $secondarySub1Extra2;

    /**
     * @var int
     */
    private $secondarySub1Extra3;

    /**
     * @var Rune
     */
    private $secondarySub2;

    /**
     * @var int
     */
    private $secondarySub2Extra1;

    /**
     * @var int
     */
    private $secondarySub2Extra2;

    /**
     * @var int
     */
    private $secondarySub2Extra3;

    /**
     * @var RuneStyle
     */
    private $primaryStyle;

    /**
     * @var RuneStyle
     */
    private $secondaryStyle;

    /**
     * @var RuneStat
     */
    private $statDefense;

    /**
     * @var RuneStat
     */
    private $statFlex;

    /**
     * @var RuneStat
     */
    private $statOffense;

    /**
     * @var string
     */
    private $role;

    /**
     * @var string
     */
    private $lane;

    /**
     * @var int
     */
    private $baronKills;

    /**
     * @var int
     */
    private $bountyLevel;

    /**
     * @var int
     */
    private $champExperience;

    /**
     * @var int
     */
    private $championTransform;

    /**
     * @var int
     */
    private $consumablesPurchased;

    /**
     * @var int
     */
    private $controlWardsPlaces;

    /**
     * @var int
     */
    private $damageDealtToBuildings;

    /**
     * @var int
     */
    private $dragonKills;

    /**
     * @var bool
     */
    private $gameEndedInEarlySurrender;

    /**
     * @var bool
     */
    private $gameEndedInSurrender;

    /**
     * @var string
     */
    private $individualPosition;

    /**
     * @var int
     */
    private $inhibitorTakedowns;

    /**
     * @var int
     */
    private $inhibitorsLost;

    /**
     * @var int
     */
    private $itemsPurchased;

    /**
     * @var int
     */
    private $nexusKills;

    /**
     * @var int
     */
    private $nexusLost;

    /**
     * @var int
     */
    private $nexusTakedowns;

    /**
     * @var int
     */
    private $objectivesStolen;

    /**
     * @var int
     */
    private $objectivesStolenAssists;

    /**
     * @var Summoner
     */
    private $summoner;

    /**
     * @var int
     */
    private $spell1Casts;

    /**
     * @var int
     */
    private $spell2Casts;

    /**
     * @var int
     */
    private $spell3Casts;

    /**
     * @var int
     */
    private $spell4Casts;

    /**
     * @var int
     */
    private $summonerSpell1Casts;

    /**
     * @var int
     */
    private $summonerSpell2Casts;

    /**
     * @var bool
     */
    private $teamEarlySurrendered;

    /**
     * @var int
     */
    private $teamId;

    /**
     * @var string
     */
    private $teamPosition;

    /**
     * @var int
     */
    private $timePlayed;

    /**
     * @var int
     */
    private $totalDamageShieldedOnTeammates;

    /**
     * @var int
     */
    private $totalHealsOnTeammates;

    /**
     * @var int
     */
    private $totalTimeSpentDead;

    /**
     * @var int
     */
    private $turretTakedowns;

    /**
     * @var int
     */
    private $turretsLost;

    /**
     * @var bool
     */
    private $won;

    /**
     * MatchParticipant constructor.
     * @param stdClass $participantData
     */
    public function __construct(stdClass $participantData)
    {
        $this->assists = $participantData->assists;
        $this->baronKills = $participantData->baronKills;
        $this->bountyLevel = $participantData->bountyLevel;
        $this->champExperience = $participantData->champExperience;
        $this->champLevel = $participantData->champLevel;
        $this->champion = Champions::getChampion($participantData->championId);
        $this->championTransform = $participantData->championTransform;
        $this->consumablesPurchased = $participantData->consumablesPurchased;
        $this->controlWardsPlaces = $participantData->detectorWardsPlaced;
        $this->damageDealtToBuildings = $participantData->damageDealtToBuildings;
        $this->damageDealtToObjectives = $participantData->damageDealtToObjectives;
        $this->damageDealtToTurrets = $participantData->damageDealtToTurrets;
        $this->damageSelfMitigated = $participantData->damageSelfMitigated;
        $this->deaths = $participantData->deaths;
        $this->doubleKills = $participantData->doubleKills;
        $this->dragonKills = $participantData->dragonKills;
        $this->firstBloodAssist = $participantData->firstBloodAssist;
        $this->firstBloodKill = $participantData->firstBloodKill;
        $this->firstTowerAssist = $participantData->firstTowerAssist;
        $this->firstTowerKill = $participantData->firstTowerKill;
        $this->gameEndedInEarlySurrender = $participantData->gameEndedInEarlySurrender;
        $this->gameEndedInSurrender = $participantData->gameEndedInSurrender;
        $this->goldEarned = $participantData->goldEarned;
        $this->goldSpent = $participantData->goldSpent;
        $this->individualPosition = $participantData->individualPosition;
        $this->inhibitorKills = $participantData->inhibitorKills;
        $this->inhibitorTakedowns = $participantData->inhibitorTakedowns;
        $this->inhibitorsLost = $participantData->inhibitorsLost;
        $this->itemsPurchased = $participantData->itemsPurchased;
        $this->killingSprees = $participantData->killingSprees;
        $this->kills = $participantData->kills;
        $this->lane = $participantData->lane;
        $this->largestCriticalStrike = $participantData->largestCriticalStrike;
        $this->largestKillingSpree = $participantData->largestKillingSpree;
        $this->largestMultiKill = $participantData->largestMultiKill;
        $this->longestTimeSpentLiving = $participantData->longestTimeSpentLiving;
        $this->magicDamageDealt = $participantData->magicDamageDealt;
        $this->magicDamageDealtToChampions = $participantData->magicDamageDealtToChampions;
        $this->magicDamageTaken = $participantData->magicDamageTaken;
        $this->neutralMinionsKilled = $participantData->neutralMinionsKilled;
        $this->nexusKills = $participantData->nexusKills;
        $this->nexusLost = $participantData->nexusLost;
        $this->nexusTakedowns = $participantData->nexusTakedowns;
        $this->objectivesStolen = $participantData->objectivesStolen;
        $this->objectivesStolenAssists = $participantData->objectivesStolenAssists;
        $this->participantId = $participantData->participantId;
        $this->pentaKills = $participantData->pentaKills;
        $this->physicalDamageDealt = $participantData->physicalDamageDealt;
        $this->physicalDamageDealtToChampions = $participantData->physicalDamageDealtToChampions;
        $this->physicalDamageTaken = $participantData->physicalDamageTaken;
        $this->quadraKills = $participantData->quadraKills;
        $this->role = $participantData->role;
        $this->sightWardsBoughtInGame = $participantData->sightWardsBoughtInGame;
        $this->summoner = Summoner::getSummonerByPUUID($participantData->puuid);
        $this->spell1Casts = $participantData->spell1Casts;
        $this->spell2Casts = $participantData->spell2Casts;
        $this->spell3Casts = $participantData->spell3Casts;
        $this->spell4Casts = $participantData->spell4Casts;
        $this->summonerSpell1 = SummonerSpells::getSummonerSpell($participantData->summoner1Id);
        $this->summonerSpell1Casts = $participantData->summoner1Casts;
        $this->summonerSpell2 = SummonerSpells::getSummonerSpell($participantData->summoner2Id);
        $this->summonerSpell2Casts = $participantData->summoner2Casts;
        $this->teamEarlySurrendered = $participantData->teamEarlySurrendered;
        $this->teamId = $participantData->teamId;
        $this->teamPosition = $participantData->teamPosition;
        $this->timeCCingOthers = $participantData->timeCCingOthers;
        $this->timePlayed = $participantData->timePlayed;
        $this->totalDamageDealt = $participantData->totalDamageDealt;
        $this->totalDamageDealtToChampions = $participantData->totalDamageDealtToChampions;
        $this->totalDamageShieldedOnTeammates = $participantData->totalDamageShieldedOnTeammates;
        $this->totalDamageTaken = $participantData->totalDamageTaken;
        $this->totalHeal = $participantData->totalHeal;
        $this->totalHealsOnTeammates = $participantData->totalHealsOnTeammates;
        $this->totalMinionsKilled = $participantData->totalMinionsKilled;
        $this->totalTimeCCDealt = $participantData->totalTimeCCDealt;
        $this->totalTimeSpentDead = $participantData->totalTimeSpentDead;
        $this->totalUnitsHealed = $participantData->totalUnitsHealed;
        $this->tripleKills = $participantData->tripleKills;
        $this->trueDamageDealt = $participantData->trueDamageDealt;
        $this->trueDamageDealtToChampions = $participantData->trueDamageDealtToChampions;
        $this->trueDamageTaken = $participantData->trueDamageTaken;
        $this->turretKills = $participantData->turretKills;
        $this->turretTakedowns = $participantData->turretTakedowns;
        $this->turretsLost = $participantData->turretsLost;
        $this->unrealKills = $participantData->unrealKills;
        $this->visionScore = $participantData->visionScore;
        $this->visionWardsBoughtInGame = $participantData->visionWardsBoughtInGame;
        $this->wardsPlaced = $participantData->wardsPlaced;
        $this->wardsKilled = $participantData->wardsKilled;
        $this->won = $participantData->win;

        $this->keyStone = Runes::getRune($participantData->perks->styles[0]->selections[0]->perk);
        $this->keyStoneExtra1 = $participantData->perks->styles[0]->selections[0]->var1;
        $this->keyStoneExtra2 = $participantData->perks->styles[0]->selections[0]->var2;
        $this->keyStoneExtra3 = $participantData->perks->styles[0]->selections[0]->var3;
        $this->primarySub1 = Runes::getRune($participantData->perks->styles[0]->selections[1]->perk);
        $this->primarySub1Extra1 = $participantData->perks->styles[0]->selections[1]->var1;
        $this->primarySub1Extra2 = $participantData->perks->styles[0]->selections[1]->var2;
        $this->primarySub1Extra3 = $participantData->perks->styles[0]->selections[1]->var3;
        $this->primarySub2 = Runes::getRune($participantData->perks->styles[0]->selections[2]->perk);
        $this->primarySub2Extra1 = $participantData->perks->styles[0]->selections[2]->var1;
        $this->primarySub2Extra2 = $participantData->perks->styles[0]->selections[2]->var2;
        $this->primarySub2Extra3 = $participantData->perks->styles[0]->selections[2]->var3;
        $this->primarySub3 = Runes::getRune($participantData->perks->styles[0]->selections[3]->perk);
        $this->primarySub3Extra1 = $participantData->perks->styles[0]->selections[3]->var1;
        $this->primarySub3Extra2 = $participantData->perks->styles[0]->selections[3]->var2;
        $this->primarySub3Extra3 = $participantData->perks->styles[0]->selections[3]->var3;
        $this->primaryStyle = RuneStyles::getRuneStyle($participantData->perks->styles[0]->style);

        $this->secondarySub1 = Runes::getRune($participantData->perks->styles[1]->selections[0]->perk);
        $this->secondarySub1Extra1 = $participantData->perks->styles[1]->selections[0]->var1;
        $this->secondarySub1Extra2 = $participantData->perks->styles[1]->selections[0]->var2;
        $this->secondarySub1Extra3 = $participantData->perks->styles[1]->selections[0]->var3;
        $this->secondarySub2 = Runes::getRune($participantData->perks->styles[1]->selections[1]->perk);
        $this->secondarySub2Extra1 = $participantData->perks->styles[1]->selections[1]->var1;
        $this->secondarySub2Extra2 = $participantData->perks->styles[1]->selections[1]->var2;
        $this->secondarySub2Extra3 = $participantData->perks->styles[1]->selections[1]->var3;
        $this->secondaryStyle = RuneStyles::getRuneStyle($participantData->perks->styles[1]->style);

        $this->statDefense = RuneStats::getRuneStat($participantData->perks->statPerks->defense);
        $this->statFlex= RuneStats::getRuneStat($participantData->perks->statPerks->flex);
        $this->statOffense = RuneStats::getRuneStat($participantData->perks->statPerks->offense);

        for ($i = 0; $i < 7; $i++){
            if(property_exists($participantData, "item$i")){
                $this->{"item$i"} = Items::getItem($participantData->{"item$i"});
            }
        }
    }

    /**
     * @return int
     */
    public function getParticipantId(): int
    {
        return $this->participantId;
    }

    /**
     * @return Champion
     */
    public function getChampion(): Champion
    {
        return $this->champion;
    }

    /**
     * @return SummonerSpell
     */
    public function getSummonerSpell1(): SummonerSpell
    {
        return $this->summonerSpell1;
    }

    /**
     * @return SummonerSpell
     */
    public function getSummonerSpell2(): SummonerSpell
    {
        return $this->summonerSpell2;
    }

    /**
     * @return Item
     */
    public function getItem0(): Item
    {
        return $this->item0;
    }

    /**
     * @return Item
     */
    public function getItem1(): Item
    {
        return $this->item1;
    }

    /**
     * @return Item
     */
    public function getItem2(): Item
    {
        return $this->item2;
    }

    /**
     * @return Item
     */
    public function getItem3(): Item
    {
        return $this->item3;
    }

    /**
     * @return Item
     */
    public function getItem4(): Item
    {
        return $this->item4;
    }

    /**
     * @return Item
     */
    public function getItem5(): Item
    {
        return $this->item5;
    }

    /**
     * @return Item
     */
    public function getItem6(): Item
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
    public function getMagicDamageTaken(): int
    {
        return $this->magicDamageTaken;
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
    public function getTotalTimeCCDealt(): int
    {
        return $this->totalTimeCCDealt;
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
     * @return Rune
     */
    public function getKeyStone(): Rune
    {
        return $this->keyStone;
    }

    /**
     * @return int
     */
    public function getKeyStoneExtra1(): int
    {
        return $this->keyStoneExtra1;
    }

    /**
     * @return int
     */
    public function getKeyStoneExtra2(): int
    {
        return $this->keyStoneExtra2;
    }

    /**
     * @return int
     */
    public function getKeyStoneExtra3(): int
    {
        return $this->keyStoneExtra3;
    }

    /**
     * @return Rune
     */
    public function getPrimarySub1(): Rune
    {
        return $this->primarySub1;
    }

    /**
     * @return int
     */
    public function getPrimarySub1Extra1(): int
    {
        return $this->primarySub1Extra1;
    }

    /**
     * @return int
     */
    public function getPrimarySub1Extra2(): int
    {
        return $this->primarySub1Extra2;
    }

    /**
     * @return int
     */
    public function getPrimarySub1Extra3(): int
    {
        return $this->primarySub1Extra3;
    }

    /**
     * @return Rune
     */
    public function getPrimarySub2(): Rune
    {
        return $this->primarySub2;
    }

    /**
     * @return int
     */
    public function getPrimarySub2Extra1(): int
    {
        return $this->primarySub2Extra1;
    }

    /**
     * @return int
     */
    public function getPrimarySub2Extra2(): int
    {
        return $this->primarySub2Extra2;
    }

    /**
     * @return int
     */
    public function getPrimarySub2Extra3(): int
    {
        return $this->primarySub2Extra3;
    }

    /**
     * @return Rune
     */
    public function getPrimarySub3(): Rune
    {
        return $this->primarySub3;
    }

    /**
     * @return int
     */
    public function getPrimarySub3Extra1(): int
    {
        return $this->primarySub3Extra1;
    }

    /**
     * @return int
     */
    public function getPrimarySub3Extra2(): int
    {
        return $this->primarySub3Extra2;
    }

    /**
     * @return int
     */
    public function getPrimarySub3Extra3(): int
    {
        return $this->primarySub3Extra3;
    }

    /**
     * @return Rune
     */
    public function getSecondarySub1(): Rune
    {
        return $this->secondarySub1;
    }

    /**
     * @return int
     */
    public function getSecondarySub1Extra1(): int
    {
        return $this->secondarySub1Extra1;
    }

    /**
     * @return int
     */
    public function getSecondarySub1Extra2(): int
    {
        return $this->secondarySub1Extra2;
    }

    /**
     * @return int
     */
    public function getSecondarySub1Extra3(): int
    {
        return $this->secondarySub1Extra3;
    }

    /**
     * @return Rune
     */
    public function getSecondarySub2(): Rune
    {
        return $this->secondarySub2;
    }

    /**
     * @return int
     */
    public function getSecondarySub2Extra1(): int
    {
        return $this->secondarySub2Extra1;
    }

    /**
     * @return int
     */
    public function getSecondarySub2Extra2(): int
    {
        return $this->secondarySub2Extra2;
    }

    /**
     * @return int
     */
    public function getSecondarySub2Extra3(): int
    {
        return $this->secondarySub2Extra3;
    }

    /**
     * @return RuneStyle
     */
    public function getPrimaryStyle(): RuneStyle
    {
        return $this->primaryStyle;
    }

    /**
     * @return RuneStyle
     */
    public function getSecondaryStyle(): RuneStyle
    {
        return $this->secondaryStyle;
    }

    /**
     * @return RuneStat
     */
    public function getStatDefense(): RuneStat
    {
        return $this->statDefense;
    }

    /**
     * @return RuneStat
     */
    public function getStatFlex(): RuneStat
    {
        return $this->statFlex;
    }

    /**
     * @return RuneStat
     */
    public function getStatOffense(): RuneStat
    {
        return $this->statOffense;
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

    /**
     * @return int
     */
    public function getBaronKills(): int
    {
        return $this->baronKills;
    }

    /**
     * @return int
     */
    public function getBountyLevel(): int
    {
        return $this->bountyLevel;
    }

    /**
     * @return int
     */
    public function getChampExperience(): int
    {
        return $this->champExperience;
    }

    /**
     * @return int
     */
    public function getChampionTransform(): int
    {
        return $this->championTransform;
    }

    /**
     * @return int
     */
    public function getConsumablesPurchased(): int
    {
        return $this->consumablesPurchased;
    }

    /**
     * @return int
     */
    public function getControlWardsPlaces(): int
    {
        return $this->controlWardsPlaces;
    }

    /**
     * @return int
     */
    public function getDamageDealtToBuildings(): int
    {
        return $this->damageDealtToBuildings;
    }

    /**
     * @return int
     */
    public function getDragonKills(): int
    {
        return $this->dragonKills;
    }

    /**
     * @return bool
     */
    public function hasGameEndedInEarlySurrender(): bool
    {
        return $this->gameEndedInEarlySurrender;
    }

    /**
     * @return bool
     */
    public function hasGameEndedInSurrender(): bool
    {
        return $this->gameEndedInSurrender;
    }

    /**
     * @return string
     */
    public function getIndividualPosition(): string
    {
        return $this->individualPosition;
    }

    /**
     * @return int
     */
    public function getInhibitorsLost(): int
    {
        return $this->inhibitorsLost;
    }

    /**
     * @return int
     */
    public function getInhibitorTakedowns(): int
    {
        return $this->inhibitorTakedowns;
    }

    /**
     * @return int
     */
    public function getItemsPurchased(): int
    {
        return $this->itemsPurchased;
    }

    /**
     * @return int
     */
    public function getNexusKills(): int
    {
        return $this->nexusKills;
    }

    /**
     * @return int
     */
    public function getNexusLost(): int
    {
        return $this->nexusLost;
    }

    /**
     * @return int
     */
    public function getNexusTakedowns(): int
    {
        return $this->nexusTakedowns;
    }

    /**
     * @return int
     */
    public function getObjectivesStolen(): int
    {
        return $this->objectivesStolen;
    }

    /**
     * @return int
     */
    public function getObjectivesStolenAssists(): int
    {
        return $this->objectivesStolenAssists;
    }

    /**
     * @return Summoner
     */
    public function getSummoner(): Summoner
    {
        return $this->summoner;
    }

    /**
     * @return int
     */
    public function getSpell1Casts(): int
    {
        return $this->spell1Casts;
    }

    /**
     * @return int
     */
    public function getSpell2Casts(): int
    {
        return $this->spell2Casts;
    }

    /**
     * @return int
     */
    public function getSpell3Casts(): int
    {
        return $this->spell3Casts;
    }

    /**
     * @return int
     */
    public function getSpell4Casts(): int
    {
        return $this->spell4Casts;
    }

    /**
     * @return int
     */
    public function getSummonerSpell1Casts(): int
    {
        return $this->summonerSpell1Casts;
    }

    /**
     * @return int
     */
    public function getSummonerSpell2Casts(): int
    {
        return $this->summonerSpell2Casts;
    }

    /**
     * @return bool
     */
    public function hasTeamEarlySurrendered(): bool
    {
        return $this->teamEarlySurrendered;
    }

    /**
     * @return int
     */
    public function getTeamId(): int
    {
        return $this->teamId;
    }

    /**
     * @return string
     */
    public function getTeamPosition(): string
    {
        return $this->teamPosition;
    }

    /**
     * @return int
     */
    public function getTimePlayed(): int
    {
        return $this->timePlayed;
    }

    /**
     * @return int
     */
    public function getTotalDamageShieldedOnTeammates(): int
    {
        return $this->totalDamageShieldedOnTeammates;
    }

    /**
     * @return int
     */
    public function getTotalHealsOnTeammates(): int
    {
        return $this->totalHealsOnTeammates;
    }

    /**
     * @return int
     */
    public function getTotalTimeSpentDead(): int
    {
        return $this->totalTimeSpentDead;
    }

    /**
     * @return int
     */
    public function getTurretsLost(): int
    {
        return $this->turretsLost;
    }

    /**
     * @return int
     */
    public function getTurretTakedowns(): int
    {
        return $this->turretTakedowns;
    }

    /**
     * @return bool
     */
    public function hasWon(): bool
    {
        return $this->won;
    }
}