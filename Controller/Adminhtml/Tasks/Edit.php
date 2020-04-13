<?php
namespace Sakib\TaskManager\Controller\Adminhtml\Tasks;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Registry;

class Edit extends Action
{
    const ADMIN_RESOURCE = 'Sakib_TaskManager::task';

    private $taskDetails;

    protected $coreRegistry;

    public function __construct(
        Context $context,
        Registry $coreRegistry,
        \Sakib\TaskManager\Model\Task $taskDetails
    ) {
        parent::__construct($context);
        $this->coreRegistry = $coreRegistry;
        $this->taskDetails = $taskDetails;
    }

    public function execute()
    {
        $rowId = (int)$this->getRequest()->getParam('id');
        if ($rowId) {
            $this->taskDetails = $this->taskDetails->load($rowId);
            $rowTitle = $this->taskDetails->getTitle();
            if (!$this->taskDetails->getId()) {
                $this->messageManager->addError(__('row data no longer exist.'));
                $this->_redirect('taskmanager/tasks/index');
                return;
            }
        }

        $this->coreRegistry->register('row_data', $this->taskDetails);
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $title = $rowId ? __('Edit Task') . $rowTitle : __('Add Task');
        $resultPage->getConfig()->getTitle()->prepend($title);
        return $resultPage;
    }
}
