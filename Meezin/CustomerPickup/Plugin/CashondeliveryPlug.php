<?php
    namespace Meezin\CustomerPickup\Plugin;
    use Magento\Payment\Model\Method\AbstractMethod;
    use Magento\Quote\Model\Quote;
    class CashondeliveryPlug
    {

      /**
       * @var \Magento\Checkout\Model\Session
       */
       protected $_checkoutSession;

      /**
       * Constructor
       *
       * @param \Magento\Checkout\Model\Session $checkoutSession
       */
        public function __construct
        (
            \Psr\Log\LoggerInterface $logger,
            \Magento\Checkout\Model\Session $checkoutSession
         ) {
            $this->logger = $logger;
            $this->_checkoutSession = $checkoutSession;
            return;
        }

        public function aroundIsAvailable(\Magento\Payment\Model\Method\AbstractMethod $subject, callable $proceed)
        {
            $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
            $cart = $objectManager->get('Magento\Checkout\Model\Cart');
            $shippingMethod = $cart->getQuote()->getShippingAddress()->getShippingMethod();
            #$this->logger->debug($shippingMethod);
            if ($shippingMethod == 'flatrate_flatrate') {
                return false;
            }
            $result = $proceed();
            return $result;
          }
    }