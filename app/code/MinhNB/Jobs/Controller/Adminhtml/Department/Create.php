<?php

namespace MinhNB\Jobs\Controller\Adminhtml\Department;

use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;
use Magento\Backend\App\Action;

class Create extends Action
{
    const ADMIN_RESOURCE = 'MinhNB_Jobs::job';

    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * @param Context $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    /**
     * Index action
     *
     * @return Page
     */
    public function execute()
    {
        /** @var Page $resultPage */
        $resultPage = $this->resultPageFactory->create();

        $resultPage->setActiveMenu('MinhNB_Jobs::job');
        $resultPage->addBreadcrumb(__('Departments'), __('Departments'));
        $resultPage->addBreadcrumb(__('Create New Departments'), __('Create New Departments'));
        $resultPage->getConfig()->getTitle()->prepend(__('Department'));

        return $resultPage;
    }
}