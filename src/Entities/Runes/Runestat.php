<?php

namespace src\Entities\Runes;

use src\Helper\Utils;
use src\Helper\Constants;

class Runestat
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $shortDesc;

    /**
     * @var string
     */
    private $longDesc;

    /**
     * @var string
     */
    private $iconPath;

    public function __construct($id)
    {
        Utils::loadRuneStats();
        $this->initializeRunestats($id);
    }

    private function initializeRunestats($id){
        foreach (Constants::$runestats as $runestat){
            if($runestat->id == $id){
                $this->id = $id;
                $this->name = $runestat->name;
                $this->iconPath = $runestat->iconPath;
                $this->shortDesc = $runestat->shortDesc;
                $this->longDesc = $runestat->longDesc;
            }
        }
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getShortDesc()
    {
        return $this->shortDesc;
    }

    /**
     * @return string
     */
    public function getLongDesc()
    {
        return $this->longDesc;
    }

    /**
     * @return string
     */
    public function getIconPath()
    {
        return $this->iconPath;
    }
}