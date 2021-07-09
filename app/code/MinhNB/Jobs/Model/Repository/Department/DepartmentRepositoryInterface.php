<?php

namespace MinhNB\Jobs\Model\Repository\Department;

use Exception;
use MinhNB\Jobs\Model\Department;

interface DepartmentRepositoryInterface
{
    /**
     * @param Department $object
     * @throws Exception
     */
    public function delete(Department $object): void;

    /**
     * @param int $id
     * @return Department
     */
    public function find(int $id): Department;
}