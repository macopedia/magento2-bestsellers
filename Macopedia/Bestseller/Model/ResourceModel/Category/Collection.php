<?php

declare(strict_types=1);

namespace Macopedia\Bestseller\Model\ResourceModel\Category;

use Magento\Catalog\Model\ResourceModel\Category\Collection as CategoryCollection;

class Collection extends CategoryCollection
{
    protected array $_options = [];

    /**
     * Convert collection items to select options array
     */
    public function toOptionArray(string|bool $emptyLabel = ' '): array
    {
        $categories = $this->_toOptionArray('entity_id', 'name', []);

        $options = [];
        foreach ($categories as $valueLabel) {
            $option = ['value' => $valueLabel['value'], 'label' => sprintf('%s (id:%s)', $valueLabel['label'], $valueLabel['value'])];

            $options[] = $option;
        }
        if ($emptyLabel !== false && count($options) > 1) {
            array_unshift($options, ['value' => '', 'label' => $emptyLabel]);
        }

        return $options;
    }
}
