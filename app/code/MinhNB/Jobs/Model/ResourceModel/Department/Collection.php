<?php

namespace MinhNB\Jobs\Model\ResourceModel\Department;

use \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{

    protected $_idFieldName = \MinhNB\Jobs\Model\Department::DEPARTMENT_ID;

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('MinhNB\Jobs\Model\Department', 'MinhNB\Jobs\Model\ResourceModel\Department');
    }
}