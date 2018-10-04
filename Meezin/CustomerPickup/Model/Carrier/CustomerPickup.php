<?php

 
namespace Meezin\CustomerPickup\Model\Carrier;
 
use Magento\Quote\Model\Quote\Address\RateRequest;
use Magento\Shipping\Model\Rate\Result;
 
class CustomerPickup
    extends \Magento\Shipping\Model\Carrier\AbstractCarrier
    implements \Magento\Shipping\Model\Carrier\CarrierInterface
{
    /**
     * Constant defining shipping code for method
     */
    const SHIPPING_CODE = 'customerpickup';
 
    /**
     * @var string
     */
    protected $_code = self::SHIPPING_CODE;
 
    /**
     * @var \Magento\Shipping\Model\Rate\ResultFactory
     */
    protected $rateResultFactory;
 
    /**
     * @var \Magento\Quote\Model\Quote\Address\RateResult\MethodFactory
     */
    protected $rateMethodFactory;
 
    /**
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
     * @param \Magento\Quote\Model\Quote\Address\RateResult\ErrorFactory $rateErrorFactory
     * @param \Psr\Log\LoggerInterface $logger
     * @param \Magento\Shipping\Model\Rate\ResultFactory $rateResultFactory
     * @param \Magento\Quote\Model\Quote\Address\RateResult\MethodFactory $rateMethodFactory
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Quote\Model\Quote\Address\RateResult\ErrorFactory $rateErrorFactory,
        \Psr\Log\LoggerInterface $logger,
        \Magento\Shipping\Model\Rate\ResultFactory $rateResultFactory,
        \Magento\Quote\Model\Quote\Address\RateResult\MethodFactory $rateMethodFactory,
        array $data = []
    ) {
        $this->rateResultFactory = $rateResultFactory;
        $this->rateMethodFactory = $rateMethodFactory;
        parent::__construct($scopeConfig, $rateErrorFactory, $logger, $data);
    }
 
    /**
     * @return array
     */
    public function getAllowedMethods()
    {
        return [self::SHIPPING_CODE => $this->getConfigData('name')];
    }
 
    /**
     * @param RateRequest $request
     * @return bool|Result
     */
    public function collectRates(RateRequest $request)
    {
        if (!$this->getActiveFlag()) {
            // This shipping method is disabled in the configuration
            return false;
        }
        
        // Check whether order is eligible for customer pickup
            // Add logic here to determine if this order is eligible for this shipping method
            // e.g. Is the entire order in stock? Does the customer have a local address?
    
        // If the order is not eligible, return false
        // Otherwise, continue to build and return $result which includes our shipping method's details
 
        /** @var \Magento\Shipping\Model\Rate\Result $result */
        $result = $this->rateResultFactory->create();
 
        /** @var \Magento\Quote\Model\Quote\Address\RateResult\Method $method */
        $method = $this->rateMethodFactory->create();
 
        $method->setCarrier(self::SHIPPING_CODE);
        // Get the title from the configuration, as defined in system.xml
        $method->setCarrierTitle($this->getConfigData('title'));
 
        $method->setMethod(self::SHIPPING_CODE);
        // Get the title from the configuration, as defined in system.xml
        $method->setMethodTitle($this->getConfigData('name'));
 
        // Get the price from the configuration, as defined in system.xml
        $amount = $this->getConfigData('price');
 
        $method->setPrice($amount);
        $method->setCost($amount);
 
        $result->append($method);
 
        return $result;
    }
}