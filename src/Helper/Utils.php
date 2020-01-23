<?php

namespace src\Helper;

class Utils
{
    private static $ddragonversion;

    public static function getChampWithoutSpecials($champ)
    {
        if ($champ == "Wukong")
            return "MonkeyKing";
        if ($champ == "Cho'Gath")
            return "Chogath";
        if ($champ == "LeBlanc")
            return "Leblanc";
        if ($champ == "Vel'Koz")
            return "Velkoz";
        if ($champ == "Kai'Sa")
            return "Kaisa";
        if ($champ == "Kha'Zix")
            return "Khazix";
        $ret = str_replace("'", "", $champ);
        $ret = str_replace(" ", "", $ret);
        $ret = str_replace(".", "", $ret);
        return $ret;
    }

    public static function getDDragonVersion(){
        if(empty(self::$ddragonversion)) {
            self::$ddragonversion = json_decode(file_get_contents(Constants::DDRAGON_BASEPATH . "api/versions.json"))[0];
            $fileHandler = new FileHandler(__DIR__.'/../ddragonversion.txt', 'r');
            $version = $fileHandler->read();
            $fileHandler->close();
            if(strcmp(self::$ddragonversion, $version) != 0){
                $fileHandler = new FileHandler(__DIR__.'/../ddragonversion.txt', 'w');
                $fileHandler->write(self::getDDragonVersion());
                $fileHandler->close();
                self::updateRunesFile();
            }
        }
        return self::$ddragonversion;
    }

    public static function loadRunes(){
        if(empty(Constants::$runes)){
            $fileHandler = new FileHandler(__DIR__.'/../runes.json', 'r');
            Constants::$runes = json_decode($fileHandler->read());
            $fileHandler->close();
        }
    }

    private static function updateRunesFile(){
        $fileHandler = new FileHandler(__DIR__.'/../runes.json', 'w');
        $runes =  file_get_contents(Constants::DDRAGON_BASEPATH."cdn/".self::getDDragonVersion()."/data/en_US/runesReforged.json");
        $fileHandler->write($runes);
        $fileHandler->close();
    }

    public static function loadRuneStats(){
        self::updateRunestatsFile();
        if(empty(Constants::$runestats)){
            $fileHandler = new FileHandler(__DIR__.'/../runestats.json', 'r');
            Constants::$runestats = json_decode(str_replace('\\', "", $fileHandler->read()));
            $fileHandler->close();
        }
    }

    private static function updateRunestatsFile(){
        if(empty(Constants::$runestats)){
            $fileHandler = new FileHandler(__DIR__.'/../runestats.json', '');
            if($fileHandler->getFileSize() <= 2){
                $runestats = array();
                $runes = json_decode(file_get_contents("https://raw.communitydragon.org/latest/plugins/rcp-be-lol-game-data/global/default/v1/perks.json"));
                foreach ($runes as $rune){
                    if(substr($rune->id,0,1) == "5"){
                        array_push($runestats, json_encode($rune));
                    }
                }
                self::writeArrayToFile($runestats);
            }
            $fileHandler->close();
        }
    }

    private static function writeArrayToFile($runestats){
        $fileHandler = new FileHandler(__DIR__.'/../runestats.json', 'w');
        $fileHandler->write("[");
        for($i = 0; $i < count($runestats); $i++) {
            if($i < count($runestats)-1){
                $fileHandler->write($runestats[$i] . ",");
            }else{
                $fileHandler->write($runestats[$i]);
            }
        }
        $fileHandler->write("]");
        $fileHandler->close();
    }
}