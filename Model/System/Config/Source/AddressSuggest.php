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

class AddressSuggest
{
    /**
     * @return array
     */
    public function getTriggerOption()
    {
        return [
            '' => __('No'),
            'google' => __('Google'),
        ];
    }

    /**
     * @return array
     */
    public function toOptionArray()
    {
        $options = [];
        foreach ($this->getTriggerOption() as $code => $label) {
            $options[] = [
                'value' => $code,
                'label' => $label
            ];
        }

        return $options;
    }
}
