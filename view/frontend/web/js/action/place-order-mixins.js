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
    'jquery',
    'mage/utils/wrapper',
    'Aceextensions_OneStepCheckout/js/action/set-checkout-information',
], function ($, wrapper, setCheckoutInformationAction) {
    'use strict';

    return function (placeOrderAction) {
        return wrapper.wrap(placeOrderAction, function (originalAction, paymentData, messageContainer) {
            var deferred = $.Deferred();
            if (paymentData && paymentData.method === 'braintree_paypal') {
                setCheckoutInformationAction().done(function () {
                    originalAction(paymentData, messageContainer).done(function (response) {
                        deferred.resolve(response);
                    }).fail(function (response) {
                        deferred.reject(response);
                    })
                }).fail(function (response) {
                    deferred.reject(response);
                })
            } else {
                return originalAction(paymentData, messageContainer).fail(function (response) {
                    if ($('.message-error').length) {
                        $('html, body').scrollTop(
                            $('.message-error:visible:first').closest('div').offset().top - $(window).height() / 2
                        );
                    }
                });
            }

            return deferred;
        });
    };
});
