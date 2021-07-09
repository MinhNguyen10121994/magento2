<?php

namespace MinhNB\Jobs\Block\Department;

class CategoryName extends \Magento\Framework\View\Element\Template
{
    protected $_job;

    protected $_departmentFactory;

    protected $_resource;

    protected $_jobCollection = null;

    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \MinhNB\Jobs\Model\Job $job
     * @param \MinhNB\Jobs\Model\Department $department
     * @param \Magento\Framework\App\ResourceConnection $resource
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \MinhNB\Jobs\Model\Job $job,
        \MinhNB\Jobs\Model\DepartmentFactory $departmentFactory,
        \Magento\Framework\App\ResourceConnection $resource,
        array $data = []
    ) {
        $this->_job = $job;
        $this->_departmentFactory = $departmentFactory;
        $this->_resource = $resource;

        parent::__construct(
            $context,
            $data
        );
    }

    /**
     * @return $this
     */
    protected function _prepareLayout()
    {
        parent::_prepareLayout();

        $data = $this->_departmentFactory->create()->load(2);

        $this->setData('name', $data->getName());

        return $this;
    }
}