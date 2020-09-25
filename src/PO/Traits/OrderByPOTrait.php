<?php
/**
 * 字段排序
 * @author Stephen
 */
namespace Cqcqs\Mode\PO\Traits;

trait OrderByPOTrait
{
    /**
     * 字段排序
     * @example [['field1', 'asc|desc'], ['field2', 'asc|desc']...]
     * @var array|null
     */
    protected $order_by;

    /**
     * @return array|null
     */
    public function getOrderBy(): ?array
    {
        return $this->order_by;
    }

    /**
     * @example 'field1:asc|desc, field2:asc|desc'
     * @example [['field1', 'asc|desc'], ['field2', 'asc|desc']...]
     * @param mixed|null $orderBy
     */
    public function setOrderBy($orderBy): void
    {
        if (!$orderBy) {
            $this->order_by = null;
            return;
        }

        if (is_array($orderBy)) {
            $this->order_by = $orderBy;
            return;
        }

        $orderBy = collect(str_getcsv($orderBy))->map(function ($item) {
            $item = trim($item);
            if (!$item) {
                return null;
            }

            $value = explode(':', $item);
            if (count($value) === 0) {
                return null;
            }
            if (count($value) === 1) {
                $value[1] = 'asc';
            }
            if ($value[1] !== 'asc') {
                $value[1] = 'desc';
            }

            return array_slice($value, 0, 2);
        })->filter(function ($item) {
            return !!$item;
        });

        if ($orderBy->isEmpty()) {
            $this->order_by = null;
            return;
        }

        $this->order_by = $orderBy->toArray();
    }


}