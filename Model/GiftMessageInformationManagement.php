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

use Aceextensions\OneStepCheckout\Api\GiftMessageInformationManagementInterface;

class GiftMessageInformationManagement implements GiftMessageInformationManagementInterface
{
    /**
     * @var \Magento\GiftMessage\Api\CartRepositoryInterface
     */
    protected $cartRepository;
    /**
     * @var \Magento\GiftMessage\Api\ItemRepositoryInterface
     */
    protected $itemRepository;
    /**
     * @var \Magento\GiftMessage\Model\MessageFactory
     */
    protected $messageFactory;

    public function __construct(
        \Magento\GiftMessage\Api\CartRepositoryInterface $cartRepository,
        \Magento\GiftMessage\Api\ItemRepositoryInterface $itemRepository,
        \Magento\GiftMessage\Model\MessageFactory        $messageFactory
    )
    {
        $this->cartRepository = $cartRepository;
        $this->itemRepository = $itemRepository;
        $this->messageFactory = $messageFactory;
    }

    public function update($cartId, $giftMessage)
    {
        foreach ($giftMessage as $messageData) {

            /** @var \Magento\GiftMessage\Model\Message $message */
            $message = $this->messageFactory->create();

            $message->setData([
                'message' => $messageData['message'],
                'sender' => $messageData['sender'],
                'recipient' => $messageData['recipient'],
            ]);

            if ($messageData['item_id'] == \Aceextensions\OneStepCheckout\Model\Gift\Messages::QUOTE_MESSAGE_INDEX) {
                $this->cartRepository->save($cartId, $message);
            } else {
                $this->itemRepository->save($cartId, $message, $messageData['item_id']);
            }
        }

        return true;
    }
}
