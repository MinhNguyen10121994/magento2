<?php

namespace MinhNB\Jobs\Controller\Adminhtml\Department;

use Exception;
use Magento\Backend\App\Action\Context;
use Magento\Backend\App\Action;
use MinhNB\Jobs\Model\Repository\Department\DepartmentRepositoryInterface;
use MinhNB\Jobs\Model\ResourceModel\Department\CollectionFactory;
use \Magento\Framework\App\Request\Http as Request;
use \Magento\Framework\Controller\ResultInterface;
use \Magento\Framework\App\ResponseInterface;
use Magento\Ui\Component\MassAction\Filter;

class MassDelete extends Action
{
    const ADMIN_RESOURCE = 'MinhNB_Jobs::job';

    /**
     * Massactions filter
     *
     * @var Filter
     */
    protected Filter $filter;

    /**
     * @var CollectionFactory
     */
    protected CollectionFactory $collectionFactory;

    /**
     * @var DepartmentRepositoryInterface
     */
    protected DepartmentRepositoryInterface $departmentRepository;

    /**
     * @var Request
     */
    protected Request $request;

    /**
     * @param Context $context
     * @param CollectionFactory $collectionFactory
     * @param DepartmentRepositoryInterface $departmentRepository
     * @param Filter $filter
     * @param Request $request
     */
    public function __construct(
        Context $context,
        CollectionFactory $collectionFactory,
        DepartmentRepositoryInterface $departmentRepository,
        Filter $filter,
        Request $request
    ) {
        $this->filter = $filter;
        $this->collectionFactory = $collectionFactory;
        $this->request = $request;
        $this->departmentRepository = $departmentRepository ?:
            \Magento\Framework\App\ObjectManager::getInstance()->create(DepartmentRepositoryInterface::class);
        parent::__construct($context);
    }

    /**
     * Index action
     *
     * @throws Exception
     */
    public function execute()
    {
        $productDeleted = 0;
        $productDeletedError = 0;
        $collection = $this->filter->getCollection($this->collectionFactory->create());

        foreach ($collection->getItems() as $department) {
            try {
                $this->departmentRepository->delete($department);
                $productDeleted++;
            } catch (Exception $e) {
                $productDeletedError++;
            }
        }

        if ($productDeleted) {
            $this->messageManager->addSuccessMessage(
                __('A total of %1 record(s) have been deleted.', $productDeleted)
            );
        }

        if ($productDeletedError) {
            $this->messageManager->addErrorMessage(
                __(
                    'A total of %1 record(s) haven\'t been deleted. Please see server logs for more details.',
                    $productDeletedError
                )
            );
        }

        return $this->_redirect('jobs/department/index');
    }
}