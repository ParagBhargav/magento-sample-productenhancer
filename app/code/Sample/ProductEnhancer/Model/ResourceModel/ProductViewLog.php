<?php
namespace Sample\ProductEnhancer\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class ProductViewLog extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('sample_product_view_log', 'log_id');
    }
}