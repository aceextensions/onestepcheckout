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

namespace Aceextensions\OneStepCheckout\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Aceextensions\OneStepCheckout\Model\CheckoutRegister;

class PaypalExpressPlaceOrder implements ObserverInterface
{
    /**
     * @var \Aceextensions\OneStepCheckout\Model\CheckoutRegister
     */
    protected $checkoutRegister;

    /**
     * PaypalExpressPlaceOrder constructor.
     * @param \Aceextensions\OneStepCheckout\Model\CheckoutRegister $checkoutRegister
     */
    public function __construct(CheckoutRegister $checkoutRegister)
    {
        $this->checkoutRegister = $checkoutRegister;
    }

    /**
     * @param \Magento\Framework\Event\Observer $observer
     * @return void
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function execute(Observer $observer)
    {
        $this->checkoutRegister->checkRegisterNewCustomer();
    }
}
