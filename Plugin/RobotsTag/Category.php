<?php

namespace Neo\RobotsMetaTag\Plugin\RobotsTag;

use Magento\Catalog\Controller\Category\View;
use Magento\Framework\View\Page\Config as PageConfig;
use Magento\Framework\View\Result\Page;
use Magento\Framework\Registry;

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
     * Category constructor.
     *
     * @param PageConfig       $pageConfig
     */
    public function __construct(
            PageConfig $pageConfig,
            Registry $registry
    ) {
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
