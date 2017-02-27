ING PSP-Magento Extension for iDEAL, Banktransfer, Creditcard, Rembours and Bancontact
====================

# Readme #

ING PSP extension for Magento compatible with: 1.5, 1.6, 1.6.1, 1.6.2.0, 1.7, 1.8 (tested for 1.8.1.0). 
This extension installs 5 payment methods; iDEAL, Banktransfer, Creditcard, Rembours and Bancontact

## Configuration

Afterwards go to System > Configuration > Payment Methods and configure the Settings.

At ING PSP Portal set the webhook URL to: https://www.example.com/ingpsp/ideal/webhook or https://www.example.com/index.php/ingpsp/ideal/webhook. You should be able to visit the webhook URL. (you will get an error, but if you get a 404 the URL is wrong, the page should be found)

## ToDo
+ Create refunds automatically when creating a creditmemo