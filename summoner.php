<?php require_once 'Entities/Summoner.php';
      require_once 'Utils.php'?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html lang="en">

    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

        <title></title>

        <link rel="icon" href="images/icon.png">
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">-->
        <link rel="stylesheet" type="text/css" href="bootstrap-4.3.1-dist/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="bootstrap-4.3.1-dist/css/bootstrap-grid.css">
        <link rel="stylesheet" type="text/css" href="bootstrap-4.3.1-dist/css/bootstrap-reboot.css">
        <link rel="stylesheet" type="text/css" href="styles/styles.css">
    </head>
    <body>

        <h1 align="center">League of Legends</h1>
        <?php
            if(empty($_GET["name"])){
                echo "<p>No Summonername spezified</p>";
            }else{
                $summonerName = str_replace(" ", "", $_GET["name"]);
                $summoner = new Summoner($summonerName);
                if(!$summoner->exists()){
                    echo "<p>Summoner not found</p>";
                } else {
                    echo "<div><div><img alt='Profile Icon' src='" . Constants::DDRAGON_BASEPATH . "cdn/" . Utils::getDDragonVersion() . "/img/profileicon/" . $summoner->getProfileIcon() . ".png" . "' style='width: 200px; height: 200px;' class='center'></div>";
                    echo "<div><table style='border: 0; margin-top: 10px'>";
                    echo "<tr><td class='noborder'>Summonername:</td><td class='noborder'>" . $summoner->getSummonername() . "</td></tr>";
                    echo "<tr><td class='noborder'>Level:</td><td class='noborder'>" . $summoner->getSummonerLevel() . "</td></tr>";
                    echo "<tr><td class='noborder'>Masterypoints:</td><td class='noborder'>" . $summoner->getTotalMasteryPoints() . "</td></tr>";
                    echo "<tr><td class='noborder' style='vertical-align: top'>Revision Date:</td><td class='noborder'>" . date("d. F Y G:i:s", $summoner->getRevisionDate()) . "</td></tr>";
                    echo "</table></div></div>";

                    $game = new Game($summonerName);

                    if ($game->exists()) {
                        echo "<a href='game.php?name=" . $summoner->getSummonername() . "'><button>View Live Game</button></a>";
                    }

                    $solo_duo = $summoner->getRankSoloDuo();
                    $flex_5v5 = $summoner->getRankFlex5v5();
                    $flex_3v3 = $summoner->getRankFlex3v3();
                    $tft = $summoner->getRankTft();

                    echo "<p>Ranked Solo/Duo: " . $solo_duo->getTier() . " " . $summoner->getRankSoloDuo()->getRank() . "<img class='rank-icon' alt='".$solo_duo->getTier()."' src='images/Ranks/".strtolower($solo_duo->getTier()).".png'></p>";
                    echo "<p>Ranked Flex 5v5: " . $flex_5v5->getTier() . " " . $summoner->getRankFlex5v5()->getRank() . "<img class='rank-icon' alt='".$flex_5v5->getTier()."' src='images/Ranks/".strtolower($flex_5v5->getTier()).".png'></p>";
                    echo "<p>Ranked Flex 3v3: " . $flex_3v3->getTier() . " " . $summoner->getRankFlex3v3()->getRank() . "<img class='rank-icon' alt='".$flex_3v3->getTier()."' src='images/Ranks/".strtolower($flex_3v3->getTier()).".png'></p>";
                    echo "<p>Ranked TFT: " . $tft->getTier() . " " . $summoner->getRankTft()->getRank() . "<img class='rank-icon' alt='".$tft->getTier()."' src='images/Ranks/".strtolower($tft->getTier()).".png'></p>";

                    echo "<table class='mastery-list'><tr><th>Champion</th><th>Mastery Level</th><th>Points</th><th>Progress to next level</th><th>Tokens for next Level</th><th>Chest Granted</th></tr>";

                    $masteries = json_decode(file_get_contents(Constants::API_BASEPATH . "champion-mastery/v4/champion-masteries/by-summoner/" . $summoner->getId() . "?api_key=" . Constants::$key));

                    foreach ($masteries AS $champion) {
                        echo "<tr><td style='border-color: white;'>";
                        echo "<img class='small-icon' src='" . Constants::DDRAGON_BASEPATH . "cdn/" . Utils::getDDragonVersion() . "/img/champion/" . Utils::getChampWithoutSpecials(Constants::CHAMPIONS[$champion->championId]) . ".png'>";
                        echo Constants::CHAMPIONS[$champion->championId];
                        echo "</td><td style='border-color: white; text-align: center'>" . $champion->championLevel . "</td>";
                        echo "<td style='border-color: white; text-align: center'>" . $champion->championPoints . "</td>";
                        if ($champion->championLevel < 5) {
                            echo "<td style='border-color: white; text-align: center'><progress value=\"" . $champion->championPointsSinceLastLevel . "\" max=\"" . intval($champion->championPointsUntilNextLevel + $champion->championPointsSinceLastLevel) . "\"></progress></td>";
                            echo "<td style='border-color: white; text-align: center'></td>";
                        } else {
                            echo "<td style='border-color: white; text-align: center'></td>";
                            echo "<td style='border-color: white; text-align: center'>" . $champion->tokensEarned . "</td>";
                        }
                        echo "<td style='border-color: white; text-align: center'>";
                        if ($champion->chestGranted == 1) {
                            echo "<img class='small-icon' alt='yes' src=\"images/yes.png\"></td></tr>";
                        } else
                            echo "<img class='small-icon' alt='yes' src=\"images/no.png\"></td></tr>";
                    }
                    echo "</table>";
                }
            }
        ?>

    </body>
    <script type="text/javascript">
        document.getElementsByTagName("title")[0].textContent = "<?php echo $summoner->getSummonername();?> - LoL Test";
    </script>
</html>
