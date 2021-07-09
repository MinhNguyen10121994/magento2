<?php

namespace MinhNB\Jobs\Controller\Adminhtml\Department;

use Exception;
use Magento\Backend\App\Action\Context;
use Magento\Backend\App\Action;
use MinhNB\Jobs\Model\Repository\Department\DepartmentRepository;
use \Magento\Framework\App\Request\Http as Request;
use \Magento\Framework\Controller\ResultInterface;
use \Magento\Framework\App\ResponseInterface;

class Delete extends Action
{
    const ADMIN_RESOURCE = 'MinhNB_Jobs::job';

    /**
     * @var DepartmentRepository
     */
    protected DepartmentRepository $departmentRepository;

    /**
     * @var Request
     */
    protected Request $request;

    /**
     * @param Context $context
     * @param DepartmentRepository $departmentRepository
     * @param Request $request
     */
    public function __construct(
        Context $context,
        DepartmentRepository $departmentRepository,
        Request $request
    ) {
        $this->departmentRepository = $departmentRepository;
        $this->request = $request;
        parent::__construct($context);
    }

    /**
     * Index action
     *
     * @throws Exception
     */
    public function execute()
    {
        $id = $this->request->getParam('id');

        $department = $this->departmentRepository->find($id);

        $this->departmentRepository->delete($department);

        return $this->_redirect('jobs/department/index');
    }
}