<?php

namespace Thresh\Helper;

use Thresh\Entities\ActiveGame\ActiveGame;
use Thresh_Core\Constants\Constants;

class SpectatorUtils
{
    /**
     * This function returns the command, which can be run in terminal in order to spectate a current game.
     * @param $pathToRiotFolder string The Path to the "Riot Games" Folder (e.g. C:\);
     * @param $game ActiveGame The current game
     * @return string
     */
    public static function getSpectatorCommandWindows(string $pathToRiotFolder, ActiveGame $game): string
    {
        $url = preg_replace('~{platform}~',Config::getPlatform(),Constants::SPECTATOR_URL);
        return 'cd /d "'.$pathToRiotFolder.'Riot Games\\League of Legends\\Game" && "League of Legends.exe" "spectator '
            .$url.' '.$game->getSpectatorKey().' '.$game->getGameId().' '.$game->getPlatformId().'" "-UseRads"';
    }
}