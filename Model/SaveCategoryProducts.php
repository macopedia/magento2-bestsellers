<?php

declare(strict_types=1);

namespace Macopedia\Bestseller\Model;

use Magento\Catalog\Api\CategoryRepositoryInterface;
use Magento\Catalog\Model\Category;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory as ProductCollectionFactory;

class SaveCategoryProducts
{
    public function __construct(
        private readonly ProductCollectionFactory $productCollectionFactory,
        private readonly Config $config,
        private readonly CategoryRepositoryInterface $categoryRepository,
        private readonly BestsellerCategory $bestsellerCategory,
    ) {
    }

    public function saveCategory(): void
    {
        if (!$this->bestsellerCategory->bestsellerAttributeHasChanged()) {
            return;
        }

        $bestsellerAttributeProducts = $this->productCollectionFactory->create()
            ->addAttributeToFilter($this->config->getBestsellerAttributePath(), 1)
            ->getAllIds();

        $bestsellerCategoryId = $this->config->getBestsellerCategoryPath();

        /** @var Category $category */
        $category = $this->categoryRepository->get($bestsellerCategoryId);
        $category->setPostedProducts(array_flip($bestsellerAttributeProducts));
        $category->save();
    }
}
