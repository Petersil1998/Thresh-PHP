<?php

namespace Thresh\Entities\Runes;

/**
 * This class represents a Rune
 * @package Thresh\Entities\Runes
 */
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
     * Rune constructor.
     * @param int $id
     * @param string $key
     * @param string $iconPath
     * @param string $name
     * @param string $shortDesc
     * @param string $longDesc
     * @param RuneStyle $runeStyle
     */
    public function __construct(int $id, string $key, string $iconPath, string $name, string $shortDesc, string $longDesc, RuneStyle $runeStyle)
    {
        $this->id = $id;
        $this->key = $key;
        $this->iconPath = $iconPath;
        $this->name = $name;
        $this->shortDesc = $shortDesc;
        $this->longDesc = $longDesc;
        $this->runeStyle = $runeStyle;
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