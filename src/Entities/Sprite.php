<?php

namespace Thresh\Entities;

/**
 * This class represents a Sprite
 * @package Thresh\Entities
 */
class Sprite
{

    /**
     * @var string
     */
    private $sprite;

    /**
     * @var string
     */
    private $group;

    /**
     * @var int
     */
    private $x;

    /**
     * @var int
     */
    private $y;

    /**
     * @var int
     */
    private $width;

    /**
     * @var int
     */
    private $height;

    /**
     * Sprite constructor.
     * @param string $sprite
     * @param string $group
     * @param int $x
     * @param int $y
     * @param int $width
     * @param int $height
     */
    public function __construct(string $sprite, string $group, int $x, int $y, int $width, int $height)
    {
        $this->sprite = $sprite;
        $this->group = $group;
        $this->x = $x;
        $this->y = $y;
        $this->width = $width;
        $this->height = $height;
    }

    /**
     * @return string
     */
    public function getSprite(): string
    {
        return $this->sprite;
    }

    /**
     * @return string
     */
    public function getGroup(): string
    {
        return $this->group;
    }

    /**
     * @return int
     */
    public function getX(): int
    {
        return $this->x;
    }

    /**
     * @return int
     */
    public function getY(): int
    {
        return $this->y;
    }

    /**
     * @return int
     */
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * @return int
     */
    public function getHeight(): int
    {
        return $this->height;
    }
}