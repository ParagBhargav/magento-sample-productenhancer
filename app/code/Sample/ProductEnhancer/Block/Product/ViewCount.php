<?php
namespace Sample\ProductEnhancer\Block\Product;

use Magento\Framework\View\Element\Template;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Sample\ProductEnhancer\Model\ProductViewLogFactory;
use Magento\Catalog\Block\Product\Context;

class ViewCount extends Template
{
    protected $scopeConfig;
    protected $productViewLogFactory;
    protected $registry;

    public function __construct(
        Context $context,
        ScopeConfigInterface $scopeConfig,
        ProductViewLogFactory $productViewLogFactory,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->scopeConfig = $scopeConfig;
        $this->productViewLogFactory = $productViewLogFactory;
        $this->registry = $context->getRegistry();
    }

    public function isEnabled()
    {
        return $this->scopeConfig->getValue('productenhancer/general/enabled');
    }

    public function getDisplayText()
    {
        return $this->scopeConfig->getValue('productenhancer/general/display_text');
    }

    public function getViewCount($productId)
    {
        $log = $this->productViewLogFactory->create();
        $collection = $log->getCollection()->addFieldToFilter('product_id', $productId);
        
        if ($collection->getSize() > 0) {
            return $collection->getFirstItem()->getViewCount();
        }
        
        return 0;
    }

    public function getProduct()
    {
        if (!$this->hasData('product')) {
            $this->setData('product', $this->registry->registry('product'));
        }
        return $this->getData('product');
    }
}