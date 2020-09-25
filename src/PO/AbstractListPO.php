<?php
/**
 * 查询PO
 *
 * @author Stephen
 */
namespace Cqcqs\Mode\PO;

use Cqcqs\Mode\Kernels\PO;
use Cqcqs\Mode\PO\Traits\ConditionsPOTrait;
use Cqcqs\Mode\PO\Traits\OrderByPOTrait;
use Cqcqs\Mode\PO\Traits\PaginationPOTrait;
use Cqcqs\Mode\PO\Traits\SubsetFieldsPOTrait;

abstract class AbstractListPO extends PO
{
    use ConditionsPOTrait;
    use PaginationPOTrait;
    use OrderByPOTrait;
    use SubsetFieldsPOTrait;
}