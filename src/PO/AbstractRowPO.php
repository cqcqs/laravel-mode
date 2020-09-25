<?php
/**
 * 查询一条记录
 * @author Stephen
 */
namespace Cqcqs\Mode\PO;

use Cqcqs\Mode\Kernels\PO;
use Cqcqs\Mode\PO\Traits\PrimaryKeyTrait;
use Cqcqs\Mode\PO\Traits\SubsetFieldsPOTrait;

abstract class AbstractRowPO extends PO
{
    use PrimaryKeyTrait;
    use SubsetFieldsPOTrait;
}