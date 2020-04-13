<?php

namespace Sakib\TaskManager\Controller\Adminhtml\Tasks;

class Save extends \Magento\Backend\App\Action
{
    protected $taskFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Sakib\TaskManager\Model\taskFactory $taskFactory
    ) {
        parent::__construct($context);
        $this->taskFactory = $taskFactory;
    }

    public function execute()
    {
        $data = $this->getRequest()->getPostValue();

        if (!$data) {
            $this->_redirect->getRedirectUrl();
            return;
        }

        try {
            $modelFactory = $this->taskFactory->create();
            if (array_key_exists('id', $data)) {
                $modelFactory->load($data["id"]);
                $modelFactory->setData('name', $data['name']);
                $modelFactory->save();
                $this->messageManager->addSuccess(__('Row data has been Edited successfully.'));
            } else {
                $modelFactory->setData($data);
                $modelFactory->save();
                $this->messageManager->addSuccess(__('Row data has been successfully saved.'));
            }
        } catch (\Exception $e) {
            $this->messageManager->addError(__($e->getMessage()));
        }
        return $this->_redirect($this->_redirect->getRedirectUrl());
    }
}
