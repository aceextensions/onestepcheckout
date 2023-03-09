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


class ComponentPosition extends AbstractModel
{
    const NOT_SHOW = 0;
    const SHOW_IN_PAYMENT = 1;
    const SHOW_IN_REVIEW = 2;

    /**
     * @return array
     */
    public function toOptionArray()
    {
        return [
            self::NOT_SHOW => __('No'),
            self::SHOW_IN_PAYMENT => __('In Payment Area'),
            self::SHOW_IN_REVIEW => __('In Review Area')
        ];
    }
}
