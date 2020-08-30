<?php

namespace Thresh\Helper;

use RuntimeException;
use Thresh\Collections\Champions;
use Thresh\Collections\Items;
use Thresh\Collections\Maps;
use Thresh\Collections\QueueTypes;
use Thresh\Collections\Runes;
use Thresh\Collections\RuneStats;
use Thresh\Collections\RuneStyles;
use Thresh\Collections\SummonerSpells;
use Thresh\Constants\Constants;
use Thresh\Entities\Champions\Champion;
use Thresh\Entities\Champions\Skin;
use Thresh\Entities\Champions\Stats;
use Thresh\Entities\Item;
use Thresh\Entities\Map;
use Thresh\Entities\QueueType;
use Thresh\Entities\Runes\Rune;
use Thresh\Entities\Runes\RuneStat;
use Thresh\Entities\Runes\RuneStyle;
use Thresh\Entities\Sprite;
use Thresh\Entities\SummonerSpell;

define('BASE_PATH', dirname(dirname(dirname(__FILE__))));

/**
 * This class is used to initialize the project
 * @package Thresh\Helper
 */
class Loader
{
    private const RUNE_STATS_FILE_PATH = BASE_PATH.'/src/runeStats.json';
    private const RUNES_AND_RUNE_STYLES_FILE_PATH = BASE_PATH.'/src/runes.json';
    private const DDRAGON_VERSION_FILE_PATH = BASE_PATH.'/src/ddragonVersion.txt';
    private const MAPS_FILE_PATH = BASE_PATH.'/src/maps.json';
    private const CHAMPIONS_FILE_PATH = BASE_PATH.'/src/champions.json';
    private const QUEUE_TYPES_FILE_PATH = BASE_PATH.'/src/queues.json';
    private const ITEMS_FILE_PATH = BASE_PATH.'/src/items.json';
    private const SUMMONER_SPELLS_FILE_PATH = BASE_PATH.'/src/summonerSpells.json';

    /**
     * This method initializes all Collections and checks for a new Data Dragon Version
     */
    public static function init(){
        if(self::initAndUpdateDDragonVersion()) {
            self::updateRunesAndRuneStylesFile();
            self::updateRuneStatsFile();
            self::updateMapsFile();
            self::updateChampionsFile();
            self::updateQueueTypesFile();
            self::updateItemsFile();
            self::updateSummonerSpellsFile();
        }
        self::loadRuneStyles();
        self::loadRunes();
        self::loadRuneStats();
        self::loadMaps();
        self::loadChampions();
        self::loadQueueTypes();
        self::loadItems();
        self::postLoadItems();
        self::loadSummonerSpells();
    }

    private static function initAndUpdateDDragonVersion(){
        $newVersion = json_decode(file_get_contents(Constants::DDRAGON_BASE_PATH . 'api/versions.json'))[0];
        Constants::setDataDragonVersion($newVersion);
        $fileHandler = new FileHandler(self::DDRAGON_VERSION_FILE_PATH, 'r');
        $currentVersion = $fileHandler->read();
        $fileHandler->close();
        if($currentVersion !== $newVersion){
            $fileHandler = new FileHandler(self::DDRAGON_VERSION_FILE_PATH, 'w');
            $fileHandler->write($newVersion);
            $fileHandler->close();
            return true;
        }
        return false;
    }

    private static function updateRunesAndRuneStylesFile(){
        $fileHandler = new FileHandler(self::RUNES_AND_RUNE_STYLES_FILE_PATH, 'w');
        $runes = file_get_contents(Constants::DDRAGON_BASE_PATH.'cdn/'.Constants::getDataDragonVersion().'/data/en_US/runesReforged.json');
        $fileHandler->write($runes);
        $fileHandler->close();
    }

    private static function loadRunes(){
        $runes = array();
        $fileHandler = new FileHandler(self::RUNES_AND_RUNE_STYLES_FILE_PATH, 'r');
        $json = json_decode($fileHandler->read());
        $fileHandler->close();
        foreach ($json as $runeStyle) {
            foreach ($runeStyle->slots as $slot){
                foreach ($slot->runes as $rune){
                    $runes[] = new Rune($rune->id, $rune->key, $rune->icon, $rune->name, $rune->shortDesc, $rune->longDesc,
                        RuneStyles::getRuneStyle(self::getRuneStyleIDByRuneID($rune->id))
                    );
                }
            }
        }
        Runes::setRunes($runes);
    }

    private static function loadRuneStyles(){
        $runeStyles = array();
        $fileHandler = new FileHandler(self::RUNES_AND_RUNE_STYLES_FILE_PATH, 'r');
        $json = json_decode($fileHandler->read());
        $fileHandler->close();
        foreach ($json as $runeStyle) {
            $runeStyles[] = new RuneStyle($runeStyle->id, $runeStyle->key, $runeStyle->icon, $runeStyle->name);
        }
        RuneStyles::setRuneStyles($runeStyles);
    }

    private static function updateRuneStatsFile(){
        $fileHandler = new FileHandler(self::RUNE_STATS_FILE_PATH, 'r');
        $fileSize = $fileHandler->getFileSize();
        $fileHandler->close();
        if($fileSize <= 2){
            $runeStats = array();
            $runes = json_decode(file_get_contents('https://raw.communitydragon.org/latest/plugins/rcp-be-lol-game-data/global/default/v1/perks.json'));
            foreach ($runes as $rune){
                if(substr($rune->id,0,1) == '5'){
                    array_push($runeStats, json_encode($rune));
                }
            }
            self::writeJSONArrayToFile($runeStats, self::RUNE_STATS_FILE_PATH);
        }
    }

    private static function loadRuneStats(){
        $runeStats = array();
        $fileHandler = new FileHandler(self::RUNE_STATS_FILE_PATH, 'r');
        $json = json_decode(str_replace('\\', '', $fileHandler->read()));
        $fileHandler->close();
        foreach ($json as $runeStat) {
            $runeStats[] = new RuneStat($runeStat->id, $runeStat->name, $runeStat->shortDesc,
                $runeStat->longDesc, $runeStat->iconPath);
        }
        RuneStats::setRuneStats($runeStats);
    }

    private static function updateMapsFile(){
        $fileHandler = new FileHandler(self::MAPS_FILE_PATH, 'w');
        $maps = json_encode(json_decode(file_get_contents(Constants::DDRAGON_BASE_PATH.'cdn/'.Constants::getDataDragonVersion().'/data/en_US/map.json'))->data);
        $fileHandler->write($maps);
        $fileHandler->close();
    }

    private static function loadMaps(){
        $maps = array();
        $fileHandler = new FileHandler(self::MAPS_FILE_PATH, 'r');
        $json = json_decode($fileHandler->read());
        $fileHandler->close();
        foreach ($json as $key => $map) {
            $image = $map->image;
            $sprite = new Sprite($image->sprite, $image->group, $image->x, $image->y, $image->w, $image->h);
            $maps[] = new Map($map->MapName, $map->MapId, $image->full, $sprite);
        }
        Maps::setMaps($maps);
    }

    private static function updateChampionsFile(){
        $json = self::createChampionsJSON();
        $fileHandler = new FileHandler(self::CHAMPIONS_FILE_PATH, 'w');
        $fileHandler->write($json);
        $fileHandler->close();
    }

    private static function loadChampions(){
        $champions = array();
        $fileHandler = new FileHandler(self::CHAMPIONS_FILE_PATH, 'r');
        $json = json_decode($fileHandler->read());
        $fileHandler->close();
        foreach ($json as $championJson) {
            $spriteJson = $championJson->sprite;
            $sprite = new Sprite($spriteJson->sprite, $spriteJson->group, $spriteJson->x, $spriteJson->y,
                $spriteJson->width, $spriteJson->height);
            $skins = array();
            foreach ($championJson->skins as $skinJson){
                $skins[] = new Skin($skinJson->id, $skinJson->name, $skinJson->chromas);
            }
            $statsJson = $championJson->stats;
            $baseStats = new Stats(
                $statsJson->health,
                $statsJson->healthPerLevel,
                $statsJson->resource,
                $statsJson->resourcePerLevel,
                $statsJson->movementSpeed,
                $statsJson->armor,
                $statsJson->armorPerLevel,
                $statsJson->magicResist,
                $statsJson->magicResistPerLevel,
                $statsJson->attackRange,
                $statsJson->healthRegeneration,
                $statsJson->healthRegenerationPerLevel,
                $statsJson->resourceRegeneration,
                $statsJson->resourceRegenerationPerLevel,
                $statsJson->critChance,
                $statsJson->critChancePerLevel,
                $statsJson->attackDamage,
                $statsJson->attackDamagePerLevel,
                $statsJson->attackSpeed,
                $statsJson->attackSpeedPerLevel
            );
            $champions[] = new Champion($championJson->id, $championJson->name, $championJson->title,
                $championJson->fullImage, $sprite, $skins, $championJson->lore, $championJson->allyTips,
                $championJson->enemyTips, $championJson->tags, $championJson->resourceType, $baseStats
            );
        }
        Champions::setChampions($champions);
    }

    private static function updateQueueTypesFile(){
        $fileHandler = new FileHandler(self::QUEUE_TYPES_FILE_PATH, 'w');
        $queues = file_get_contents(Constants::STATIC_DATA_BASE_PATH.'queues.json');
        $fileHandler->write($queues);
        $fileHandler->close();
    }

    private static function loadQueueTypes(){
        $queueTypes = array();
        $fileHandler = new FileHandler(self::QUEUE_TYPES_FILE_PATH, 'r');
        $json = json_decode($fileHandler->read());
        $fileHandler->close();
        foreach ($json as $queue) {
            $queueTypes[] = new QueueType($queue->queueId, $queue->map, $queue->description, $queue->notes);
        }
        QueueTypes::setQueueTypes($queueTypes);
    }

    private static function updateItemsFile(){
        $fileHandler = new FileHandler(self::ITEMS_FILE_PATH, 'w');
        $items  = json_decode(file_get_contents(Constants::DDRAGON_BASE_PATH.'cdn/'.Constants::getDataDragonVersion().'/data/en_US/item.json'))->data;
        foreach ($items as $key => $item) {
            if(property_exists($item, 'colloq')){
                unset($item->colloq);
            }
        }
        $fileHandler->write(json_encode($items));
        $fileHandler->close();
    }

    private static function loadItems(){
        $items = array();
        $fileHandler = new FileHandler(self::ITEMS_FILE_PATH, 'r');
        $json = json_decode($fileHandler->read());
        $fileHandler->close();
        foreach ($json as $key => $item) {
            $items[] = new Item($key, $item);
        }
        Items::setItems($items);
    }

    private static function postLoadItems(){
        foreach (Items::getItems() as $item){
            $item->postItemsLoaded();
        }
    }

    private static function updateSummonerSpellsFile(){
        $fileHandler = new FileHandler(self::SUMMONER_SPELLS_FILE_PATH, 'w');
        $summonerSpells  = json_decode(file_get_contents(Constants::DDRAGON_BASE_PATH.'cdn/'.Constants::getDataDragonVersion().'/data/en_US/summoner.json'))->data;
        foreach ($summonerSpells as $name => $summonerSpell) {
            unset($summonerSpell->tooltip);
            $summonerSpell->cooldown = $summonerSpell->cooldown[0];
            unset($summonerSpell->cooldownBurn);
            unset($summonerSpell->cost);
            unset($summonerSpell->costBurn);
            unset($summonerSpell->datavalues);
            unset($summonerSpell->effect);
            unset($summonerSpell->effectBurn);
            unset($summonerSpell->vars);
            unset($summonerSpell->costType);
            unset($summonerSpell->maxammo);
            $summonerSpell->range = $summonerSpell->range[0];
            unset($summonerSpell->rangeBurn);
            unset($summonerSpell->resource);
        }
        $fileHandler->write(json_encode($summonerSpells));
        $fileHandler->close();
    }

    private static function loadSummonerSpells(){
        $summonerSpells = array();
        $fileHandler = new FileHandler(self::SUMMONER_SPELLS_FILE_PATH, 'r');
        $json = json_decode($fileHandler->read());
        $fileHandler->close();
        foreach ($json as $name => $summonerSpell) {
            $image = $summonerSpell->image;
            $sprite = new Sprite($image->sprite, $image->group, $image->x, $image->y, $image->w, $image->h);
            $summonerSpells[] = new SummonerSpell($summonerSpell->key, $summonerSpell->name, $summonerSpell->description,
                $summonerSpell->cooldown, $summonerSpell->summonerLevel, $summonerSpell->range, $summonerSpell->mode,
                $sprite, $image->full);
        }
        SummonerSpells::setSummonerSpells($summonerSpells);
    }

    private static function createChampionsJSON(){
        $json = '[';
        $champions = json_decode(file_get_contents(Constants::DDRAGON_BASE_PATH.'cdn/'.Constants::getDataDragonVersion().'/data/en_US/championFull.json'));
        foreach ($champions->data as $key => $value) {
            $json .= '{"id":"'.$value->key.'",'.
                '"name":"'.$value->name.'",'.
                '"title":"'.$value->title.'",'.
                '"fullImage":"'.$value->image->full.'",'.
                '"sprite":{'.
                '"sprite":"'.$value->image->sprite.'",'.
                '"group":"'.$value->image->group.'",'.
                '"x":"'.$value->image->x.'",'.
                '"y":"'.$value->image->y.'",'.
                '"width":"'.$value->image->w.'",'.
                '"height":"'.$value->image->h.'"'.
                '},'.
                '"skins":[';
            foreach ($value->skins as $skin){
                $json .= '{"id":"'.$skin->num.'",'.
                    '"name":"'.$skin->name.'",'.
                    '"chromas":';
                if($skin->chromas) {
                    $json .= 'true';
                } else {
                    $json .= 'false';
                }
                $json .= '},';
            }
            $json = trim($json, ',');
            $json .= '],'.
                '"lore":"'.$value->lore.'",'.
                '"allyTips":[';
            foreach ($value->allytips as $allyTip){
                $json .= '"'.$allyTip.'",';
            }
            $json = trim($json, ',');
            $json .= '],'.
                '"enemyTips":[';
            foreach ($value->enemytips as $enemyTip){
                $json .= '"'.$enemyTip.'",';
            }
            $json = trim($json, ',');
            $json .= '],'.
                '"tags":[';
            foreach ($value->tags as $tag){
                $json .= '"'.$tag.'",';
            }
            $json = trim($json, ',');
            $json .= '],'.
                '"resourceType":"'.$value->partype.'",'.
                '"stats":{'.
                '"health":'.$value->stats->hp.','.
                '"healthPerLevel":'.$value->stats->hpperlevel.','.
                '"resource":'.$value->stats->mp.','.
                '"resourcePerLevel":'.$value->stats->mpperlevel.','.
                '"movementSpeed":'.$value->stats->movespeed.','.
                '"armor":'.$value->stats->armor.','.
                '"armorPerLevel":'.$value->stats->armorperlevel.','.
                '"magicResist":'.$value->stats->spellblock.','.
                '"magicResistPerLevel":'.$value->stats->spellblockperlevel.','.
                '"attackRange":'.$value->stats->attackrange.','.
                '"healthRegeneration":'.$value->stats->hpregen.','.
                '"healthRegenerationPerLevel":'.$value->stats->hpregenperlevel.','.
                '"resourceRegeneration":'.$value->stats->mpregen.','.
                '"resourceRegenerationPerLevel":'.$value->stats->mpregenperlevel.','.
                '"critChance":'.$value->stats->crit.','.
                '"critChancePerLevel":'.$value->stats->critperlevel.','.
                '"attackDamage":'.$value->stats->attackdamage.','.
                '"attackDamagePerLevel":'.$value->stats->attackdamageperlevel.','.
                '"attackSpeed":'.$value->stats->attackspeed.','.
                '"attackSpeedPerLevel":'.$value->stats->attackspeedperlevel.
                '}},';
        }
        $json = trim($json, ',');
        $json .= ']';
        return $json;
    }

    private static function writeJSONArrayToFile($array, $file){
        $fileHandler = new FileHandler($file, 'w');
        $json = '[';
        for($i = 0; $i < count($array); $i++) {
            if($i < count($array)-1){
                $json .= $array[$i] . ',';
            } else {
                $json .= $array[$i];
            }
        }
        $json .= ']';
        $fileHandler->write($json);
        $fileHandler->close();
    }

    /**
     * @param int $id
     * @return int
     */
    private static function getRuneStyleIDByRuneID($id){
        $fileHandler = new FileHandler(self::RUNES_AND_RUNE_STYLES_FILE_PATH, 'r');
        $json = json_decode($fileHandler->read());
        $fileHandler->close();
        foreach ($json as $runeStyle){
            foreach ($runeStyle->slots as $slot){
                foreach ($slot->runes as $rune) {
                    if ($rune->id === $id) {
                        return $runeStyle->id;
                    }
                }
            }
        }
        throw new RuntimeException('Error when trying to initialize Runes: Could not find RuneStyle for Rune '.$id.'.');
    }
}