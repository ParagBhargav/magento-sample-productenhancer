<?php
namespace Sample\ProductEnhancer\Model\ResourceModel\ProductViewLog;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
            \Sample\ProductEnhancer\Model\ProductViewLog::class,
            \Sample\ProductEnhancer\Model\ResourceModel\ProductViewLog::class
        );
    }
}