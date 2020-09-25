<?php
namespace Cqcqs\Mode\Contracts;

use Cqcqs\Mode\PO\FieldsPO;
use Cqcqs\Mode\PO\FindListPO;
use Cqcqs\Mode\PO\FindRowPO;

interface RepositoryInterface
{
    /**
     * @param FindListPO $findListPO
     * @return mixed
     */
    public function all(FindListPO $findListPO);

    /**
     * @param FindListPO $findListPO
     * @return mixed
     */
    public function paginate(FindListPO $findListPO);

    /**
     * @param FieldsPO $fieldsPO
     * @return mixed
     */
    public function insert(FieldsPO $fieldsPO);

    /**
     * @param FieldsPO $fieldsPO
     * @return mixed
     */
    public function update(FieldsPO $fieldsPO);

    /**
     * @param FindRowPO $findRowPO
     * @return mixed
     */
    public function delete(FindRowPO $findRowPO);

    /**
     * @param FindRowPO $findRowPO
     * @return mixed
     */
    public function find(FindRowPO $findRowPO);

}