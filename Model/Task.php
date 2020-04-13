<?php
namespace Sakib\TaskManager\Model;

use Magento\Framework\Model\AbstractModel;

class Task extends AbstractModel
{
    protected function _construct()
    {
        $this->_init('Sakib\TaskManager\Model\ResourceModel\Tasks');
    }
}
