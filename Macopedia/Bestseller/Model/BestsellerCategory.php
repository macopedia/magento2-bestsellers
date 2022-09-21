<?php

declare(strict_types=1);

namespace Macopedia\Bestseller\Model;

use Magento\Catalog\Api\CategoryRepositoryInterface;
use Magento\Catalog\Model\Category;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory as ProductCollectionFactory;

class BestsellerCategory
{
    public function __construct(
        private readonly ProductCollectionFactory $productCollectionFactory,
        private readonly Config $config,
        private readonly CategoryRepositoryInterface $categoryRepository,
    ) {
    }

    public function bestsellerAttributeHasChanged(): bool
    {
        $bestsellerCategoryId = $this->config->getBestsellerCategoryPath();

        /** @var Category $category */
        $category = $this->categoryRepository->get($bestsellerCategoryId);

        $bestsellerCategoryProducts = $category->getProductCollection()->getAllIds();

        $bestsellerAttributeProducts = $this->productCollectionFactory->create()
            ->addAttributeToFilter($this->config->getBestsellerAttributePath(), 1)
            ->getAllIds();

        return $bestsellerCategoryProducts !== $bestsellerAttributeProducts;
    }
}
