/**
 * Aceextensions_OneStepCheckout
 *
 * @category    Checkout
 * @package     Aceextensions_OneStepCheckout
 * @author      Durga Shankar Gupta
 * @copyright   DreamWorkFactory (https://dreamworkfactory.com/)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

define([
    'ko',
    'Magento_Customer/js/model/address-list'
], function (ko, addressList) {
    'use strict';

    return function (address) {
        addressList().some(function (currentAddress, index, addresses) {
            if (currentAddress.getKey() === address.getKey()) {
                addressList.replace(currentAddress, address);
            }
        });

        addressList.valueHasMutated();

        return address;
    };
});
