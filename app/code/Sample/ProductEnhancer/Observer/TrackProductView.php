<?php
namespace Sample\ProductEnhancer\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Sample\ProductEnhancer\Model\ProductViewLogFactory;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;

class TrackProductView implements ObserverInterface
{
    protected $productViewLogFactory;
    protected $scopeConfig;

    public function __construct(
        ProductViewLogFactory $productViewLogFactory,
        ScopeConfigInterface $scopeConfig
    ) {
        $this->productViewLogFactory = $productViewLogFactory;
        $this->scopeConfig = $scopeConfig;
    }

    public function execute(Observer $observer)
    {
        if (!$this->scopeConfig->getValue('productenhancer/general/enabled', ScopeInterface::SCOPE_STORE)) {
            return;
        }

        $product = $observer->getEvent()->getProduct();
        $productId = $product->getId();

        $log = $this->productViewLogFactory->create();
        $collection = $log->getCollection()->addFieldToFilter('product_id', $productId);

        if ($collection->getSize() > 0) {
            $existingLog = $collection->getFirstItem();
            $existingLog->setViewCount($existingLog->getViewCount() + 1);
            $existingLog->setLastViewedAt(date('Y-m-d H:i:s'));
            $existingLog->save();
        } else {
            $log->setProductId($productId)
                ->setViewCount(1)
                ->setLastViewedAt(date('Y-m-d H:i:s'))
                ->save();
        }
    }
}