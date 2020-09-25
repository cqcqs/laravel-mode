<?php
/**
 * 定义查询字段
 * @author Stephen
 */
namespace Cqcqs\Mode\PO\Traits;

trait SubsetFieldsPOTrait
{
    /**
     * 定义查询字段
     * @var string[] | null
     */
    protected $fields;

    /**
     * @return string[]|null
     */
    public function getFields(): ?array
    {
        return $this->fields;
    }

    /**
     * @example 'field1, field2...'
     * @example ['field1', 'field2'...]
     * @param mixed|null $fields
     */
    public function setFields($fields): void
    {
        if (!$fields) {
            $this->fields = null;
            return;
        }

        if (is_array($fields)) {
            $this->fields = $fields;
            return;
        }

        $fields = collect(str_getcsv($fields))->map(function ($item){
            $item = trim($item);
            if (!$item) {
                return null;
            }
            return $item;
        })->filter(function ($item) {
            return !!$item;
        });

        if (!$fields->count()) {
            $this->fields = [];
            return;
        }

        $this->fields = $fields->toArray();
    }

    /**
     * @param string $field
     * @return bool
     */
    public function hasField(string $field) : bool
    {
        return is_null($this->fields) || in_array($field, $this->fields);
    }


}