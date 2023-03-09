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

namespace Aceextensions\OneStepCheckout\Plugin\Customer;

use Magento\Checkout\Model\Session;
use Magento\Customer\Api\Data\CustomerInterface;
use Magento\Customer\Model\AccountManagement as AM;

class AccountManagement
{
    /**
     * @var Session
     */
    protected $checkoutSession;

    /**
     * AccountManagement constructor.
     * @param Session $checkoutSession
     */
    public function __construct(Session $checkoutSession)
    {
        $this->checkoutSession = $checkoutSession;
    }

    /**
     * @param AM $subject
     * @param mixed $password
     * @param mixed $redirectUrl
     * @return mixed
     */
    public function beforeCreateAccount(AM $subject, CustomerInterface $customer, $password = null, $redirectUrl = '')
    {
        $data = $this->checkoutSession->getData();
        if (isset($data['register']) && $data['register'] && isset($data['password']) && $data['password']) {
            $password = $data['password'];
            return [$customer, $password, $redirectUrl];
        }
    }
}
