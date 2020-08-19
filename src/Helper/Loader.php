<?php


namespace src\Helper;


use RuntimeException;
use src\Collections\Maps;
use src\Collections\Runes;
use src\Collections\RuneStats;
use src\Collections\RuneStyles;
use src\Entities\Map;
use src\Entities\Runes\Rune;
use src\Entities\Runes\RuneStat;
use src\Entities\Runes\RuneStyle;
use src\Entities\Sprite;

class Loader
{

    private const RUNE_STATS_FILE_PATH = BASE_PATH.'/src/runeStats.json';
    private const RUNES_AND_RUNE_STYLES_FILE_PATH = BASE_PATH.'/src/runes.json';
    private const DDRAGON_VERSION_FILE_PATH = BASE_PATH.'/src/ddragonVersion.txt';
    private const MAPS_FILE_PATH = BASE_PATH.'/src/maps.json';

    public static function init(){
        if(self::initAndUpdateDDragonVersion()) {
            self::updateRunesAndRuneStylesFile();
            self::updateRuneStatsFile();
            self::updateMapsFile();
        }
        self::loadRuneStyles();
        self::loadRunes();
        self::loadRuneStats();
        self::loadMaps();
    }

    private static function initAndUpdateDDragonVersion(){
        $newVersion = json_decode(file_get_contents(Constants::DDRAGON_BASEPATH . "api/versions.json"))[0];
        Constants::setDDragonVersion($newVersion);
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
        $runes = file_get_contents(Constants::DDRAGON_BASEPATH."cdn/".Constants::getDDragonVersion()."/data/en_US/runesReforged.json");
        $fileHandler->write($runes);
        $fileHandler->close();
    }

    private static function loadRunes(){
        $runes = array();
        $fileHandler = new FileHandler(self::RUNES_AND_RUNE_STYLES_FILE_PATH, 'r');
        $json = json_decode($fileHandler->read());
        $fileHandler->close();
        foreach ($json as $runeStyleJson) {
            foreach ($runeStyleJson->slots as $slot){
                foreach ($slot->runes as $runeJson){
                    $runeStyle = RuneStyles::getRuneStyle(self::getRuneStyleIDByRuneID($runeJson->id));
                    $rune = new Rune($runeJson->id, $runeJson->key, $runeJson->icon, $runeJson->name, $runeJson->shortDesc, $runeJson->longDesc, $runeStyle);
                    $runes[] = $rune;
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
        foreach ($json as $runeStyleJson) {
            $runeStyle = new RuneStyle($runeStyleJson->id, $runeStyleJson->key, $runeStyleJson->icon, $runeStyleJson->name);
            $runeStyles[] = $runeStyle;
        }
        RuneStyles::setRuneStyles($runeStyles);
    }

    private static function updateRuneStatsFile(){
        $fileHandler = new FileHandler(self::RUNE_STATS_FILE_PATH, 'r');
        $fileSize = $fileHandler->getFileSize();
        $fileHandler->close();
        if($fileSize <= 2){
            $runeStats = array();
            $runes = json_decode(file_get_contents("https://raw.communitydragon.org/latest/plugins/rcp-be-lol-game-data/global/default/v1/perks.json"));
            foreach ($runes as $rune){
                if(substr($rune->id,0,1) == "5"){
                    array_push($runeStats, json_encode($rune));
                }
            }
            self::writeJSONArrayToFile($runeStats, self::RUNE_STATS_FILE_PATH);
        }
    }

    private static function loadRuneStats(){
        $runeStats = array();
        $fileHandler = new FileHandler(self::RUNE_STATS_FILE_PATH, 'r');
        $json = json_decode(str_replace('\\', "", $fileHandler->read()));
        $fileHandler->close();
        foreach ($json as $runeStatJson) {
            $runeStat = new RuneStat($runeStatJson->id, $runeStatJson->name, $runeStatJson->shortDesc,
                $runeStatJson->longDesc, $runeStatJson->iconPath);
            $runeStats[] = $runeStat;
        }
        RuneStats::setRuneStats($runeStats);
    }

    private static function updateMapsFile(){
        $fileHandler = new FileHandler(self::MAPS_FILE_PATH, 'w');
        $maps = json_encode(json_decode(file_get_contents(Constants::DDRAGON_BASEPATH."cdn/".Constants::getDDragonVersion()."/data/en_US/map.json"))->data);
        $fileHandler->write($maps);
        $fileHandler->close();
    }

    private static function loadMaps(){
        $maps = array();
        $fileHandler = new FileHandler(self::MAPS_FILE_PATH, 'r');
        $json = json_decode($fileHandler->read());
        $fileHandler->close();
        foreach ($json as $key => $value) {
            $image = $value->image;
            $sprite = new Sprite($image->sprite, $image->group, $image->x, $image->y, $image->w, $image->h);
            $map = new Map($value->MapName, $value->MapId, $image->full, $sprite);
            $maps[] = $map;
        }
        Maps::setMaps($maps);
    }

    private static function writeJSONArrayToFile($array, $file){
        $fileHandler = new FileHandler($file, 'w');
        $fileHandler->write("[");
        for($i = 0; $i < count($array); $i++) {
            if($i < count($array)-1){
                $fileHandler->write($array[$i] . ",");
            }else{
                $fileHandler->write($array[$i]);
            }
        }
        $fileHandler->write("]");
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