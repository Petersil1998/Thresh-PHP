<?php

namespace src\Entities\Runes;

use src\Helper\Utils;
use src\Helper\Constants;

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
     * @param string $key
     * @param string $iconPath
     * @param string $name
     */
    public function __construct(int $id, string $key, string $iconPath, string $name)
    {
        $this->id = $id;
        $this->key = $key;
        $this->iconPath = $iconPath;
        $this->name = $name;
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