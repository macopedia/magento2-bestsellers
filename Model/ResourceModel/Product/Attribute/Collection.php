<?php

namespace Macopedia\Bestseller\Model\ResourceModel\Product\Attribute;

use Magento\Catalog\Model\ResourceModel\Product\Attribute\Collection as AttributeCollection;

class Collection extends AttributeCollection
{
    protected array $_options = [];

    /**
     * Convert collection items to select options array
     */
    public function toOptionArray(string|bool $emptyLabel = ' '): array
    {
        return $this->_toOptionArray('attribute_code', 'frontend_label', []);
    }
}
