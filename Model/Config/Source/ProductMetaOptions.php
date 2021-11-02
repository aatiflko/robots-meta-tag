<?php
namespace Neo\RobotsMetaTag\Model\Config\Source;

/**
 * Class ProductMetaOptions
 *
 * @package   Neo\RobotsMetaTag\Model\Config\Source
 * @author    Neosoft Technologies
 * @copyright 2021 Neosoft Technologies
 */

class ProductMetaOptions extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource {

    /**
     * Return product meta options.
     *
     * @return array
     */
    public function getAllOptions() {
        $this->_options = [
            ['label' => __(''), 'value' => ''],
            ['label' => __('NOINDEX, NOFOLLOW'), 'value' => 'NOINDEX, NOFOLLOW'],
            ['label' => __('NOINDEX, FOLLOW'), 'value' => 'NOINDEX, FOLLOW'],
            ['label' => __('INDEX, NOFOLLOW'), 'value' => 'INDEX, NOFOLLOW'],
            ['label' => __('INDEX, FOLLOW'), 'value' => 'INDEX, FOLLOW'],
        ];

        return $this->_options;
    }

}
