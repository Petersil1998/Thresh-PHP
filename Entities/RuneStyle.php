<?php

require_once 'Utils.php';
require_once 'Constants.php';

class RuneStyle
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $key;

    /**
     * @var string
     */
    private $iconPath;

    /**
     * @var string
     */
    private $name;

    /**
     * RuneStyle constructor.
     * @param int $id
     */
    public function __construct($id)
    {
        Utils::loadRunes();
        $this->initializeRune($id);
    }

    /**
     * @param int $id
     */
    private function initializeRune($id){
        foreach (Constants::$runes as $perk){
            if($perk->id == $id){
                $this->id = $id;
                $this->iconPath = $perk->icon;
                $this->key = $perk->key;
                $this->name = $perk->name;
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
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @return string
     */
    public function getIconPath()
    {
        return $this->iconPath;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}