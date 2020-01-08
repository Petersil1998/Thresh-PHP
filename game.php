<?php require_once 'Utils.php';
      require_once 'Entities/Summoner.php';
      require_once 'Entities/Game.php';
      require_once 'Entities/Rune.php';
      require_once 'Entities/Runestat.php'?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title></title>
        <link rel="icon" href="images/icon.png">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="styles/styles.css">
    </head>
    <body><h1 align="center">League of Legends</h1>
        <?php
        if(isset($_GET["name"])) {
            $summonername = str_replace(" ", "", $_GET["name"]);
            $i = 0;
            $game = new Game($summonername);
            if ($game->exists()) {
                echo "<div id='gameid' hidden>" . $game->getGameId() . "</div>";
                echo "<p class='game-player-row' style='color: white;'>Map: " . Constants::$maps[$game->getMapId()];
                echo "<br>Game Mode: " . $game->getGameMode();
                echo "<br>Queue: " . Constants::$queues[$game->getGameQueueConfigId()] . "</p></div>";
                $participants = $game->getParticipants();
                foreach ($participants AS $player) {
                    $keyRune = new Rune($player->getPerks()[0]);
                    $runestat = new Runestat($player->getPerks()[8]);
                    if ($i == 0) {
                        echo "<div><table class='background-blue-team'>";
                    }
                    if ($i == $game->getTeamsize()) {
                        echo "</table><p class='game-player-row' style='text-align: center; font-size: 30px; font-weight: bold; color: white; margin-top: 0; margin-bottom: 0;'>VS</p><table class='background-red-team'>";
                    }
                    if (strcasecmp(str_replace(" ", "", $player->getSummonername()), str_replace(" ", "", $summonername)) == 0) {
                        $realName = $player->getSummonername();
                        if ($i < $game->getTeamsize()) {
                            echo "<tr class='game-player-row background-blue-team-player'>";
                        } else {
                            echo "<tr class='game-player-row background-red-team-player'>";
                        }
                    } else {
                        echo "<tr class='game-player-row'>";
                    }
                    echo "<td style='width=\"250px\"'><a href='summoner.php?name=" . $player->getSummonername() . "'>" . $player->getSummonername() . "</a></td>";
                    echo "<td><img alt='".Constants::$champs[$player->getChampionId()]."' class='small-icon' src='" . Constants::$ddragon_basePath . "cdn/" . Utils::getDDragonVersion() . "/img/champion/" . Utils::getChampWithoutSpecials(Constants::$champs[$player->getChampionId()]) . ".png'> " . Constants::$champs[$player->getChampionId()] . "</td>";
                    echo "<td><img alt='".$keyRune->getName()."' class='small-icon' src='" . Constants::$ddragon_basePath . "cdn/img/" . $keyRune->getIconPath()."'>" . $keyRune->getName()."</td>";
                    echo "</tr>";
                    $i++;
                }
                echo "</table><button onclick='location.href=\"summoner.php?name=".$_GET["name"]."\";'>Zurück</button>";
            } else {
                echo "<p>No active Game found for this Summoner!</p>";
            }
        }else{
            echo "<p>No Summonername specified!</p>";
        }?>
        <script type="text/javascript">
            document.getElementsByTagName("title")[0].textContent = "<?=$realName?> - LoL Test";
        </script>
    </body>
</html>