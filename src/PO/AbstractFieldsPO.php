<?php
/**
 * 数据库字段
 * @author Stephen
 */
namespace Cqcqs\Mode\PO;

use Cqcqs\Mode\Kernels\PO;
use Cqcqs\Mode\PO\Traits\PrimaryKeyTrait;

abstract class AbstractFieldsPO extends PO
{
    use PrimaryKeyTrait;
}