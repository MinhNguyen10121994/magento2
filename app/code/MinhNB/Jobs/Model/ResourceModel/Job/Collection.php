<?php

namespace MinhNB\Jobs\Model\ResourceModel\Job;

use \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{

    protected $_idFieldName = \MinhNB\Jobs\Model\Job::JOB_ID;

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('MinhNB\Jobs\Model\Job', 'MinhNB\Jobs\Model\ResourceModel\Job');
    }
}