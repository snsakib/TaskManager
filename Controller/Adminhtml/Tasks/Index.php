<?php

namespace Sakib\TaskManager\Controller\Adminhtml\Tasks;

class Index extends \Magento\Backend\App\Action
{
    const ADMIN_RESOURCE = 'Sakib_TaskManager::taskmanager';

    public function execute()
    {
        $this->_view->loadLayout();
        $this->_setActiveMenu(self::ADMIN_RESOURCE);
        $title = __('Task Manager');
        $this->_view->getPage()->getConfig()->getTitle()->prepend($title);
        $this->_addBreadcrumb($title, $title);
        $this->_view->renderLayout();
    }
}
