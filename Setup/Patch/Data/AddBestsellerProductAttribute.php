<?php

declare(strict_types=1);

namespace Macopedia\Bestseller\Setup\Patch\Data;

use Macopedia\Bestseller\Model\Attribute\BestsellerAttribute;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface as DataPatchInterface;

class AddBestsellerProductAttribute implements DataPatchInterface
{
    public function __construct(
        private EavSetupFactory          $eavSetupFactory,
        private ModuleDataSetupInterface $setup
    )
    {
    }


    /**
     * @inheritDoc
     */
    public static function getDependencies(): array
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    public function getAliases(): array
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    public function apply()
    {
        $eavSetup = $this->eavSetupFactory->create(['setup' => $this->setup]);
        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'bestseller',
            [
                'group' => 'Product Details',
                'type' => 'int',
                'backend' => \Magento\Catalog\Model\Product\Attribute\Backend\Boolean::class,
                'frontend' => '',
                'label' => 'Bestseller',
                'input' => 'boolean',
                'class' => '',
                'source' => \Magento\Catalog\Model\Product\Attribute\Source\Boolean::class,
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                'visible' => true,
                'required' => false,
                'user_defined' => true,
                'default' => '',
                'searchable' => false,
                'filterable' => false,
                'comparable' => false,
                'visible_on_front' => true,
                'used_in_product_listing' => true,
                'unique' => false,
                'apply_to' => ''
            ]
        );
    }
}
