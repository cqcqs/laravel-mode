<?php
/**
 * 业务逻辑层
 * @author Stephen
 */
namespace Cqcqs\Mode\Kernels;

abstract class Service
{
    /**
     * @var mixed
     */
    private $assign_action;

    /**
     * @param $context
     * @return $this
     */
    public function ctx($context)
    {
        return $this;
    }

    public function setAssignAction($value)
    {
        $this->assign_action = $value;
    }
}