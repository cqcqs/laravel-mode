<?php
/**
 * Where条件
 * @author Stephen
 */
namespace Cqcqs\Mode\PO\Traits;

trait ConditionsPOTrait
{
    /**
     * where条件
     * @example [['field1', 'data1'], ['field2', 'condition', 'data2']...]
     * @var array|null
     */
    protected $where;

    /**
     * whereIn条件
     * @example ['field', ['data1', 'data2'...]]
     * @var array|null
     */
    protected $whereIn;

    /**
     * whereNotIn条件
     * @example ['field', ['data1', 'data2'...]]
     * @var array|null
     */
    protected $whereNotIn;

    /**
     * @return array|null
     */
    public function getWhere(): ?array
    {
        return $this->where;
    }

    /**
     * @param array|null $where
     */
    public function setWhere(?array $where): void
    {
        $this->where = $where;
    }

    /**
     * @return array|null
     */
    public function getWhereIn(): ?array
    {
        return $this->whereIn;
    }

    /**
     * @param array|null $whereIn
     */
    public function setWhereIn(?array $whereIn): void
    {
        $this->whereIn = $whereIn;
    }

    /**
     * @return array|null
     */
    public function getWhereNotIn(): ?array
    {
        return $this->whereNotIn;
    }

    /**
     * @param array|null $whereNotIn
     */
    public function setWhereNotIn(?array $whereNotIn): void
    {
        $this->whereNotIn = $whereNotIn;
    }


}