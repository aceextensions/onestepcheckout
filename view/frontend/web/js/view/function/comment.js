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

        var cacheKey = 'deliveryComment';

        return Component.extend({
            defaults: {
                template: 'Aceextensions_OneStepCheckout/review/comment'
            },
            commentValue: ko.observable(),
            initialize: function () {
                this._super();

                this.commentValue(OneStepCheckoutData.getData(cacheKey));

                this.commentValue.subscribe(function (newValue) {
                    OneStepCheckoutData.setData(cacheKey, newValue);
                });

                return this;
            }
        });
    }
);
