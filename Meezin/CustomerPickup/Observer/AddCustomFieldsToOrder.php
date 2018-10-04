<?php
/**
 * @package   Bodak\CheckoutCustomForm
 * @author    Slawomir Bodak <slawek.bodak@gmail.com>
 * @copyright © 2017 Slawomir Bodak
 * @license   See LICENSE file for license details.
 */

declare(strict_types=1);

namespace Meezin\CustomerPickup\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;
use Meezin\CustomerPickup\Api\Data\CustomFieldsInterface;

/**
 * Class AddCustomFieldsToOrder
 *
 * @category Observer
 * @package  Bodak\CheckoutCustomForm\Observer
 */
class AddCustomFieldsToOrder implements ObserverInterface
{
    /**
     * Execute observer method.
     *
     * @param Observer $observer Observer
     *
     * @return void
     */
    public function execute(Observer $observer)
    {
        $order = $observer->getEvent()->getOrder();
        $quote = $observer->getEvent()->getQuote();

        $order->setData(
            CustomFieldsInterface::PICKUP_STORE,
            $quote->getData(CustomFieldsInterface::PICKUP_STORE)
        );
        $order->setData(
            CustomFieldsInterface::PICKUP_DATE,
            $quote->getData(CustomFieldsInterface::PICKUP_DATE)
        );
        $order->setData(
            CustomFieldsInterface::PICKUP_COMMENT,
            $quote->getData(CustomFieldsInterface::PICKUP_COMMENT)
        );
    }
}
