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

class ING_PSP_Block_Payment_Ideal_Form extends Mage_Payment_Block_Form
{
    /**
     * Sets iDEAL template into the checkout page
     */
    public function _construct()
    {
        parent::_construct();
        $this->setTemplate('ing_psp/form/ideal.phtml');
    }
}
