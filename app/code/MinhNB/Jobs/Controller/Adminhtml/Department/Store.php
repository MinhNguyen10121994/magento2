<?php

namespace MinhNB\Jobs\Controller\Adminhtml\Department;

use Exception;
use Magento\Backend\App\Action\Context;
use Magento\Backend\App\Action;
use MinhNB\Jobs\Model\DepartmentFactory;
use \Magento\Framework\App\Request\Http as Request;
use \Magento\Framework\Controller\ResultInterface;
use \Magento\Framework\App\ResponseInterface;

class Store extends Action
{
    const ADMIN_RESOURCE = 'MinhNB_Jobs::job';

    /**
     * @var DepartmentFactory
     */
    protected DepartmentFactory $departmentFactory;

    /**
     * @var Request
     */
    protected Request $request;

    /**
     * @param Context $context
     * @param DepartmentFactory $departmentFactory
     * @param Request $request
     */
    public function __construct(
        Context $context,
        DepartmentFactory $departmentFactory,
        Request $request
    ) {
        $this->departmentFactory = $departmentFactory;
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

        $department = $this->departmentFactory->create();
        $department->load($id);
        $department->delete();

        return $this->_redirect('jobs/department/index');
    }
}