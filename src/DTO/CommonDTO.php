<?php
namespace Cqcqs\Mode\DTO;

use Cqcqs\Mode\DTO;

class CommonDTO extends DTO
{
    /**
     * @var int | null
     */
    protected $id;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }


}