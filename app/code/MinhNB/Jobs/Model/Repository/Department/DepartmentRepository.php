<?php

namespace MinhNB\Jobs\Model\Repository\Department;

use Exception;
use MinhNB\Jobs\Model\Department;
use MinhNB\Jobs\Model\ResourceModel\Department as ResourceModel;
use MinhNB\Jobs\Model\DepartmentFactory as Model;
use MinhNB\Jobs\Model\ResourceModel\Department\CollectionFactory as Collection;

class DepartmentRepository implements DepartmentRepositoryInterface
{
    /**
     * @var ResourceModel
     */
    protected ResourceModel $resourceModel;

    /**
     * @var Model
     */
    protected Model $model;

    /**
     * @var Collection
     */
    protected Collection $collection;

    /**
     */
    public function __construct(
        ResourceModel $resourceModel,
        Collection $collection,
        Model $model
    ) {
        $this->resourceModel = $resourceModel;
        $this->collection = $collection;
        $this->model = $model;
    }

    /**
     * @param Department $object
     * @throws Exception
     */
    public function delete(Department $object): void
    {
        $this->resourceModel->delete($object);
    }

    /**
     * @param int $id
     * @return Department
     */
    public function find(int $id): Department
    {
        return $this->model->create()->load($id);
    }

    /**
     * @param $data
     * @return Department
     * @throws Exception
     */
    public function store($data): Department
    {
        return $this->model
            ->create()
            ->addData($data)
            ->save();
    }

    public function getCollection() {
        return $this->collection->create();
    }
}