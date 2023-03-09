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
        'Magento_Checkout/js/model/quote',
        'Magento_Checkout/js/model/shipping-rate-processor/new-address',
        'Magento_Checkout/js/model/shipping-rate-processor/customer-address'
    ],
    function (quote, defaultProcessor, customerAddressProcessor) {
        'use strict';

        var processors = [];

        processors.default = defaultProcessor;
        processors['customer-address'] = customerAddressProcessor;

        return {
            isAddressChange: false,
            registerProcessor: function (type, processor) {
                processors[type] = processor;
            },
            estimateShippingMethod: function () {
                var type = quote.shippingAddress().getType();

                if (processors[type]) {
                    processors[type].getRates(quote.shippingAddress());
                } else {
                    processors.default.getRates(quote.shippingAddress());
                }
            }
        }
    }
);
