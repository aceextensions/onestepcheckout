<?php
/**
 * Aceextensions_OneStepCheckout
 *
 * @category    Checkout
 * @package     Aceextensions_OneStepCheckout
 * @author      Durga Shankar Gupta
 * @copyright   DreamWorkFactory (https://dreamworkfactory.com/)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

namespace Aceextensions\OneStepCheckout\Model\System\Config\Source;

use Magento\Framework\Model\AbstractModel;

class DeliveryTime extends AbstractModel
{
    const DAY_MONTH_YEAR = 'dd/mm/yy';
    const MONTH_DAY_YEAR = 'mm/dd/yy';
    const YEAR_MONTH_DAY = 'yy/mm/dd';

    /**
     * @return array
     */
    public function toOptionArray()
    {
        $options = [
            [
                'label' => __('Day/Month/Year'),
                'value' => self::DAY_MONTH_YEAR
            ],
            [
                'label' => __('Month/Day/Year'),
                'value' => self::MONTH_DAY_YEAR
            ],
            [
                'label' => __('Year/Month/Day'),
                'value' => self::YEAR_MONTH_DAY
            ]
        ];

        return $options;
    }
}
