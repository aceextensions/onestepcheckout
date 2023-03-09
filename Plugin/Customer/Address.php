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

namespace Aceextensions\OneStepCheckout\Plugin\Customer;

use Magento\Customer\Api\Data\AddressInterface;

class Address
{
    /**
     * @param \Magento\Customer\Model\Address $subject
     * @param \Closure $proceed
     * @param \Magento\Customer\Api\Data\AddressInterface $address
     * @return mixed
     */
    public function aroundUpdateData(\Magento\Customer\Model\Address $subject, \Closure $proceed, AddressInterface $address)
    {
        $object = $proceed($address);

        $addressData = $address->__toArray();
        if (isset($addressData['should_ignore_validation'])) {
            $object->setShouldIgnoreValidation($addressData['should_ignore_validation']);
        }

        return $object;
    }
}
