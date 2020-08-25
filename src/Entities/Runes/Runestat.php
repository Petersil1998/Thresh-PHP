<?php

namespace Thresh\Entities\Runes;

/**
 * This Class represents a RuneStat (eg. Adaptive Force, Armor, Attack Speed, ...)
 * @package Thresh\Entities\Runes
 */
class RuneStat
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

    /**
     * RuneStat constructor.
     * @param int $id
     * @param string $name
     * @param string $shortDesc
     * @param string $longDesc
     * @param string $iconPath
     */
    public function __construct(int $id, string $name, string $shortDesc, string $longDesc, string $iconPath)
    {
        $this->id = $id;
        $this->name = $name;
        $this->shortDesc = $shortDesc;
        $this->longDesc = $longDesc;
        $this->iconPath = $iconPath;
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