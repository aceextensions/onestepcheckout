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
        'ko',
        'jquery',
        'Magento_Checkout/js/view/payment',
        'Magento_Checkout/js/model/quote',
        'Magento_Checkout/js/model/step-navigator',
        'Magento_Checkout/js/model/payment/additional-validators',
        'Aceextensions_OneStepCheckout/js/model/checkout-data-resolver',
        'Aceextensions_OneStepCheckout/js/model/payment-service',
        'mage/translate'
    ],
    function (ko,
              $,
              Component,
              quote,
              stepNavigator,
              additionalValidators,
              DataResolver,
              PaymentService) {
        'use strict';

        DataResolver.resolveDefaultPaymentMethod();

        return Component.extend({
            defaults: {
                template: 'Aceextensions_OneStepCheckout/payment'
            },
            isLoading: PaymentService.isLoading,
            errorValidationMessage: ko.observable(false),

            initialize: function () {
                var self = this;

                this._super();

                stepNavigator.steps.removeAll();

                additionalValidators.registerValidator(this);

                quote.paymentMethod.subscribe(function () {
                    self.errorValidationMessage(false);
                });

                return this;
            },

            validate: function () {
                if (!quote.paymentMethod()) {
                    this.errorValidationMessage($.mage.__('Please specify a payment method.'));

                    return false;
                }

                return true;
            }
        });
    }
);
