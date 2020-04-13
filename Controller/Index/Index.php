<?php
namespace Sakib\TaskManager\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;

    protected $_taskFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Sakib\TaskManager\Model\TaskFactory $taskFactory)
    {
        $this->_pageFactory = $pageFactory;
        $this->_taskFactory = $taskFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        return $this->_pageFactory->create();
    }
}
