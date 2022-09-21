<?php

namespace Macopedia\Bestseller\Publisher;

use Magento\Framework\MessageQueue\PublisherInterface;

class SetBestsellerCategory
{
    const TOPIC_NAME = "macopedia.bestseller.set.category.products";

    public function __construct(private readonly PublisherInterface $publisher)
    {
    }

    public function publish(): void
    {
        $this->publisher->publish(self::TOPIC_NAME, '');
    }
}
