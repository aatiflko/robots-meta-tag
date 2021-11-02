<?php

namespace Neo\RobotsMetaTag\Plugin\RobotsTag;

use Magento\Catalog\Controller\Product\View;
use Magento\Framework\Registry;
use Magento\Framework\View\Page\Config as PageConfig;
use Magento\Framework\View\Result\Page;
use Neo\RobotsMetaTag\Helper\Data as NeoHelper;

/**
 * Class Product
 *
 * @package   Neo\RobotsMetaTag\Plugin\RobotsTag
 * @author    Neosoft Technologies
 * @copyright 2021 Neosoft Technologies
 */
class Product {

    /**
     * Page config
     *
     * @var PageConfig $pageConfig
     */
    protected $pageConfig;

    /**
     *Neo Helper
     * @var NeoHelper $neoHelper
     */
    protected $neoHelper;

    /**
     * Registry
     *
     * @var Registry $registry
     */
    protected $registry;

    /**
     * Product constructor.
     *
     * @param PageConfig       $pageConfig
     * @param MetaRobotsConfig $metaRobotsConfig
     * @param Registry         $registry
     */
    public function __construct(
            NeoHelper $neoHelper,
            PageConfig $pageConfig,
            Registry $registry
    ) {
        $this->neoHelper = $neoHelper;
        $this->pageConfig = $pageConfig;
        $this->registry = $registry;
    }

    /**
     * Execute
     *
     * @param View $subject
     * @param Page $page
     *
     * @return mixed
     */
    public function afterExecute(View $subject, $page) {
        /** @var ModelProduct $product */
        $product = $this->registry->registry('current_product');
        if ($product) {
            $robotsTag = $this->neoHelper->getProductRobotsMeta($product);
            $this->pageConfig->setMetadata('robots', $robotsTag);
        }

        return $page;
    }

}
