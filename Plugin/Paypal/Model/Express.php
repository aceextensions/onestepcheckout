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

namespace Aceextensions\OneStepCheckout\Plugin\Paypal\Model;

use Magento\Quote\Api\Data\PaymentInterface;

class Express
{
    /**
     * @param \Magento\Paypal\Model\Express $express
     * @param \Magento\Framework\DataObject $data
     * @return array
     */
    public function beforeAssignData(\Magento\Paypal\Model\Express $express, \Magento\Framework\DataObject $data)
    {
        $additionalData = $data->getData(PaymentInterface::KEY_ADDITIONAL_DATA);
        if (is_array($additionalData) && isset($additionalData['extension_attributes'])) {
            unset($additionalData['extension_attributes']);
            $data->setData(PaymentInterface::KEY_ADDITIONAL_DATA, $additionalData);
        }

        return [$data];
    }
}
