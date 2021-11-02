<?php
namespace Neo\RobotsMetaTag\Helper;

use Magento\Framework\App\Helper\AbstractHelper;

/**
 * Class Data
 *
 * @package   Neo\RobotsMetaTag\Helper
 * @author    Neosoft Technologies
 * @copyright 2021 Neosoft Technologies
 */

class Data extends AbstractHelper {
    /**
     * @var string IS_CATEGORY_META_OPTIONS
     */
    const IS_CATEGORY_META_OPTIONS = 'robotsmetatag/general/cat_metaoption';
    /**
     * @var string PRODUCT_META_OPTIONS
     */
    const PRODUCT_META_OPTIONS = 'robotsmetatag/general/pro_metaoption';
    /**
     * @var string DEFAULT_PRODUCT_META
     */
    const DEFAULT_PRODUCT_META = 'robotsmetatag/default/pro_metaoption';
    /**
     * @var string DEFAULT_CATEGORY_META
     */
    const DEFAULT_CATEGORY_META = 'robotsmetatag/default/pro_metaoption';
    
    /**
     * Scope Config
     * @var ScopeConfigInterface $scopeConfig 
    */

    protected $scopeConfig;

   /**
    * 
    * @param \Magento\Framework\App\Helper\Context $context
    * @param \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
    */
    public function __construct(
            \Magento\Framework\App\Helper\Context $context,
            \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
    ) {
        $this->scopeConfig = $scopeConfig;
        parent::__construct($context);
    }

    /**
     * * Return robot meta tag value of product
     * @param type $product
     * @return type string
     */
    public function getProductRobotsMeta($product) {
        $robotsTag = '';
        $robotsTag = (string) $product->getProSearchEngineRobots() ? $product->getProSearchEngineRobots() : $this->productConfigMetaOPtions();
        if ($robotsTag != '') {
            return $robotsTag;
        } else {
            return $this->defaultProductRobotMeta();
        }
    }

    /**
     * Return robot meta tag value of category
     * @param type $category
     * @return type string
     */
    public function getCategoryRobotsMeta($category) {
        $robotsTag = '';
        $robotsTag = (string) $category->getCatSearchEngineRobots() ? $category->getCatSearchEngineRobots() : $this->categoryConfigMetaOPtions();
        if ($robotsTag != '') {
            return $robotsTag;
        } else {
            return $this->defaultCategoryRobotMeta();
        }
    }

    /**
     * Return robot meta tag options of product from configuration.
     * @return type string
     */
    public function productConfigMetaOPtions() {
        $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
        return $this->scopeConfig->getValue(self::PRODUCT_META_OPTIONS, $storeScope);
    }

    /**
     * Return robot meta tag options of category from configuration.
     * @return type string
     */
    public function categoryConfigMetaOPtions() {
        $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
        return $this->scopeConfig->getValue(self::IS_CATEGORY_META_OPTIONS, $storeScope);
    }

    /**
     * Return defaul robot meta option of product.
     * @return type string
     */
    public function defaultProductRobotMeta() {
        $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
        return $this->scopeConfig->getValue(self::DEFAULT_PRODUCT_META, $storeScope);
    }

    /**
     * Return defaul robot meta option of category.
     * @return type string
     */
    public function defaultCategoryRobotMeta() {
        $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
        return $this->scopeConfig->getValue(self::DEFAULT_CATEGORY_META, $storeScope);
    }

}
