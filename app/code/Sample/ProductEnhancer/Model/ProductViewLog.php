<?php
namespace Sample\ProductEnhancer\Model;

use Magento\Framework\Model\AbstractModel;

class ProductViewLog extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(\Sample\ProductEnhancer\Model\ResourceModel\ProductViewLog::class);
    }
}