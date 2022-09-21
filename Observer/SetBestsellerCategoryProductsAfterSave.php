<?php

namespace Macopedia\Bestseller\Observer;

use Macopedia\Bestseller\Model\BestsellerCategory;
use Macopedia\Bestseller\Model\Config;
use Macopedia\Bestseller\Publisher\SetBestsellerCategory;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class SetBestsellerCategoryProductsAfterSave implements ObserverInterface
{
    public function __construct(
        private readonly SetBestsellerCategory $bestsellerCategoryPublisher,
        private readonly Config $config,
        private readonly BestsellerCategory $bestsellerCategory,
    ) {
    }

    public function execute(Observer $observer): Observer
    {
        if (!$this->config->isBestsellerEnabled()) {
            return $observer;
        }

        if (!$this->bestsellerCategory->bestsellerAttributeHasChanged()) {
            return $observer;
        }

        $this->bestsellerCategoryPublisher->publish();

        return $observer;
    }
}
