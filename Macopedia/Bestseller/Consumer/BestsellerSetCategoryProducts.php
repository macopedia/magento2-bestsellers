<?php

declare(strict_types=1);

namespace Macopedia\Bestseller\Consumer;

use Macopedia\Bestseller\Model\Config;
use Macopedia\Bestseller\Model\SaveCategoryProducts;
use Magento\Framework\App\Config\ScopeConfigInterface;

class BestsellerSetCategoryProducts
{
    public function __construct(
        private readonly Config $config,
        private readonly \Macopedia\Bestseller\Model\BestsellerCategory $bestsellerCategory,
        private readonly SaveCategoryProducts $categoryProducts,
    ) {
    }

    public function processMessage(): void
    {
        if (!$this->config->isBestsellerEnabled()) {
            return;
        }

        if (!$this->bestsellerCategory->bestsellerAttributeHasChanged()) {
            return;
        }

        $this->categoryProducts->saveCategory();
    }
}
