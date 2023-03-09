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
    'Magento_Ui/js/form/element/abstract',
    'Aceextensions_OneStepCheckout/js/model/address/google-auto-complete'
], function (Component, googleAutoComplete) {
    'use strict';

    return Component.extend({

        googleAutocomplete: null,

        /**
         * Invokes initialize method of parent class,
         * contains initialization logic
         */
        initialize: function () {
            this._super()
                .initAutocomplete();

            return this;
        },

        initAutocomplete: function () {
            var fieldsetName = this.parentName.split('.').slice(0, -1).join('.');

            switch (window.checkoutConfig.mageConfig.autocomplete.type) {
                case 'google':
                    this.googleAutocomplete = new googleAutoComplete(this.uid, fieldsetName);
                    break;
                case 'pca':
                    break;
                default :
                    break;
            }

            return this;
        }
    });
});
