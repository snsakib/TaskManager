<?php

namespace Sakib\TaskManager\Block\Adminhtml\Tasks\Edit;

use Sakib\TaskManager\Model\ResourceModel\Tasks\CollectionFactory;
use Magento\Backend\Block\Template\Context;
use Magento\Backend\Block\Widget\Form\Generic;
use Magento\Framework\Data\FormFactory;
use Magento\Framework\Registry;

class Form extends Generic
{
    protected $taskModel;

    public function __construct(
        Context $context,
        Registry $registry,
        FormFactory $formFactory,
        CollectionFactory $taskModel,
        array $data = []
    ) {
        parent::__construct($context, $registry, $formFactory, $data);
        $this->taskModel = $taskModel;
    }

    protected function _prepareForm()
    {
        $model = $this->_coreRegistry->registry('row_data');
        $form = $this->_formFactory->create(
            ['data' => [
                'id' => 'edit_form',
                'action' => $this->getData('action'),
                'method' => 'post'
            ]
            ]
        );
        $form->setHtmlIdPrefix('task_manager_');

        $fieldset = $form->addFieldset(
            'base_fieldset',
            ['legend' => __('Task Information'), 'class' => 'fieldset-wide']
        );
        if ($model->getId()) {
            $fieldset->addField(
                'id',
                'hidden',
                ['name' => 'id']
            );
        }

        $fieldset->addField(
            'name',
            'text',
            [
                'name' => 'name',
                'label' => __('Task Name'),
                'title' => __('Task Name'),
                'id' => 'name',
                'class' => 'required-entry',
                'required' => true
            ]
        );

        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}
