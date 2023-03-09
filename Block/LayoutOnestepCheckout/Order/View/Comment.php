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

namespace Aceextensions\OneStepCheckout\Block\LayoutOnestepCheckout\Order\View;

use Magento\Framework\Registry;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;

class Comment extends Template
{
    /**
     * @type Registry|null
     */
    protected $_coreRegistry = null;

    /**
     * @param Context $context
     * @param Registry $registry
     * @param array $data
     */
    public function __construct(
        Context  $context,
        Registry $registry,
        array    $data = []
    ) {
        $this->_coreRegistry = $registry;

        parent::__construct($context, $data);
    }

    /**
     * @return string
     */
    public function getOrderComment()
    {
        if ($order = $this->getOrder()) {
            return $order->getOnestepcheckoutOrderComment();
        }
        return '';
    }

    /**
     * @return mixed
     */
    public function getOrder()
    {
        return $this->_coreRegistry->registry('current_order');
    }

    /**
     * @return string
     */
    public function getOrderDateTime()
    {
        if ($order = $this->getOrder()) {
            return $order->getOnestepcheckoutDeliveryTime();
        }
        return '';
    }
}
