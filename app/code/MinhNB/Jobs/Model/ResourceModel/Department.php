<?php

namespace MinhNB\Jobs\Model\ResourceModel;

use \Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Department post mysql resource
 */
class Department extends AbstractDb
{

    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        // Table Name and Primary Key column
        $this->_init('minhnb_department', 'entity_id');
    }

    public function delete(\Magento\Framework\Model\AbstractModel $object)
    {
        return parent::delete($object); // TODO: Change the autogenerated stub
    }

    public function load(\Magento\Framework\Model\AbstractModel $object, $value, $field = null)
    {
        return parent::load($object, $value, $field); // TODO: Change the autogenerated stub
    }
}