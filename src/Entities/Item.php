<?php

namespace Thresh\Entities;

use Thresh\Entities\Champions\Champion;

/**
 * Class Item represents an ingame Item
 * @package Thresh\Entities
 */
class Item
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
     * @var int
     */
    private $price;

    /**
     * @var int
     */
    private $totalPrice;

    /**
     * @var int
     */
    private $sell;

    /**
     * @var bool
     */
    private $purchasable;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $plaintext;

    /**
     * @var bool
     */
    private $consumed;

    /**
     * @var int
     */
    private $maxStackSize;

    /**
     * @var int
     */
    private $depth;

    /**
     * @var bool
     */
    private $consumeOnFull;

    /**
     * @var Item[]
     */
    private $from;

    /**
     * @var Item[]
     */
    private $into;

    /**
     * @var Item
     */
    private $specialRecipe;

    /**
     * @var bool
     */
    private $inStore;

    /**
     * @var bool
     */
    private $hideFromAll;

    /**
     * @var Champion
     */
    private $requiredChampion;

    /**
     * @var Champion
     */
    private $requiredAlly;

    /**
     * @var array
     */
    private $stats;

    /**
     * @var string[]
     */
    private $tags;

    /**
     * @var Map
     */
    private $maps;

    /**
     * @var Sprite
     */
    private $sprite;

    /**
     * @var array
     */
    private $effect;

    /**
     * Item constructor.
     * @param int $id
     * @param string $name
     * @param int $price
     * @param int $totalPrice
     * @param int $sell
     * @param bool $purchasable
     * @param string $description
     * @param string $plaintext
     * @param bool $consumed
     * @param int $maxStackSize
     * @param int $depth
     * @param bool $consumeOnFull
     * @param Item[] $from
     * @param Item[] $into
     * @param Item $specialRecipe
     * @param bool $inStore
     * @param bool $hideFromAll
     * @param Champion $requiredChampion
     * @param Champion $requiredAlly
     * @param array $stats
     * @param string[] $tags
     * @param Map $maps
     * @param Sprite $sprite
     * @param array $effect
     */
    public function __construct(int $id, string $name, int $price, int $totalPrice, int $sell, bool $purchasable, string $description, string $plaintext, bool $consumed, int $maxStackSize, int $depth, bool $consumeOnFull, array $from, array $into, Item $specialRecipe, bool $inStore, bool $hideFromAll, Champion $requiredChampion, Champion $requiredAlly, array $stats, array $tags, Map $maps, Sprite $sprite, array $effect)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->totalPrice = $totalPrice;
        $this->sell = $sell;
        $this->purchasable = $purchasable;
        $this->description = $description;
        $this->plaintext = $plaintext;
        $this->consumed = $consumed;
        $this->maxStackSize = $maxStackSize;
        $this->depth = $depth;
        $this->consumeOnFull = $consumeOnFull;
        $this->from = $from;
        $this->into = $into;
        $this->specialRecipe = $specialRecipe;
        $this->inStore = $inStore;
        $this->hideFromAll = $hideFromAll;
        $this->requiredChampion = $requiredChampion;
        $this->requiredAlly = $requiredAlly;
        $this->stats = $stats;
        $this->tags = $tags;
        $this->maps = $maps;
        $this->sprite = $sprite;
        $this->effect = $effect;
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
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @return int
     */
    public function getTotalPrice(): int
    {
        return $this->totalPrice;
    }

    /**
     * @return int
     */
    public function getSell(): int
    {
        return $this->sell;
    }

    /**
     * @return bool
     */
    public function isPurchasable(): bool
    {
        return $this->purchasable;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getPlaintext(): string
    {
        return $this->plaintext;
    }

    /**
     * @return bool
     */
    public function isConsumed(): bool
    {
        return $this->consumed;
    }

    /**
     * @return int
     */
    public function getMaxStackSize(): int
    {
        return $this->maxStackSize;
    }

    /**
     * @return int
     */
    public function getDepth(): int
    {
        return $this->depth;
    }

    /**
     * @return bool
     */
    public function isConsumeOnFull(): bool
    {
        return $this->consumeOnFull;
    }

    /**
     * @return Item[]
     */
    public function getFrom(): array
    {
        return $this->from;
    }

    /**
     * @return Item[]
     */
    public function getInto(): array
    {
        return $this->into;
    }

    /**
     * @return Item
     */
    public function getSpecialRecipe(): Item
    {
        return $this->specialRecipe;
    }

    /**
     * @return bool
     */
    public function isInStore(): bool
    {
        return $this->inStore;
    }

    /**
     * @return bool
     */
    public function isHideFromAll(): bool
    {
        return $this->hideFromAll;
    }

    /**
     * @return Champion
     */
    public function getRequiredChampion(): Champion
    {
        return $this->requiredChampion;
    }

    /**
     * @return Champion
     */
    public function getRequiredAlly(): Champion
    {
        return $this->requiredAlly;
    }

    /**
     * @return array
     */
    public function getStats(): array
    {
        return $this->stats;
    }

    /**
     * @return string[]
     */
    public function getTags(): array
    {
        return $this->tags;
    }

    /**
     * @return Map
     */
    public function getMaps(): Map
    {
        return $this->maps;
    }

    /**
     * @return Sprite
     */
    public function getSprite(): Sprite
    {
        return $this->sprite;
    }

    /**
     * @return array
     */
    public function getEffect(): array
    {
        return $this->effect;
    }
}