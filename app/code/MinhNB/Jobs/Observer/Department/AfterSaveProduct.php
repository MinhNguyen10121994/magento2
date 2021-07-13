<?php

namespace MinhNB\Jobs\Observer\Department;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\App\RequestInterface;
use MinhNB\Jobs\Model\Repository\Department\DepartmentRepositoryInterface;

class AfterSaveProduct implements ObserverInterface
{
    private $request;

    /**
     * @var DepartmentRepositoryInterface
     */
    protected DepartmentRepositoryInterface $departmentRepository;

    public function __construct(
        RequestInterface $request,
        DepartmentRepositoryInterface $departmentRepository
    )
    {
        $this->request = $request;
        $this->departmentRepository = $departmentRepository ?:
            \Magento\Framework\App\ObjectManager::getInstance()->create(DepartmentRepositoryInterface::class);
        // Observer initialization code...
        // You can use dependency injection to get any class this observer may need.
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $params = $this->request->getParams();
//
//        $departmentParams = [
//            'name' => $params['department_name'],
//            'description' => $params['department_description'],
//        ];
//
//        $this->departmentRepository->store($departmentParams);
    }
}