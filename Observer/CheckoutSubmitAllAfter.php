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

use Magento\Framework\Event\ObserverInterface;
use Magento\Checkout\Model\Session;

class CheckoutSubmitAllAfter implements ObserverInterface
{
    /**
     * @var \Magento\Sales\Model\Order\Status\HistoryFactory
     */
    protected $historyFactory;

    /**
     * @var \Magento\Sales\Model\OrderFactory
     */
    protected $orderFactory;

    /**
     * @var \Magento\Framework\Json\Helper\Data
     */
    protected $_jsonHelper;

    /**
     * @var \Magento\Framework\Filter\FilterManager
     */
    protected $_filterManager;
    /**
     * @var \Magento\Checkout\Model\Session
     */
    protected $checkoutSession;

    public function __construct(
        \Magento\Framework\Json\Helper\Data              $jsonHelper,
        \Magento\Framework\Filter\FilterManager          $filterManager,
        \Magento\Sales\Model\Order\Status\HistoryFactory $historyFactory,
        \Magento\Sales\Model\OrderFactory                $orderFactory,
        Session                                          $checkoutSession
    )
    {
        $this->_jsonHelper = $jsonHelper;
        $this->_filterManager = $filterManager;
        $this->historyFactory = $historyFactory;
        $this->orderFactory = $orderFactory;
        $this->checkoutSession = $checkoutSession;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $oscData = $this->checkoutSession->getData();
        $comment = '';
        $data = $this->checkoutSession->getData();
        if (!empty($data['order_comment'])) {
            $comment = $data['order_comment'];
        }
        $orderId = $observer->getOrder()->getId();
        if ($orderId && (!empty($comment))) {
            $order = $observer->getOrder();
            if ($order->getEntityId()) {
                $status = $order->getStatus();
                $history = $this->historyFactory->create();
                $history->setComment($comment);
                $history->setParentId($orderId);
                $history->setIsVisibleOnFront(1);
                $history->setIsCustomerNotified(0);
                $history->setEntityName('order');
                $history->setStatus($status);
                $history->save();
            }
        }

    }
}
