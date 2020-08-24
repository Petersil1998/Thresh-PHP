<?php

namespace Thresh\Entities\Champions;

use Thresh\Entities\Sprite;

class Champion
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
    private $title;

    /**
     * @var string
     */
    private $fullImage;

    /**
     * @var Sprite
     */
    private $sprite;

    /**
     * @var Skin[]
     */
    private $skins;

    /**
     * @var string
     */
    private $lore;

    /**
     * @var string[]
     */
    private $allyTips;

    /**
     * @var string[]
     */
    private $enemyTips;

    /**
     * @var string[]
     */
    private $tags;

    /**
     * @var string
     */
    private $resourceType;

    /**
     * @var Stats
     */
    private $baseStats;

    /**
     * Champion constructor.
     * @param int $id
     * @param string $name
     * @param string $title
     * @param string $fullImage
     * @param Sprite $sprite
     * @param Skin[] $skins
     * @param string $lore
     * @param string[] $allyTips
     * @param string[] $enemyTips
     * @param string[] $tags
     * @param string $resourceType
     * @param Stats $baseStats
     */
    public function __construct(int $id, string $name, string $title, string $fullImage, Sprite $sprite, array $skins, string $lore, array $allyTips, array $enemyTips, array $tags, string $resourceType, Stats $baseStats)
    {
        $this->id = $id;
        $this->name = $name;
        $this->title = $title;
        $this->fullImage = $fullImage;
        $this->sprite = $sprite;
        $this->skins = $skins;
        $this->lore = $lore;
        $this->allyTips = $allyTips;
        $this->enemyTips = $enemyTips;
        $this->tags = $tags;
        $this->resourceType = $resourceType;
        $this->baseStats = $baseStats;
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
    public function getTitle(): string
    {
        return $this->title;
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

    /**
     * @return Skin[]
     */
    public function getSkins(): array
    {
        return $this->skins;
    }

    /**
     * @return string
     */
    public function getLore(): string
    {
        return $this->lore;
    }

    /**
     * @return string[]
     */
    public function getAllyTips(): array
    {
        return $this->allyTips;
    }

    /**
     * @return string[]
     */
    public function getEnemyTips(): array
    {
        return $this->enemyTips;
    }

    /**
     * @return string[]
     */
    public function getTags(): array
    {
        return $this->tags;
    }

    /**
     * @return string
     */
    public function getResourceType(): string
    {
        return $this->resourceType;
    }

    /**
     * @return Stats
     */
    public function getBaseStats(): Stats
    {
        return $this->baseStats;
    }
}