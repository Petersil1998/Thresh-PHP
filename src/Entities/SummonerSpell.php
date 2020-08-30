<?php

namespace Thresh\Entities;

class SummonerSpell
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
    private $description;

    /**
     * @var int
     */
    private $cooldown;

    /**
     * @var int
     */
    private $summonerLevel;

    /**
     * @var int
     */
    private $range;

    /**
     * @var string[]
     */
    private $modes;

    /**
     * @var Sprite
     */
    private $sprite;

    /**
     * @var string
     */
    private $image;

    /**
     * SummonerSpell constructor.
     * @param int $id
     * @param string $name
     * @param string $description
     * @param int $cooldown
     * @param int $summonerLevel
     * @param int $range
     * @param string[] $modes
     * @param Sprite $sprite
     * @param string $image
     */
    public function __construct(int $id, string $name, string $description, int $cooldown, int $summonerLevel, int $range, array $modes, Sprite $sprite, string $image)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->cooldown = $cooldown;
        $this->summonerLevel = $summonerLevel;
        $this->range = $range;
        $this->modes = $modes;
        $this->sprite = $sprite;
        $this->image = $image;
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
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return int
     */
    public function getCooldown(): int
    {
        return $this->cooldown;
    }

    /**
     * @return int
     */
    public function getSummonerLevel(): int
    {
        return $this->summonerLevel;
    }

    /**
     * @return int
     */
    public function getRange(): int
    {
        return $this->range;
    }

    /**
     * @return string[]
     */
    public function getModes(): array
    {
        return $this->modes;
    }

    /**
     * @return Sprite
     */
    public function getSprite(): Sprite
    {
        return $this->sprite;
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }
}