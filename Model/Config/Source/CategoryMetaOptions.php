<?php
namespace Neo\RobotsMetaTag\Model\Config\Source;

/**
 * Class CategoryMetaOptions
 *
 * @package   Neo\RobotsMetaTag\Model\Config\Source
 * @author    Neosoft Technologies
 * @copyright 2021 Neosoft Technologies
 */

class CategoryMetaOptions extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource {

    /**
     * Return category meta options.
     *
     * @return array
     */
    public function getAllOptions() {
        $this->_options = [
            ['label' => __('NOINDEX, NOFOLLOW'), 'value' => 'NOINDEX, NOFOLLOW'],
            ['label' => __('NOINDEX, FOLLOW'), 'value' => 'NOINDEX, FOLLOW'],
            ['label' => __('INDEX, NOFOLLOW'), 'value' => 'INDEX, NOFOLLOW'],
            ['label' => __('INDEX, FOLLOW'), 'value' => 'INDEX, FOLLOW'],
        ];

        return $this->_options;
    }

}

