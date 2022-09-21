<?php

namespace Macopedia\Bestseller\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;

class Config
{
    const BESTSELLER_ATTRIBUTE_PATH = 'macopedia_bestseller/mappings/bestseller_attribute';
    const BESTSELLER_CATEGORY_PATH = 'macopedia_bestseller/mappings/bestseller_category';
    const BESTSELLER_ENABLED_PATH = 'macopedia_bestseller/general/enabled';

    public function __construct(private readonly ScopeConfigInterface $scopeConfig)
    {
    }

    public function getBestsellerAttributePath(): string
    {
        return $this->scopeConfig->getValue(self::BESTSELLER_ATTRIBUTE_PATH);
    }

    public function getBestsellerCategoryPath(): string
    {
        return $this->scopeConfig->getValue(self::BESTSELLER_CATEGORY_PATH);
    }

    public function getBestsellerEnabledPath(): string
    {
        return $this->scopeConfig->getValue(self::BESTSELLER_ENABLED_PATH);
    }

    public function isBestsellerEnabled(): bool
    {
        return $this->scopeConfig->isSetFlag(self::BESTSELLER_ENABLED_PATH);
    }
}
