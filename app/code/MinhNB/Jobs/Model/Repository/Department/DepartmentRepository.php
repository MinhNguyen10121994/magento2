<?php

namespace MinhNB\Jobs\Model\Repository\Department;

use Exception;
use MinhNB\Jobs\Model\Department;
use MinhNB\Jobs\Model\ResourceModel\Department as ResourceModel;
use MinhNB\Jobs\Model\DepartmentFactory as Model;

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
     */
    public function __construct(
        ResourceModel $resourceModel,
        Model $model
    ) {
        $this->resourceModel = $resourceModel;
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
}