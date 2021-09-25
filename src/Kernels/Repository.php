<?php
/**
 * 数据提供，数据库通用Curd
 * @author Stephen
 */
namespace Cqcqs\Mode\Kernels;

use Cqcqs\Mode\Contracts\RepositoryInterface;
use Cqcqs\Mode\PO\FieldsPO;
use Cqcqs\Mode\PO\FindListPO;
use Cqcqs\Mode\PO\FindRowPO;
use Illuminate\Container\Container as App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Exception;

abstract class Repository implements RepositoryInterface
{
    private $app;

    /**
     * @var Builder
     */
    private $model;

    /**
     * Repository constructor.
     * @param App $app
     * @throws Exception
     */
    public function __construct(App $app)
    {
        $this->app = $app;
        $this->makeModel();
    }

    /**
     * @return mixed
     */
    abstract function model();

    /**
     * 查询记录
     * @param FindListPO $findListPO
     * @return mixed
     */
    public function all(FindListPO $findListPO)
    {
        // condition where
        $findListPO->getWhere() && $this->model->where(
            $findListPO->getWhere()
        );

        // condition whereIn
        $findListPO->getWhereIn() && $this->model->whereIn(
            $findListPO->getWhereIn()[0],
            $findListPO->getWhereIn()[1]
        );

        // condition whereNotIn
        $findListPO->getWhereNotIn() && $this->model->whereNotIn(
            $findListPO->getWhereNotIn()[0],
            $findListPO->getWhereNotIn()[1]
        );

        // order by
        if ($orderBy = $findListPO->getOrderBy()) {
            foreach ($orderBy as $order) {
                $this->model->orderBy($order[0], $order[1] ?? 'asc');
            }
        }

        // load collection or pagination
        if (!$findListPO->isLoadCollection()) {
            return $this->paginate($findListPO, $this->model);
        }

        return $this->model->get($findListPO->getFields() ?? ['*']);
    }

    /**
     * 分页查询
     * @param FindListPO $findListPO
     * @param null $model
     * @return mixed
     */
    public function paginate(FindListPO $findListPO, $model = null)
    {
        if (!$model) {
            $model = $this->model;
        }
        return $model->paginate(
            $findListPO->getLimit(),
            $findListPO->getFields() ?? '*',
            null,
            $findListPO->getPage()
        );
    }

    /**
     * 插入一条记录
     * @param FieldsPO $fieldsPO
     * @return mixed
     */
    public function insert(FieldsPO $fieldsPO)
    {
        $data = array_filter($fieldsPO->toArray(), function($value) {
            return $value !== null;
        });
        return $this->model->insertGetId($data);
    }

    /**
     * 更新一条记录（根据主键ID）
     * @param FieldsPO $fieldsPO
     * @return mixed
     */
    public function update(FieldsPO $fieldsPO)
    {
        $data = array_filter($fieldsPO->toArray(), function($value) {
            return $value !== null;
        });
        return $this->model->find(
            $fieldsPO->getId()
        )->update($data);
    }

    /**
     * 删除记录（根据主键ID）
     * @param FindRowPO $findRowPO
     * @return mixed
     */
    public function delete(FindRowPO $findRowPO)
    {
        return $this->model->find($findRowPO->getId())->delete();
    }

    /**
     * 查询一条记录（根据主键ID）
     * @param FindRowPO $findRowPO
     * @return mixed
     */
    public function find(FindRowPO $findRowPO)
    {
        return $this->model->find(
            $findRowPO->getId(),
            $findRowPO->getFields() ?? ['*']
        );
    }

    /**
     * @return Builder
     * @throws Exception
     */
    public function makeModel() : Builder
    {
        $model = $this->app->make($this->model());

        if (!$model instanceof Model) {
            throw new Exception("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");
        }

        return $this->model = $model->newQuery();
    }
}