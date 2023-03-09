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
        'uiComponent',
        'Aceextensions_OneStepCheckout/js/model/one-step-checkout-data'
    ],
    function (ko, Component, OneStepCheckoutData) {
        "use strict";

        var cacheKey = 'is_subscribed';

        return Component.extend({
            defaults: {
                template: 'Aceextensions_OneStepCheckout/summary/newsletter'
            },
            initObservable: function () {
                this._super()
                    .observe({
                        isRegisterNewsletter: (typeof OneStepCheckoutData.getData(cacheKey) === 'undefined') ? window.checkoutConfig.mageConfig.newsletterDefault : OneStepCheckoutData.getData(cacheKey)
                    });
                OneStepCheckoutData.setData(cacheKey, this.isRegisterNewsletter());
                this.isRegisterNewsletter.subscribe(function (newValue) {
                    OneStepCheckoutData.setData(cacheKey, newValue);
                });

                return this;
            }
        });
    }
);
