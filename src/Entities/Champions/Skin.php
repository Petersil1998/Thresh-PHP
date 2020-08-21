<?php


namespace src\Entities\Champions;


class Skin
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
     * @var bool
     */
    private $chromas;

    /**
     * Skin constructor.
     * @param int $id
     * @param string $name
     * @param bool $chromas
     */
    public function __construct(int $id, string $name, bool $chromas)
    {
        $this->id = $id;
        $this->name = $name;
        $this->chromas = $chromas;
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
     * @return bool
     */
    public function isChromas(): bool
    {
        return $this->chromas;
    }
}