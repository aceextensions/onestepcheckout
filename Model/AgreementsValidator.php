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

namespace Aceextensions\OneStepCheckout\Model;

use Aceextensions\OneStepCheckout\Helper\Data;

class AgreementsValidator extends \Magento\CheckoutAgreements\Model\AgreementsValidator
{
    /**
     * @var Data
     */
    protected $dataHelper;

    /**
     * AgreementsValidator constructor.
     * @param Data $dataHelper
     * @param null $list
     */
    public function __construct(
        Data $dataHelper,
             $list = null
    )
    {
        parent::__construct($list);
        $this->dataHelper = $dataHelper;
    }

    /**
     * @param array $agreementIds
     * @return bool
     */
    public function isValid($agreementIds = [])
    {
        if (!$this->dataHelper->isEnabledTOC()) {
            return true;
        }

        return parent::isValid($agreementIds);
    }
}
