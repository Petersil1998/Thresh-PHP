<?php

namespace Thresh\Entities;

use stdClass;
use Thresh\Collections\Champions;
use Thresh\Collections\Items;
use Thresh\Collections\Maps;
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
    private $sellPrice;

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
     * @var Item[]|int[]
     */
    private $from;

    /**
     * @var Item[]|int[]
     */
    private $into;

    /**
     * @var Item|int
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
     * @var string
     */
    private $image;

    /**
     * @var array
     */
    private $effect;

    /**
     * Item constructor.
     * @param int $id
     * @param stdClass $data
     */
    public function __construct(int $id, stdClass $data)
    {
        $this->id = $id;
        $this->setProperty($data, 'name');
        if(property_exists($data, 'gold')) {
            $this->setProperty($data->gold, 'base', 'price');
            $this->setProperty($data->gold, 'total', 'totalPrice');
            $this->setProperty($data->gold, 'sell', 'sellPrice');
            $this->setProperty($data->gold, 'purchasable');
        }
        $this->setProperty($data, 'description');
        $this->setProperty($data, 'plaintext');
        $this->setProperty($data, 'consumed');
        $this->setProperty($data, 'stacks', 'maxStackSize');
        $this->setProperty($data, 'depth');
        $this->setProperty($data, 'consumeOnFull');
        $this->setProperty($data, 'from');
        $this->setProperty($data, 'into');
        $this->setProperty($data, 'specialRecipe');
        $this->setProperty($data, 'inStore');
        $this->setProperty($data, 'hideFromAll');
        $this->setProperty($data, 'stats');
        $this->setProperty($data, 'tags');
        $this->setProperty($data, 'effect');


        if(property_exists($data, 'requiredChampion')){
            $this->requiredChampion = Champions::getChampionByName($data->requiredChampion);
        }

        if(property_exists($data, 'requiredAlly')){
            $this->requiredAlly = Champions::getChampionByName($data->requiredAlly);
        }

        if(property_exists($data, 'image')) {
            $this->sprite = new Sprite($data->image->sprite, $data->image->group, $data->image->x, $data->image->y, $data->image->w, $data->image->h);
            $this->image = $data->image->full;
        }

        $maps = array();
        if(property_exists($data, 'maps')) {
            foreach ($data->maps as $mapId => $isAvailable){
                if($isAvailable){
                    $maps[] = Maps::getMap($mapId);
                }
            }
        }
        $this->maps = $maps;
    }

    public function postItemsLoaded(){
        $items = array();
        if(!empty($this->from)){
            foreach ($this->from as $item) {
                $items[] = Items::getItem($item);
            }
        }
        $this->from = $items;

        $items = array();
        if(!empty($this->into)){
            foreach ($this->into as $item) {
                $items[] = Items::getItem($item);
            }
        }
        $this->into = $items;

        if(!empty($this->into)){
            $this->specialRecipe = Items::getItem($this->specialRecipe);
        }
    }

    /**
     * @param $object stdClass The object that holds the property to be set
     * @param $property string The properties name (has to be the same in $this and in the object)
     * @param $alternativeName string The alternative Property name if it differs from the objects property name
     * @param $convertPropertyToArray bool whether or not the property should be converted to an associative array
     * (only works if the property is instance of stdClass)
     */
    private function setProperty($object, $property, $alternativeName = '', $convertPropertyToArray = false){
        $thisFieldName = $property;
        if(!empty($alternativeName)){
            $thisFieldName = $alternativeName;
        }
        if(property_exists($object, $property)){
            if($convertPropertyToArray && $object->$property instanceof stdClass){
                $this->$thisFieldName = json_decode(json_encode($object->$property), true);
            } else {
                $this->$thisFieldName = $object->$property;
            }
        }
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
    public function getSellPrice(): int
    {
        return $this->sellPrice;
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
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @return array
     */
    public function getEffect(): array
    {
        return $this->effect;
    }
}