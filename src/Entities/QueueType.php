<?php

namespace Thresh\Entities;

/**
 * This Class represents a Queue Type
 * @package Thresh\Entities
 */
class QueueType
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $map;

    /**
     * @var string|null
     */
    private $description;

    /**
     * @var string|null
     */
    private $notes;

    /**
     * QueueType constructor.
     * @param int $id
     * @param string $map
     * @param string|null $description
     * @param string|null $notes
     */
    public function __construct($id, $map, $description, $notes)
    {
        $this->id = $id;
        $this->map = $map;
        $this->description = $description;
        $this->notes = $notes;
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
    public function getMap(): string
    {
        return $this->map;
    }

    /**
     * @return string|null
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return string|null
     */
    public function getNotes()
    {
        return $this->notes;
    }
}