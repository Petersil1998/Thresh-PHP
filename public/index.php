<?php
    require_once '../vendor/autoload.php';

    define('BASE_PATH', dirname(dirname(__FILE__)));

    use src\Collections\Champions;
    use src\Collections\Maps;
    use src\Collections\QueueTypes;
    use src\Entities\Match\ActiveGame;
    use src\Entities\Summoner\Summoner;
    use src\Helper\Loader;
    use src\Helper\Utils;
    use Twig\Loader\FilesystemLoader;
    use Twig\Environment;
    use Twig\TwigFunction;
    $encrypted_api_key = \src\Helper\EncryptionUtils::encrypt('RGAPI-19162ee5-df3c-4a6e-8b94-28d667501426');
    Loader::init($encrypted_api_key);

    $loader = new FilesystemLoader('templates');
    $twig = new Environment($loader);
    $function = new TwigFunction('getMap', function ($mapId) {
        return Maps::getMap($mapId);
    });
    $twig->addFunction($function);
    $function = new TwigFunction('getChampion', function ($championId) {
        return Champions::getChampion($championId);
    });
    $twig->addFunction($function);
    $function = new TwigFunction('getQueueType', function ($queueTypeId) {
        return QueueTypes::getQueueType($queueTypeId);
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
                        var_dump($game->getGameQueueConfigId());
                        echo $twig->render('game.twig', array(
                            'summonerName'      => $summonerName,
                            'game'              => $game,
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
