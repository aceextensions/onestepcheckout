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

namespace Aceextensions\OneStepCheckout\Api\Data;


interface FeeInterface
{
    const ENTITY_ID = 'id';
    const QUOTE_ID = 'quote_id';
    const ORDER_ID = 'order_id';
    const BASE_AMOUNT = 'base_amount';
    const AMOUNT = 'amount';

    /**
     * @return int|null
     */
    public function getId();

    /**
     * @return int|null
     */
    public function getOrderId();

    /**
     * @return int|null
     */
    public function getQuoteId();

    /**
     * @return int
     */
    public function getAmount();

    /**
     * @return int
     */
    public function getBaseAmount();

    /**
     * @param int $id
     * @return \Aceextensions\OneStepCheckout\Api\Data\FeeInterface
     */
    public function setOrderId($id);

    /**
     * @param int $amount
     * @return \Aceextensions\OneStepCheckout\Api\Data\FeeInterface
     */
    public function setAmount($amount);

    /**
     * @param int $id
     * @return \Aceextensions\OneStepCheckout\Api\Data\FeeInterface
     */
    public function setQuoteId($id);

    /**
     * @param int $amount
     * @return \Aceextensions\OneStepCheckout\Api\Data\FeeInterface
     */
    public function setBaseAmount($amount);
}
