<?php
/**
 * Checkout custom fields interface
 *
 * @package   Bodak\CheckoutCustomForm
 * @author    Slawomir Bodak <slawek.bodak@gmail.com>
 * @copyright © 2017 Slawomir Bodak
 * @license   See LICENSE file for license details.
 */

declare(strict_types=1);

namespace Meezin\CustomerPickup\Api\Data;

/**
 * Interface CustomFieldsInterface
 *
 * @category Api/Data/Interface
 * @package  Bodak\CheckoutCustomForm\Api\Data
 */
interface CustomFieldsInterface
{
    const PICKUP_STORE = 'pickup_store';
    const PICKUP_DATE = 'pickup_date';
    const PICKUP_COMMENT = 'pickup_comment';


    /**
     * Get pickup store
     *
     * @return string|null
     */
    public function getPickupStore();

    /**
     * Get pickup date
     *
     * @return string|null
     */
    
    public function getPickupDate();
    
    /**
     * Get pickup commnet
     *
     * @return string|null
     */
    public function getPickupComment();


 

    /**
     * Set checkout buyer email
     *
     * @param string|null $checkoutBuyerEmail Buyer email
     *
     * @return CustomFieldsInterface
     */
    public function setPickupStore(string $pickupStore = null);

    /**
     * Set checkout purchase order number
     *
     * @param string|null $checkoutPurchaseOrderNo Purchase order number
     *
     * @return CustomFieldsInterface
     */
    public function setPickupDate(string $pickupDate = null);

    /**
     * Set checkout goods mark
     *
     * @param string|null $checkoutGoodsMark Goods mark
     *
     * @return CustomFieldsInterface
     */
    public function setPickupComment(string $pickupComment = null);


}
