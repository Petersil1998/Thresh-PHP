<?php

namespace Thresh\Entities\Match;

use stdClass;
use Thresh\Collections\Items;
use Thresh\Entities\Item;

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
        $this->setProperty($participant, 'participantId');
        $this->setProperty($participant, 'teamId');
        $this->setProperty($participant, 'championId');
        $this->setProperty($participant, 'spell1Id');
        $this->setProperty($participant, 'spell2Id');
        $stats = $participant->stats;
        for ($i = 0; $i < 7; $i++){
            if(property_exists($stats, "item$i")){
                $this->{"item$i"} = Items::getItem($stats->{"item$i"});
            }
        }
        $this->setProperty($stats, 'kills');
        $this->setProperty($stats, 'deaths');
        $this->setProperty($stats, 'assists');
        $this->setProperty($stats, 'largestKillingSpree');
        $this->setProperty($stats, 'largestMultiKill');
        $this->setProperty($stats, 'killingSprees');
        $this->setProperty($stats, 'longestTimeSpentLiving');
        $this->setProperty($stats, 'doubleKills');
        $this->setProperty($stats, 'tripleKills');
        $this->setProperty($stats, 'quadraKills');
        $this->setProperty($stats, 'pentaKills');
        $this->setProperty($stats, 'unrealKills');
        $this->setProperty($stats, 'totalDamageDealt');
        $this->setProperty($stats, 'magicDamageDealt');
        $this->setProperty($stats, 'physicalDamageDealt');
        $this->setProperty($stats, 'trueDamageDealt');
        $this->setProperty($stats, 'largestCriticalStrike');
        $this->setProperty($stats, 'totalDamageDealtToChampions');
        $this->setProperty($stats, 'magicDamageDealtToChampions');
        $this->setProperty($stats, 'physicalDamageDealtToChampions');
        $this->setProperty($stats, 'trueDamageDealtToChampions');
        $this->setProperty($stats, 'totalHeal');
        $this->setProperty($stats, 'totalUnitsHealed');
        $this->setProperty($stats, 'damageSelfMitigated');
        $this->setProperty($stats, 'damageDealtToObjectives');
        $this->setProperty($stats, 'damageDealtToTurrets');
        $this->setProperty($stats, 'visionScore');
        $this->setProperty($stats, 'timeCCingOthers');
        $this->setProperty($stats, 'totalDamageTaken');
        $this->setProperty($stats, 'magicalDamageTaken');
        $this->setProperty($stats, 'physicalDamageTaken');
        $this->setProperty($stats, 'trueDamageTaken');
        $this->setProperty($stats, 'goldEarned');
        $this->setProperty($stats, 'goldSpent');
        $this->setProperty($stats, 'turretKills');
        $this->setProperty($stats, 'inhibitorKills');
        $this->setProperty($stats, 'totalMinionsKilled');
        $this->setProperty($stats, 'neutralMinionsKilled');
        $this->setProperty($stats, 'neutralMinionsKilledTeamJungle');
        $this->setProperty($stats, 'neutralMinionsKilledEnemyJungle');
        $this->setProperty($stats, 'totalTimeCrowdControlDealt');
        $this->setProperty($stats, 'champLevel');
        $this->setProperty($stats, 'visionWardsBoughtInGame');
        $this->setProperty($stats, 'sightWardsBoughtInGame');
        $this->setProperty($stats, 'wardsPlaced');
        $this->setProperty($stats, 'wardsKilled');
        $this->setProperty($stats, 'firstBloodKill');
        $this->setProperty($stats, 'firstBloodAssist');
        $this->setProperty($stats, 'firstTowerKill');
        $this->setProperty($stats, 'firstTowerAssist');
        $this->setProperty($stats, 'firstInhibitorKill');
        $this->setProperty($stats, 'firstInhibitorAssist');
        $this->setProperty($stats, 'combatPlayerScore');
        $this->setProperty($stats, 'objectivePlayerScore');
        $this->setProperty($stats, 'totalPlayerScore');
        $this->setProperty($stats, 'totalScoreRank');
        $this->setProperty($stats, 'playerScore0');
        $this->setProperty($stats, 'playerScore1');
        $this->setProperty($stats, 'playerScore2');
        $this->setProperty($stats, 'playerScore3');
        $this->setProperty($stats, 'playerScore4');
        $this->setProperty($stats, 'playerScore5');
        $this->setProperty($stats, 'playerScore6');
        $this->setProperty($stats, 'playerScore7');
        $this->setProperty($stats, 'playerScore8');
        $this->setProperty($stats, 'playerScore9');
        $this->setProperty($stats, 'perk0');
        $this->setProperty($stats, 'perk0Var1');
        $this->setProperty($stats, 'perk0Var2');
        $this->setProperty($stats, 'perk0Var3');
        $this->setProperty($stats, 'perk1');
        $this->setProperty($stats, 'perk1Var1');
        $this->setProperty($stats, 'perk1Var2');
        $this->setProperty($stats, 'perk1Var3');
        $this->setProperty($stats, 'perk2');
        $this->setProperty($stats, 'perk2Var1');
        $this->setProperty($stats, 'perk2Var2');
        $this->setProperty($stats, 'perk2Var3');
        $this->setProperty($stats, 'perk3');
        $this->setProperty($stats, 'perk3Var1');
        $this->setProperty($stats, 'perk3Var2');
        $this->setProperty($stats, 'perk3Var3');
        $this->setProperty($stats, 'perk4');
        $this->setProperty($stats, 'perk4Var1');
        $this->setProperty($stats, 'perk4Var2');
        $this->setProperty($stats, 'perk4Var3');
        $this->setProperty($stats, 'perk5');
        $this->setProperty($stats, 'perk5Var1');
        $this->setProperty($stats, 'perk5Var2');
        $this->setProperty($stats, 'perk5Var3');
        $this->setProperty($stats, 'perkPrimaryStyle');
        $this->setProperty($stats, 'perkSubStyle');
        $this->setProperty($stats, 'statPerk0');
        $this->setProperty($stats, 'statPerk1');
        $this->setProperty($stats, 'statPerk2');;
        $timeline = $participant->timeline;
        $this->setProperty($timeline, 'creepsPerMinDeltas', '',true);
        $this->setProperty($timeline, 'xpPerMinDeltas', '',true);
        $this->setProperty($timeline, 'goldPerMinDeltas', '',true);
        $this->setProperty($timeline, 'csDiffPerMinDeltas', '',true);
        $this->setProperty($timeline, 'xpDiffPerMinDeltas', '',true);
        $this->setProperty($timeline, 'damageTakenPerMinDeltas', '',true);
        $this->setProperty($timeline, 'damageTakenDiffPerMinDeltas', '',true);
        $this->setProperty($timeline, 'role');
        $this->setProperty($timeline, 'lane');
    }

    /**
     * @param $object stdClass The object that holds the property to be set
     * @param $property string The properties name (has to be the same in $this and in the object)
     * @param $alternativeName string The alternative Property name if it differs from the objects property name
     * @param $convertPropertyToArray bool whether or not the property should be converted to an associative array
     * (only works if the property is instance of stdClass)
     */
    protected function setProperty($object, $property, $alternativeName = '', $convertPropertyToArray = false){
        $thisFieldName = $property;
        if(!empty($alternativeName)){
            $thisFieldName = $alternativeName;
        }
        if(property_exists($object, $property)){
            if($convertPropertyToArray && $object->$property instanceof stdClass){
                $this->$thisFieldName = json_decode(json_encode($object->$property), true);
            } else {
                $this->$thisFieldName = $object->$property;
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