<?php
    require_once '../vendor/autoload.php';

    define('BASE_PATH', dirname(dirname(__FILE__)));

    use src\Collections\Maps;
    use src\Collections\Runes;
    use src\Collections\RuneStats;
    use src\Entities\Match\ActiveGame;
    use src\Entities\Match\Match;
    use src\Entities\Match\MatchDetails;
    use src\Entities\Runes\Rune;
    use src\Entities\Runes\RuneStat;
    use src\Entities\Summoner\Summoner;
    use src\Helper\Constants;
    use src\Helper\Loader;
    use src\Helper\Utils;
    use Twig\Loader\FilesystemLoader;
    use Twig\Environment;
    use Twig\TwigFunction;

    Loader::init();

    $loader = new FilesystemLoader('templates');
    $twig = new Environment($loader);
    $function = new TwigFunction('getMap', function ($mapId) {
        return Maps::getMap($mapId);
    });
    $twig->addFunction($function);
    $function = new TwigFunction('getChampionIconPath', function ($championId) {
        return Utils::getChampionIconURL($championId);
    });
    $twig->addFunction($function);
    $function = new TwigFunction('getProfileIconURL', function ($summoner) {
        return Utils::getProfileIconURL($summoner);
    });
    $twig->addFunction($function);
    $function = new TwigFunction('getRuneIconURL', function ($rune) {
        return Utils::getRuneIconURL($rune);
    });
    $twig->addFunction($function);

    if(!isset($_GET['id'])){
        echo $twig->render('index.twig');
    } else {
        $id = $_GET['id'];
        switch ($id){
            case 0:
            {
                if(empty($_GET['name'])){
                    echo $twig->render('error.twig', array(
                        'errorMessage' => 'Summonername not specified',
                    ));
                }else{
                    $summonerName = str_replace(" ", "", $_GET["name"]);
                    $summoner = new Summoner($summonerName);
                    if(!$summoner->exists()){
                        echo $twig->render('error.twig', array(
                            'errorMessage' => 'Summoner doesn\'t exist',
                        ));
                    } else {
                        $game = new ActiveGame($summonerName);
                        echo $twig->render('summoner.twig', array(
                            'summoner'          => $summoner,
                            'game'              => $game,
                            'champions'         => Constants::CHAMPIONS,
                        ));
                    }
                }
                break;
            }
            case 1:
            {
                if (empty($_GET['name'])) {
                    echo $twig->render('error.twig', array(
                        'errorMessage' => 'Summonername not specified',
                    ));
                } else {
                    $summonerName = str_replace(" ", "", $_GET["name"]);
                    $game = new ActiveGame($summonerName);
                    if (!$game->exists()) {
                        echo $twig->render('error.twig', array(
                            'errorMessage' => 'Player isn\'t currently in a game',
                        ));
                    } else {
                        echo $twig->render('game.twig', array(
                            'summonerName'      => $summonerName,
                            'game'              => $game,
                            'queues'            => Constants::QUEUES_TYPES,
                            'champions'         => Constants::CHAMPIONS,
                        ));
                    }
                }
                break;
            }
            default: {
                echo "ID: ".$id;
            }
        }
    }
