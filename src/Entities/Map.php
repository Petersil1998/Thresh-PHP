<?php

namespace Thresh\Entities;

/**
 * This Class represents a Map
 * @package Thresh\Entities
 */
class Map
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $fullImage;

    /**
     * @var Sprite
     */
    private $sprite;

    /**
     * Map constructor.
     * @param string $name
     * @param int $id
     * @param string $fullImage
     * @param Sprite $sprite
     */
    public function __construct(string $name, int $id, string $fullImage, Sprite $sprite)
    {
        $this->name = $name;
        $this->id = $id;
        $this->fullImage = $fullImage;
        $this->sprite = $sprite;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getFullImage(): string
    {
        return $this->fullImage;
    }

    /**
     * @return Sprite
     */
    public function getSprite(): Sprite
    {
        return $this->sprite;
    }
}