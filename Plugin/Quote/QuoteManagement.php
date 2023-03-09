<?php
/**
 * Aceextensions_OneStepCheckout
 *
 * @category    Checkout
 * @package     Aceextensions_OneStepCheckout
 * @author      Durga Shankar Gupta
 * @copyright   DreamWorkFactory (https://dreamworkfactory.com/)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

namespace Aceextensions\OneStepCheckout\Plugin\Quote;

use Magento\Quote\Model\Quote as QuoteEntity;

class QuoteManagement
{
    /**
     * @var \Aceextensions\OneStepCheckout\Model\CheckoutRegister
     */
    protected $checkoutRegister;

    /**
     * QuoteManagement constructor.
     * @param \Aceextensions\OneStepCheckout\Model\CheckoutRegister $checkoutRegister
     */
    public function __construct(\Aceextensions\OneStepCheckout\Model\CheckoutRegister $checkoutRegister)
    {
        $this->checkoutRegister = $checkoutRegister;
    }

    /**
     * @param \Magento\Quote\Model\QuoteManagement $subject
     * @param QuoteEntity $quote
     * @param array $orderData
     * @return array
     */
    public function beforeSubmit(\Magento\Quote\Model\QuoteManagement $subject, QuoteEntity $quote, $orderData = [])
    {
        $this->checkoutRegister->checkRegisterNewCustomer();

        return [$quote, $orderData];
    }
}
