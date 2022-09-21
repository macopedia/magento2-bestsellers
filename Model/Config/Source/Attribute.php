<?php

namespace Macopedia\Bestseller\Model\Config\Source;

use Macopedia\Bestseller\Model\ResourceModel\Product\Attribute\Collection as AttributeCollection;
use Magento\Framework\Data\OptionSourceInterface;

class Attribute implements OptionSourceInterface
{
    protected array $_options = [];

    public function __construct(private readonly AttributeCollection $attributeCollection)
    {
    }

    public function toOptionArray(): array
    {
        if (!$this->_options) {
            $this->_options = $this->attributeCollection->load()->toOptionArray();
        }

        return $this->_options;
    }
}
