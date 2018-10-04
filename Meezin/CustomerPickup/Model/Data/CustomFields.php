<?php
/**
 * @package   Bodak\CheckoutCustomForm
 * @author    Slawomir Bodak <slawek.bodak@gmail.com>
 * @copyright © 2017 Slawomir Bodak
 * @license   See LICENSE file for license details.
 */

declare(strict_types=1);

namespace Meezin\CustomerPickup\Model\Data;

use Magento\Framework\Api\AbstractExtensibleObject;
use Meezin\CustomerPickup\Api\Data\CustomFieldsInterface;

/**
 * Class CustomFields
 *
 * @category Model/Data
 * @package  Bodak\CheckoutCustomForm\Model\Data
 */
class CustomFields extends AbstractExtensibleObject implements CustomFieldsInterface
{
    /**
     * Get checkout buyer name
     *
     * @return string|null
     */
    public function getPickupStore()
    {
        return $this->_get(self::PICKUP_STORE);
    }

    /**
     * Get checkout buyer email
     *
     * @return string|null
     */
    public function getPickupDate()
    {
        return $this->_get(self::PICKUP_DATE);
    }

    /**
     * Get checkout purchase order number
     *
     * @return string|null
     */
    public function getPickupComment()
    {
        return $this->_get(self::PICKUP_COMMENT);
    }



    /**
     * Set checkout buyer name
     *
     * @param string|null $checkoutBuyerName Buyer name
     *
     * @return CustomFieldsInterface
     */
    public function setPickupStore(string $pickupStore = null)
    {
        return $this->setData(self::PICKUP_STORE, $pickupStore);
    }

    /**
     * Set checkout buyer email
     *
     * @param string|null $checkoutBuyerEmail Buyer email
     *
     * @return CustomFieldsInterface
     */
    public function setPickupDate(string $pickupDate = null)
    {
        return $this->setData(self::PICKUP_DATE, $pickupDate);
    }

    /**
     * Set checkout purchase order number
     *
     * @param string|null $checkoutPurchaseOrderNo Purchase order number
     *
     * @return CustomFieldsInterface
     */
    public function setPickupComment(string $pickupComment = null)
    {
        return $this->setData(self::PICKUP_COMMENT, $pickupComment);
    }

}
