<?php
namespace Sakib\TaskManager\Model\ResourceModel\Tasks;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    public function _construct()
    {
        $this->_init(
            'Sakib\TaskManager\Model\Task',
            'Sakib\TaskManager\Model\ResourceModel\Tasks'
        );
    }
}
