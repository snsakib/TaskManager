<?php
namespace Sakib\TaskManager\Block;
class Index extends \Magento\Framework\View\Element\Template
{
    protected $_taskFactory;
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Sakib\TaskManager\Model\TaskFactory $taskFactory
    )
    {
        $this->_taskFactory = $taskFactory;
        parent::__construct($context);
    }

    public function getTaskCollection(){
        $task = $this->_taskFactory->create();
        return $task->getCollection();
    }
}
