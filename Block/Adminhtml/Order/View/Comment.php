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

namespace Aceextensions\OneStepCheckout\Block\Adminhtml\Order\View;

use Magento\Framework\Registry;
use Magento\Sales\Model\Order;

class Comment extends \Magento\Backend\Block\Template
{
    protected $order;

    public function __construct(
        \Magento\Sales\Model\Order              $order,
        \Magento\Backend\Block\Template\Context $context,
        array                                   $data = []
    ) {

        $this->order = $order;
        parent::__construct($context, $data);
    }

    /**
     * get Order comment
     */
    public function getOrderComment()
    {
        $order_id = $this->getRequest()->getParam('order_id');
        $order = $this->order->load($order_id)->getOnestepcheckoutOrderComment();
        return $order;
    }

    /**
     * get Order Date Time
     */
    public function getOrderDateTime()
    {
        $order_id = $this->getRequest()->getParam('order_id');
        $order = $this->order->load($order_id)->getOnestepcheckoutDeliveryTime();
        return $order;
    }
}
