<?php
namespace Cqcqs\Mode\DTO;

use Cqcqs\Mode\Kernels\DTO;

abstract class AbstractListDTO extends DTO
{
    /**
     * Pagination DTO
     */
    use PaginationDTOTrait;

    /**
     * Order By DTO
     */
    use OrderByDTOTrait;

    /**
     * Subset Fields DTO
     */
    use SubsetFieldsDTOTrait;
}