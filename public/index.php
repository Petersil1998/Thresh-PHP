<?php
    require_once '../vendor/autoload.php';

    use src\Entities\Match\ActiveGame;
    use src\Entities\Match\Match;
    use src\Entities\Match\MatchDetails;
    use src\Entities\Match\Timeline\Timeline;
    use src\Entities\Runes\Rune;
    use src\Entities\Runes\Runestat;
    use src\Entities\Summoner\Summoner;
    use src\Helper\Constants;
    use src\Helper\Utils;
    use Twig\Loader\FilesystemLoader;
    use Twig\Environment;
    use Twig\TwigFunction;

    $loader = new FilesystemLoader('templates');
    $twig = new Environment($loader);
    $function = new TwigFunction('createRune', function ($runeId) {
        return new Rune($runeId);
    });
    $twig->addFunction($function);
    $function = new TwigFunction('createRuneStat', function ($runestatId) {
        return new Runestat($runestatId);
    });
    $twig->addFunction($function);
    $function = new TwigFunction('getChampionIconPath', function ($championId) {
        return Constants::DDRAGON_BASEPATH . "cdn/" . Utils::getDDragonVersion() . "/img/champion/" . Utils::getChampWithoutSpecials(Constants::CHAMPIONS[$championId]) . ".png";
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
                    $match = new MatchDetails(Match::getMatchListFromAccount($summoner->getAccountId())[0]->getGameId(), true);
                    var_dump($match->getTimelines());
                    if(!$summoner->exists()){
                        echo $twig->render('error.twig', array(
                            'errorMessage' => 'Summoner doesn\'t exist',
                        ));
                    } else {
                        $game = new ActiveGame($summonerName);
                        echo $twig->render('summoner.twig', array(
                            'summoner'          => $summoner,
                            'ddragon_basepath'  => Constants::DDRAGON_BASEPATH,
                            'ddragon_version'   => Utils::getDDragonVersion(),
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
                            'errorMessage' => 'Player isn\'n currently in a game',
                        ));
                    } else {
                        echo $twig->render('game.twig', array(
                            'summonerName'      => $summonerName,
                            'game'              => $game,
                            'maps'              => Constants::MAPS,
                            'queues'            => Constants::QUEUES_TYPES,
                            'champions'         => Constants::CHAMPIONS,
                            'ddragon_basepath'  => Constants::DDRAGON_BASEPATH,
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
