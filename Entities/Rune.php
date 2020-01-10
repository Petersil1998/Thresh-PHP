<?php

require_once 'RuneStyle.php';

class Rune
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
     * @var string
     */
    private $shortDesc;

    /**
     * @var string
     */
    private $longDesc;

    /**
     * @var RuneStyle
     */
    private $runeStyle;

    /**
     * SubRune constructor.
     * @param int $id
     */
    public function __construct($id)
    {
        Utils::loadRunes();
        $this->runeStyle = new RuneStyle($this->getRuneStyleById($id));
        $this->initializeRune($id);
    }

    /**
     * @param int $id
     */
    private function initializeRune($id){
        foreach (Constants::$runes as $perk){
            if($perk->id == $this->runeStyle->getId()){
                foreach ($perk->slots[0]->runes as $rune) {
                    if ($rune->id == $id) {
                        $this->id = $id;
                        $this->iconPath = $rune->icon;
                        $this->key = $rune->key;
                        $this->name = $rune->name;
                        $this->shortDesc = $rune->shortDesc;
                        $this->longDesc = $rune->longDesc;
                    }
                }
            }
        }
    }

    /**
     * @param int $id
     * @return int
     */
    private function getRuneStyleById($id){
        foreach (Constants::$runes as $runeStyle){
            foreach ($runeStyle->slots[0]->runes as $rune){
                if ($rune->id == $id) {
                    return $runeStyle->id;
                }
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
     * @return RuneStyle
     */
    public function getRuneStyle()
    {
        return $this->runeStyle;
    }
}