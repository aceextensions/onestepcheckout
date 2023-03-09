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

namespace Aceextensions\OneStepCheckout\Plugin\Authorization;

use Magento\Authorization\Model\UserContextInterface;
use Magento\Checkout\Model\Session;
use Aceextensions\OneStepCheckout\Helper\Data;

class UserContext
{
    /**
     * @var Data
     */
    protected $dataHelper;

    /**
     * @var Session
     */
    protected $_checkoutSession;

    /**
     * UserContext constructor.
     * @param Data $dataHelper
     * @param Session $checkoutSession
     */
    public function __construct(
        Data    $dataHelper,
        Session $checkoutSession
    )
    {
        $this->dataHelper = $dataHelper;
        $this->_checkoutSession = $checkoutSession;
    }

    /**
     * @param UserContextInterface $userContext
     * @param $result
     * @return int
     */
    public function afterGetUserType(UserContextInterface $userContext, $result)
    {
        if ($this->dataHelper->isFlagMethodRegister()) {
            return UserContextInterface::USER_TYPE_CUSTOMER;
        }

        return $result;
    }

    /**
     * @param UserContextInterface $userContext
     * @param $result
     * @return int
     */
    public function afterGetUserId(UserContextInterface $userContext, $result)
    {
        if ($this->dataHelper->isFlagMethodRegister()) {
            return $this->_checkoutSession->getQuote()->getCustomerId();
        }

        return $result;
    }
}
