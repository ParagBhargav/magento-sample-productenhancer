<?php
namespace Sample\ProductEnhancer\Controller\Adminhtml\Log;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Sample\ProductEnhancer\Model\ProductViewLogFactory;
use Magento\Framework\Controller\ResultFactory;

class Delete extends Action
{
    protected $productViewLogFactory;

    public function __construct(
        Context $context,
        ProductViewLogFactory $productViewLogFactory
    ) {
        parent::__construct($context);
        $this->productViewLogFactory = $productViewLogFactory;
    }

    public function execute()
    {
        $logId = $this->getRequest()->getParam('log_id');
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        
        if ($logId) {
            try {
                $model = $this->productViewLogFactory->create();
                $model->load($logId);
                $model->delete();
                $this->messageManager->addSuccessMessage(__('The log has been deleted.'));
            } catch (\Exception $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            }
        }
        
        return $resultRedirect->setPath('*/*/');
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Sample_ProductEnhancer::view_log');
    }
}