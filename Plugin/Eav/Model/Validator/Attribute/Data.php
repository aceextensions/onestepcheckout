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

namespace Aceextensions\OneStepCheckout\Plugin\Eav\Model\Validator\Attribute;

use Magento\Eav\Model\AttributeDataFactory;
use Aceextensions\OneStepCheckout\Helper\Data as HelperData;

class Data extends \Magento\Eav\Model\Validator\Attribute\Data
{
    /**
     * @var HelperData
     */
    protected $dataHelper;

    /**
     * Data constructor.
     * @param AttributeDataFactory $attrDataFactory
     * @param HelperData $dataHelper
     */
    public function __construct(
        AttributeDataFactory $attrDataFactory,
        HelperData           $dataHelper
    )
    {
        parent::__construct($attrDataFactory);
        $this->dataHelper = $dataHelper;
    }

    /**
     * @param \Magento\Eav\Model\Validator\Attribute\Data $subject
     * @param bool $result
     * @return bool
     */
    public function afterIsValid(\Magento\Eav\Model\Validator\Attribute\Data $subject, $result)
    {
        if ($this->dataHelper->isFlagMethodRegister()) {
            $subject->_messages = [];

            return count($subject->_messages) == 0;
        }

        return $result;
    }
}
