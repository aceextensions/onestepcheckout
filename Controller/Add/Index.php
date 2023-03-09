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

namespace Aceextensions\OneStepCheckout\Controller\Add;

class Index extends \Magento\Checkout\Controller\Cart\Add
{
    /**
     * @return $this|\Magento\Framework\Controller\Result\Redirect
     * @throws \Magento\Framework\Exception\LocalizedException
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function execute()
    {
        $productId = $this->getRequest()->getParam('id') ? $this->getRequest()->getParam('id') : 11;
        $storeId = $this->_objectManager->get('Magento\Store\Model\StoreManagerInterface')->getStore()->getId();
        $product = $this->productRepository->getById($productId, false, $storeId);

        $this->cart->addProduct($product, []);
        $this->cart->save();

        return $this->goBack($this->_url->getUrl('onestepcheckout'));
    }
}
