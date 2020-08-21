<?php


namespace src\Entities\Champions;


class Stats
{
    /**
     * @var float
     */
    private $health;

    /**
     * @var float
     */
    private $healthPerLevel;

    /**
     * @var float
     */
    private $resource;

    /**
     * @var float
     */
    private $resourcePerLevel;

    /**
     * @var int
     */
    private $movementSpeed;

    /**
     * @var float
     */
    private $armor;

    /**
     * @var float
     */
    private $armorPerLevel;

    /**
     * @var float
     */
    private $magicResist;

    /**
     * @var float
     */
    private $magicResistPerLevel;

    /**
     * @var int
     */
    private $attackRange;

    /**
     * @var float
     */
    private $healthRegeneration;

    /**
     * @var float
     */
    private $healthRegenerationPerLevel;

    /**
     * @var float
     */
    private $resourceRegeneration;

    /**
     * @var float
     */
    private $resourceRegenerationPerLevel;

    /**
     * @var float
     */
    private $critChance;

    /**
     * @var float
     */
    private $critChancePerLevel;

    /**
     * @var float
     */
    private $attackDamage;

    /**
     * @var float
     */
    private $attackDamagePerLevel;

    /**
     * @var float
     */
    private $attackSpeed;

    /**
     * @var float
     */
    private $attackSpeedPerLevel;

    /**
     * Stats constructor.
     * @param float $health
     * @param float $healthPerLevel
     * @param float $resource
     * @param float $resourcePerLevel
     * @param int $movementSpeed
     * @param float $armor
     * @param float $armorPerLevel
     * @param float $magicResist
     * @param float $magicResistPerLevel
     * @param int $attackRange
     * @param float $healthRegeneration
     * @param float $healthRegenerationPerLevel
     * @param float $resourceRegeneration
     * @param float $resourceRegenerationPerLevel
     * @param float $critChance
     * @param float $critChancePerLevel
     * @param float $attackDamage
     * @param float $attackDamagePerLevel
     * @param float $attackSpeed
     * @param float $attackSpeedPerLevel
     */
    public function __construct(float $health, float $healthPerLevel, float $resource, float $resourcePerLevel,
                                int $movementSpeed, float $armor, float $armorPerLevel, float $magicResist,
                                float $magicResistPerLevel, int $attackRange, float $healthRegeneration,
                                float $healthRegenerationPerLevel, float $resourceRegeneration,
                                float $resourceRegenerationPerLevel, float $critChance, float $critChancePerLevel,
                                float $attackDamage, float $attackDamagePerLevel, float $attackSpeed, float $attackSpeedPerLevel)
    {
        $this->health = $health;
        $this->healthPerLevel = $healthPerLevel;
        $this->resource = $resource;
        $this->resourcePerLevel = $resourcePerLevel;
        $this->movementSpeed = $movementSpeed;
        $this->armor = $armor;
        $this->armorPerLevel = $armorPerLevel;
        $this->magicResist = $magicResist;
        $this->magicResistPerLevel = $magicResistPerLevel;
        $this->attackRange = $attackRange;
        $this->healthRegeneration = $healthRegeneration;
        $this->healthRegenerationPerLevel = $healthRegenerationPerLevel;
        $this->resourceRegeneration = $resourceRegeneration;
        $this->resourceRegenerationPerLevel = $resourceRegenerationPerLevel;
        $this->critChance = $critChance;
        $this->critChancePerLevel = $critChancePerLevel;
        $this->attackDamage = $attackDamage;
        $this->attackDamagePerLevel = $attackDamagePerLevel;
        $this->attackSpeed = $attackSpeed;
        $this->attackSpeedPerLevel = $attackSpeedPerLevel;
    }

    /**
     * @return float
     */
    public function getHealth(): float
    {
        return $this->health;
    }

    /**
     * @return float
     */
    public function getHealthPerLevel(): float
    {
        return $this->healthPerLevel;
    }

    /**
     * @return float
     */
    public function getResource(): float
    {
        return $this->resource;
    }

    /**
     * @return float
     */
    public function getResourcePerLevel(): float
    {
        return $this->resourcePerLevel;
    }

    /**
     * @return int
     */
    public function getMovementSpeed(): int
    {
        return $this->movementSpeed;
    }

    /**
     * @return float
     */
    public function getArmor(): float
    {
        return $this->armor;
    }

    /**
     * @return float
     */
    public function getArmorPerLevel(): float
    {
        return $this->armorPerLevel;
    }

    /**
     * @return float
     */
    public function getMagicResist(): float
    {
        return $this->magicResist;
    }

    /**
     * @return float
     */
    public function getMagicResistPerLevel(): float
    {
        return $this->magicResistPerLevel;
    }

    /**
     * @return int
     */
    public function getAttackRange(): int
    {
        return $this->attackRange;
    }

    /**
     * @return float
     */
    public function getHealthRegeneration(): float
    {
        return $this->healthRegeneration;
    }

    /**
     * @return float
     */
    public function getHealthRegenerationPerLevel(): float
    {
        return $this->healthRegenerationPerLevel;
    }

    /**
     * @return float
     */
    public function getResourceRegeneration(): float
    {
        return $this->resourceRegeneration;
    }

    /**
     * @return float
     */
    public function getResourceRegenerationPerLevel(): float
    {
        return $this->resourceRegenerationPerLevel;
    }

    /**
     * @return float
     */
    public function getCritChance(): float
    {
        return $this->critChance;
    }

    /**
     * @return float
     */
    public function getCritChancePerLevel(): float
    {
        return $this->critChancePerLevel;
    }

    /**
     * @return float
     */
    public function getAttackDamage(): float
    {
        return $this->attackDamage;
    }

    /**
     * @return float
     */
    public function getAttackDamagePerLevel(): float
    {
        return $this->attackDamagePerLevel;
    }

    /**
     * @return float
     */
    public function getAttackSpeed(): float
    {
        return $this->attackSpeed;
    }

    /**
     * @return float
     */
    public function getAttackSpeedPerLevel(): float
    {
        return $this->attackSpeedPerLevel;
    }
}