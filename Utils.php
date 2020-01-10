<?php

    require_once 'Constants.php';

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
                $myfile = fopen("ddragonversion.txt", "r");
                $version = fread($myfile,filesize("ddragonversion.txt"));
                fclose($myfile);
                if(strcmp(self::$ddragonversion,$version) != 0){
                    $fp = fopen('ddragonversion.txt', 'w');
                    fwrite($fp, self::getDDragonVersion());
                    fclose($fp);
                    self::updateRunesFile();
                }
            }
            return self::$ddragonversion;
        }

        public static function loadRunes(){
            if(empty(Constants::$runes)){
                Constants::$runes = json_decode(file_get_contents("runes.json"));
            }
        }

        private static function updateRunesFile(){
            $fp = fopen('runes.json', 'w');
            $runes =  file_get_contents(Constants::DDRAGON_BASEPATH."cdn/".self::getDDragonVersion()."/data/en_US/runesReforged.json");
            fwrite($fp, $runes);
            fclose($fp);
        }

        public static function loadRuneStats(){
            self::updateRunestatsFile();
            if(empty(Constants::$runestats)){
                Constants::$runestats = json_decode(str_replace('\\', "",file_get_contents("runestats.json")));
            }
        }

        private static function updateRunestatsFile(){
            if(empty(Constants::$runestats)){
                if(filesize("runestats.json") <= 2){
                    $runestats = array();
                    $runes = json_decode(file_get_contents("https://raw.communitydragon.org/latest/plugins/rcp-be-lol-game-data/global/default/v1/perks.json"));
                    foreach ($runes as $rune){
                        if(substr($rune->id,0,1) == "5"){
                            array_push($runestats, json_encode($rune));
                        }
                    }
                    self::writeArraytoFile($runestats);
                }
            }
        }

        private static function writeArraytoFile($runestats){
            $fp = fopen('runestats.json', 'w');
            fwrite($fp, "[");
            for($i = 0; $i < count($runestats); $i++) {
                if($i < count($runestats)-1){
                    fwrite($fp, $runestats[$i] . ",");
                }else{
                    fwrite($fp, $runestats[$i]);
                }
            }
            fwrite($fp, "]");
            fclose($fp);
        }
    }