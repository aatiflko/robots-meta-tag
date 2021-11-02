<?php

namespace Neo\RobotsMetaTag\Plugin\RobotsTag;

use Magento\Catalog\Controller\Category\View;
use Magento\Framework\View\Page\Config as PageConfig;
use Magento\Framework\View\Result\Page;
use Magento\Framework\Registry;
use Neo\RobotsMetaTag\Helper\Data as NeoHelper;

/**
 * Class Category
 *
 * @package   Neo\RobotsMetaTag\Plugin\RobotsTag
 * @author    Neosoft Technologies
 * @copyright 2021 Neosoft Technologies
 */
class Category {

    /**
     * Page config
     *
     * @var PageConfig $pageConfig
     */
    protected $pageConfig;

    /**
     * Registry
     *
     * @var Registry $registry
     */
    protected $registry;

    /**
     * Neo Helper
     * @var NeoHelper $neoHelper
     */
    protected $neoHelper;

    /**
     * Category constructor.
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
        /** @var ModelCategory $category */
        $category = $this->registry->registry('current_category');
        if ($category) {
            $robotsTag = $this->neoHelper->getCategoryRobotsMeta($category);
            $this->pageConfig->setMetadata('robots', $robotsTag);
        }

        return $page;
    }

}

