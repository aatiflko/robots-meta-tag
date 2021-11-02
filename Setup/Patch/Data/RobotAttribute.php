<?php

namespace Neo\RobotsMetaTag\Setup\Patch\Data;

use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;

class RobotAttribute implements DataPatchInterface {

    /**
     * EAV setup factory
     *
     * @var EavSetupFactory
     */
    private $eavSetupFactory;

    /**
     * ModuleDataSetupInterface
     *
     * @var ModuleDataSetupInterface
     */
    private $moduleDataSetup;

    /**
     * Init
     *
     * @param EavSetupFactory $eavSetupFactory
     */
    public function __construct(ModuleDataSetupInterface $moduleDataSetup, EavSetupFactory $eavSetupFactory) {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->eavSetupFactory = $eavSetupFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function apply() {
        $eavSetup = $this->eavSetupFactory->create(['setup' => $this->moduleDataSetup]);
        /* @var EavSetup $eavSetup /

          /**
         * Add attributes to the eav/attribute
         */
        $eavSetup->addAttribute(
                \Magento\Catalog\Model\Product::ENTITY, 'pro_search_engine_robots',
                [
                    'type' => 'varchar',
                    'group' => 'Search Engine Optimization',
                    'backend' => '',
                    'frontend' => '',
                    'label' => 'Search Engine Robots',
                    'input' => 'select',
                    'class' => '',
                    'source' => 'Neo\RobotsMetaTag\Model\Config\Source\ProductMetaOptions',
                    'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                    'visible' => true,
                    'required' => false,
                    'user_defined' => false,
                    'default' => 0,
                    'searchable' => false,
                    'filterable' => false,
                    'comparable' => false,
                    'visible_on_front' => false,
                    'used_in_product_listing' => true,
                    'unique' => false
                ]
        );

        /**
         * Add attributes to the eav/attribute
         */
        $eavSetup->addAttribute(
                \Magento\Catalog\Model\Category::ENTITY,
                'cat_search_engine_robots',
                [
                    'type' => 'varchar',
                    'group' => 'Search Engine Optimization',
                    'label' => 'Search Engine Robots',
                    'input' => 'select',
                    'sort_order' => 100,
                    'source' => 'Neo\RobotsMetaTag\Model\Config\Source\CategoryMetaOptions',
                    'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                    'visible' => true,
                    'required' => false,
                    'user_defined' => false,
                    'default' => null,
                    'backend' => ''
                ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public static function getDependencies() {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function getAliases() {
        return [];
    }

}
