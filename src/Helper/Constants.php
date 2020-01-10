<?php

namespace src\Helper;

class Constants
{

    const API_BASEPATH = "https://euw1.api.riotgames.com/lol/";

    const DDRAGON_BASEPATH = "https://ddragon.leagueoflegends.com/";

    const CHAMPIONS = array("266" => "Aatrox", "103" => "Ahri", "84" => "Akali", "12" => "Alistar", "32" => "Amumu", "34" => "Anivia", "1" => "Annie", "22" => "Ashe", "136" => "Aurelion Sol", "268" => "Azir", "432" => "Bard", "53" => "Blitzcrank", "63" => "Brand",

    "201" => "Braum", "51" => "Caitlyn", "164" => "Camille", "69" => "Cassiopeia", "31" => "Cho'Gath", "42" => "Corki", "122" => "Darius", "131" => "Diana", "36" => "Dr. Mundo", "119" => "Draven", "245" => "Ekko", "60" => "Elise", "28" => "Evelynn", "81" => "Ezreal",

    "9" => "Fiddlesticks", "114" => "Fiora", "105" => "Fizz", "3" => "Galio", "41" => "Gangplank", "86" => "Garen", "150" => "Gnar", "79" => "Gragas", "104" => "Graves", "120" => "Hecarim", "74" => "Heimerdinger", "420" => "Illaoi", "39" => "Irelia", "427" => "Ivern",

    "40" => "Janna", "59" => "Jarvan IV", "24" => "Jax", "126" => "Jayce", "202" => "Jhin", "222" => "Jinx", "145" => "Kai'Sa", "429" => "Kalista", "43" => "Karma", "30" => "Karthus", "38" => "Kassadin", "55" => "Katarina", "10" => "Kayle", "141" => "Kayn", "85" => "Kennen",

    "121" => "Kha'Zix", "203" => "Kindred", "240" => "Kled", "96" => "Kog'Maw", "7" => "LeBlanc", "64" => "Lee Sin", "89" => "Leona", "127" => "Lissandra", "236" => "Lucian", "117" => "Lulu", "99" => "Lux", "54" => "Malphite", "90" => "Malzahar", "57" => "Maokai",

    "11" => "Master Yi", "21" => "Miss Fortune", "82" => "Mordekaiser", "25" => "Morgana", "267" => "Nami", "75" => "Nasus", "111" => "Nautilus", "518" => "Neeko", "76" => "Nidalee", "56" => "Nocturne", "20" => "Nunu", "2" => "Olaf", "61" => "Orianna", "516" => "Ornn", "80" => "Pantheon",

    "78" => "Poppy", "555" => "Pyke", "246" => "Qiyana", "133" => "Quinn", "497" => "Rakan", "33" => "Rammus", "421" => "Rek'Sai", "58" => "Renekton", "107" => "Rengar", "92" => "Riven", "68" => "Rumble", "13" => "Ryze", "113" => "Sejuani", "235" => "Senna", "35" => "Shaco", "98" => "Shen", "102" => "Shyvana", "27" => "Singed", "14" => "Sion",

    "15" => "Sivir", "72" => "Skarner", "37" => "Sona", "16" => "Soraka", "50" => "Swain", "517" => "Sylas", "134" => "Syndra", "223" => "Tahm Kench", "163" => "Taliyah", "91" => "Talon", "44" => "Taric", "17" => "Teemo", "412" => "Thresh", "18" => "Tristana", "48" => "Trundle", "23" => "Tryndamere",

    "4" => "Twisted Fate", "29" => "Twitch", "77" => "Udyr", "6" => "Urgot", "110" => "Varus", "67" => "Vayne", "45" => "Veigar", "161" => "Vel'Koz", "254" => "Vi", "112" => "Viktor", "8" => "Vladimir", "106" => "Volibear", "19" => "Warwick", "62" => "Wukong", "498" => "Xayah",

    "101" => "Xerath", "5" => "Xin Zhao", "157" => "Yasuo", "83" => "Yorick", "350" => "Yuumi", "154" => "Zac", "238" => "Zed", "115" => "Ziggs", "26" => "Zilean", "142" => "Zoe", "143" => "Zyra");

    const MAPS = array("10" => "The Twisted Treeline", "11" => "Summoner's Rift", "12" => "Howling Abyss", "13" => "Butcher's Bridge", "16" => "Cosmic Ruins", "18" => "Valoran City Park",

    "19" => "Substructure 43", "20" => "Crash Site", "21" => "Nexus Blitz");

    const QUEUES = array("0" => "Custom Game", "72" => "1v1 Snowdown Showdown", "73" => "2v2 Snowdown Showdown", "75" => "6v6 Hexakill",

    "76" => "Ultra Rapid Fire", "78" => "One For All: Mirror Mode", "83" => "Co-op vs AI Ultra Rapid Fire", "98" => "6v6 Hexakill",

    "100" => "5v5 ARAM", "310" => "Nemesis", "313" => "Black Market Brawlers", "317" => "Definitely Not Dominion",

    "325" => "All Random", "400" => "5v5 Draft Pick", "420" => "5v5 Ranked Solo", "430" => "5v5 Blind Pick",

    "440" => "5v5 Ranked Flex", "450" => "5v5 ARAM", "460" => "3v3 Blind Pick", "470" => "3v3 Ranked Flex",

    "600" => "Blood Hunt Assassin", "610" => "Dark Star: Singularity", "700" => "Clash", "800" => "Co-op vs. AI Intermediate Bot",

    "810" => "Co-op vs. AI Intro Bot", "820" => "Co-op vs. AI Beginner Bot", "830" => "Co-op vs. AI Intro Bot",

    "840" => "Co-op vs. AI Beginner Bot", "850" => "Co-op vs. AI Intermediate Bot", "900" => "ARURF", "910" => "Ascension",

    "920" => "Legend of the Poro King", "940" => "Nexus Siege", "950" => "Doom Bots Voting", "960" => "Doom Bots Standard",

    "980" => "Star Guardian Invasion: Normal", "990" => "Star Guardian Invasion: Onslaught", "1000" => "PROJECT: Hunters",

    "1010" => "Snow ARURF", "1020" => "One for All", "1030" => "Odyssey Extraction: Intro", "1040" => "Odyssey Extraction: Cadet", "1050" => "Odyssey Extraction: Crewmember", "1060" => "Odyssey Extraction: Captain",

    "1070" => "Odyssey Extraction: Onslaught","1090" => "Teamfight Tactics games", "1100" => "Ranked Teamfight Tactics games");

    public static $runes = array();

    public static $runestats = array();
}
