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
        'jquery',
        'Magento_Checkout/js/model/quote',
        'Aceextensions_OneStepCheckout/js/model/resource-url-manager',
        'mage/storage',
        'Magento_Checkout/js/model/error-processor',
        'Magento_Customer/js/model/customer',
        'Magento_Checkout/js/model/payment/method-converter',
        'Magento_Checkout/js/model/payment-service',
        'Magento_Checkout/js/model/shipping-service',
        'Aceextensions_OneStepCheckout/js/model/one-step-checkout-loader'
    ],
    function ($,
              quote,
              resourceUrlManager,
              storage,
              errorProcessor,
              customer,
              methodConverter,
              paymentService,
              shippingService,
              OneStepCheckoutLoader) {
        'use strict';

        return function () {
            OneStepCheckoutLoader.startLoader();

            return storage.post(
                resourceUrlManager.getUrlForUpdatePaymentTotalInformation(quote)
            ).done(
                function (response) {
                    if (response.redirect_url) {
                        window.location.href = response.redirect_url;
                        return;
                    }
                    quote.setTotals(response.totals);
                    paymentService.setPaymentMethods(methodConverter(response.payment_methods));
                }
            ).fail(
                function (response) {
                    errorProcessor.process(response);
                }
            ).always(
                function () {
                    OneStepCheckoutLoader.stopLoader();
                }
            );
        };
    }
);
