<?php

declare(strict_types=1);

namespace Macopedia\Bestseller\Cron;

use Macopedia\Bestseller\Model\Config;
use Macopedia\Bestseller\Model\SaveCategoryProducts;

class Bestseller
{

    public function __construct(
        private readonly Config $config,
        private readonly SaveCategoryProducts $categoryProducts,
    ) {
    }

    public function execute(): void
    {
        if (!$this->config->isBestsellerEnabled()) {
            return;
        }

        $this->categoryProducts->saveCategory();
    }
}
