<?php

declare(strict_types=1);

namespace Macopedia\Bestseller\Model\Config\Source;

use Macopedia\Bestseller\Model\ResourceModel\Category\Collection as CategoryCollection;
use Magento\Framework\Data\OptionSourceInterface;

class Category implements OptionSourceInterface
{
    protected array $_options = [];

    public function __construct(private readonly CategoryCollection $categoryCollection)
    {
    }

    public function toOptionArray(): array
    {
        if (!$this->_options) {
            $this->_options = $this->categoryCollection->addNameToResult()->load()->toOptionArray();
        }

        return $this->_options;
    }
}
