<?php
/**
 * 主键ID
 * @author Stephen
 */
namespace Cqcqs\Mode\PO\Traits;

trait PrimaryKeyTrait
{
    /**
     * Primary Key ID
     * @var int|null
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