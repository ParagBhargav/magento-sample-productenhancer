<?php
namespace Sample\ProductEnhancer\Model\ResourceModel\ProductViewLog\Grid;

use Magento\Framework\ObjectManagerInterface;

class CollectionFactory
{
    protected $objectManager;
    protected $instanceName;

    public function __construct(
        ObjectManagerInterface $objectManager,
        $instanceName = \Sample\ProductEnhancer\Model\ResourceModel\ProductViewLog\Grid\Collection::class
    ) {
        $this->objectManager = $objectManager;
        $this->instanceName = $instanceName;
    }

    public function create(array $data = [])
    {
        return $this->objectManager->create($this->instanceName, $data);
    }
}