/**
 * Aceextensions_OneStepCheckout
 *
 * @category    Checkout
 * @package     Aceextensions_OneStepCheckout
 * @author      Durga Shankar Gupta
 * @copyright   DreamWorkFactory (https://dreamworkfactory.com/)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
define(
    [
        'Magento_Checkout/js/model/shipping-save-processor',
        'Aceextensions_OneStepCheckout/js/model/checkout'
    ],
    function (shippingSaveProcessor, Processor) {
        'use strict';

        shippingSaveProcessor.registerProcessor('onestepcheckout', Processor);

        return function () {
            return shippingSaveProcessor.saveShippingInformation('onestepcheckout');
        }
    }
);
