<?php

/**
 *   ╲          ╱
 * ╭──────────────╮  COPYRIGHT (C) 2016 GINGER PAYMENTS B.V.
 * │╭──╮      ╭──╮│
 * ││//│      │//││
 * │╰──╯      ╰──╯│
 * ╰──────────────╯
 *   ╭──────────╮    The MIT License (MIT)
 *   │ () () () │
 *
 * @category    ING
 * @package     ING_PSP
 * @author      Ginger Payments B.V. (info@gingerpayments.com)
 * @version     v1.1.2
 * @copyright   COPYRIGHT (C) 2016 GINGER PAYMENTS B.V. (https://www.gingerpayments.com)
 * @license     The MIT License (MIT)
 *
 **/
class ING_PSP_Model_Creditcard extends Mage_Payment_Model_Method_Abstract
{
    /**
     * @var ING_PSP_Helper_Creditcard
     */
    protected $_creditCard;

    protected $_code                    = 'ingpsp_creditcard';
    protected $_paymentMethod           = 'CreditCard';
    protected $_isGateway               = true;
    protected $_canAuthorize            = true;
    protected $_canUseCheckout          = true;
    protected $_canUseInternal          = true;
    protected $_canUseForMultishipping  = false;
    protected $_canRefund               = true;
    protected $_canRefundInvoicePartial = false;
    protected $_canCapture              = false;

    // Payment flags
    const PAYMENT_FLAG_PENDING          = "Payment is pending";
    const PAYMENT_FLAG_COMPLETED        = "Payment is completed";
    const PAYMENT_FLAG_CANCELLED        = "Payment is cancelled";
    const PAYMENT_FLAG_ERROR            = "Payment failed with an error";
    const PAYMENT_FLAG_FRAUD            = "Amounts don't match. Possible fraud";

    /**
     * Build constructor
     */
    public function __construct()
    {
        parent::_construct();
        $this->_creditCard = Mage::helper('ingpsp/creditcard');
    }

    /**
     * @param Mage_Sales_Model_Quote|null $quote
     * @return bool
     */
    public function isAvailable($quote = null)
    {
        if (Mage::getStoreConfig('payment/ingpsp/apikey', $quote ? $quote->getStoreId() : null)) {
            return parent::isAvailable($quote);
        }

        return false;
    }

    /**
     * Get checkout session namespace
     *
     * @return Mage_Checkout_Model_Session
     */
    protected function _getCheckout()
    {
        return Mage::getSingleton('checkout/session');
    }

    /**
     * Get current quote
     *
     * @return Mage_Sales_Model_Quote
     */
    public function getQuote()
    {
        return $this->_getCheckout()->getQuote();
    }

    /**
     * CreditCard is only active if 'EURO' is currency
     *
     * @param string $currencyCode
     * @return bool
     */
    public function canUseForCurrency($currencyCode)
    {
        if ($currencyCode !== "EUR") {
            return false;
        }

        return parent::canUseForCurrency($currencyCode);
    }

    /**
     * Redirects the client on click 'Place Order' to selected CreditCard bank
     *
     * @return string
     */
    public function getOrderPlaceRedirectUrl()
    {
        return Mage::getUrl(
            'ingpsp/creditcard/payment',
            array(
                '_secure' => true,
                '_query' => array(),
            )
        );
    }
}
