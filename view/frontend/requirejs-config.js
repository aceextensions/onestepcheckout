var config = {};
if (window.location.href.indexOf('onestepcheckout') !== -1) {
    config = {
        map: {
            '*':
                {
                    'Magento_Checkout/js/model/shipping-rate-service': 'Aceextensions_OneStepCheckout/js/model/shipping/shipping-rate-service',
                    'Magento_Checkout/js/model/shipping-rates-validator': 'Aceextensions_OneStepCheckout/js/model/shipping/shipping-rates-validator',
                    'Magento_CheckoutAgreements/js/model/agreements-assigner': 'Aceextensions_OneStepCheckout/js/model/agreement/agreements-assigner'
                },
            'Aceextensions_OneStepCheckout/js/model/shipping/shipping-rates-validator': {
                'Magento_Checkout/js/model/shipping-rates-validator': 'Magento_Checkout/js/model/shipping-rates-validator'
            },
            'Magento_Checkout/js/model/shipping-save-processor/default': {
                'Magento_Checkout/js/model/full-screen-loader': 'Aceextensions_OneStepCheckout/js/model/one-step-checkout-loader'
            },
            'Magento_Checkout/js/action/set-billing-address': {
                'Magento_Checkout/js/model/full-screen-loader': 'Aceextensions_OneStepCheckout/js/model/one-step-checkout-loader'
            },
            'Magento_SalesRule/js/action/set-coupon-code': {
                'Magento_Checkout/js/model/full-screen-loader': 'Aceextensions_OneStepCheckout/js/model/onestepcheckout-loader/discount'
            },
            'Magento_SalesRule/js/action/cancel-coupon': {
                'Magento_Checkout/js/model/full-screen-loader': 'Aceextensions_OneStepCheckout/js/model/onestepcheckout-loader/discount'
            },
            'Aceextensions_OneStepCheckout/js/model/one-step-checkout-loader': {
                'Magento_Checkout/js/model/full-screen-loader': 'Magento_Checkout/js/model/full-screen-loader'
            },

        },
        config: {
            mixins: {
                'Magento_Braintree/js/view/payment/method-renderer/paypal': {
                    'Aceextensions_OneStepCheckout/js/view/payment/braintree-paypal-mixins': true
                },
                'Magento_Checkout/js/action/place-order': {
                    'Aceextensions_OneStepCheckout/js/action/place-order-mixins': true
                },
                'Magento_Paypal/js/action/set-payment-method': {
                    'Aceextensions_OneStepCheckout/js/model/set-payment-method-mixin': true
                }
            }
        }
    };

    if (window.location.href.indexOf('#') !== -1) {
        window.history.pushState("", document.title, window.location.pathname);
    }
}
