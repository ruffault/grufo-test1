<?php

namespace MoneticoDemoWebKit\Examples;

use MoneticoDemoWebKit\Monetico\Collections\Currency;
use MoneticoDemoWebKit\Monetico\Collections\Language;
use MoneticoDemoWebKit\Monetico\Request\OrderContext;
use MoneticoDemoWebKit\Monetico\Request\OrderContextBilling;
use MoneticoDemoWebKit\Monetico\Request\OrderContextClient;
use MoneticoDemoWebKit\Monetico\Request\OrderContextShipping;
use MoneticoDemoWebKit\Monetico\Request\OrderContextShoppingCart;
use MoneticoDemoWebKit\Monetico\Request\OrderContextShoppingCartItem;
use MoneticoDemoWebKit\Monetico\Request\PaymentRequest;

/**
 *  Example of a payment request with a complete order context
 */
class FullOrderContextExample implements IPaymentRequestExample
{

    /**
     * @var PaymentRequest
     */
    private $paymentRequest;

    public function __construct()
    {
        // Do NOT generate reference like this in production
        // since different clients could have the same reference if they try to pay at the same second
        $generatedReference = uniqid("ref");
        $billing = new OrderContextBilling("18 rue de l'adresse", "Paris", "75000", "FR");
        $billing->setPhone("+33-123456789"); // see technical documentation for correct formatting
        $billing->setCivility("Mr");
        $billing->setFirstName("John");
        $billing->setLastName("Doe");
        $billing->setName("John Doe");
        $billing->setAddress("18 rue de l'adresse 75000 Paris");
        $billing->setCountrySubdivision("FR-75");
        $billing->setEmail("john.doe@unknown.com");

        $client = new OrderContextClient();
        $client->setCivility("Mr");
        $client->setFirstName("John");
        $client->setLastName("Doe");
        $client->setName("John Doe");
        $client->setAddress("18 rue de l'adresse 75000 Paris");
        $client->setAddressLine1("18 rue de l'adresse");
        $client->setCity("Paris");
        $client->setPostalCode("75000");
        $client->setCountry("FR");
        $client->setCountrySubdivision("FR-75");
        $client->setEmail("john.doe@unknown.com");
        $client->setPhone("+33-123456789"); // see technical documentation for correct formatting
        $client->setAccountAge(new \DateTime('2015-11-28'));
        $client->setAddCardNbLast24Hours(0);
        $client->setAuthenticationMethod("own_credentials");
        $client->setBirthCity("Paris");
        $client->setBirthCountry("FR");
        $client->setBirthCountrySubdivision("FR-75");
        $client->setBirthdate(new \DateTime('1978-03-27'));
        $client->setBirthPostalCode("75000");
        $client->setLast24HoursTransactions(1);
        $client->setLast6MonthsPurchase(3);
        $client->setLastPasswordChange(new \DateTime('2020-01-18'));
        $client->setLastYearTransactions(8);
        $client->setNationalIDNumber("123456789012345");
        $client->setPaymentMeanAge(new \DateTime('2018-01-01'));
        $client->setPriorAuthenticationMethod("challenge");
        $client->setPriorAuthenticationTimestamp(new \DateTime('-25 minutes'));
        $client->setSuspiciousAccountActivity(false);
        $client->setLastAccountModification(new \DateTime('2020-09-02'));
        $client->setAuthenticationTimestamp((new \DateTime('-5 minutes')));

        $shipping = new OrderContextShipping();
        $shipping->setCivility("Mr");
        $shipping->setFirstName("John");
        $shipping->setLastName("Doe");
        $shipping->setName("John Doe");
        $shipping->setAddress("18 rue de l'adresse 75000 Paris");
        $shipping->setAddressLine1("18 rue de l'adresse");
        $shipping->setCity("Paris");
        $shipping->setPostalCode("75000");
        $shipping->setCountry("FR");
        $shipping->setCountrySubdivision("FR-75");
        $shipping->setEmail("john.doe@unknown.com");
        $shipping->setPhone("+33-123456789"); // see technical documentation for correct formatting
        $shipping->setDeliveryTimeframe("three_day");
        $shipping->setFirstUseDate(new \DateTime('2017-02-23'));
        $shipping->setMatchBillingAddress(true);
        $shipping->setShipIndicator("billing_address");

        $shoppingCartItem = new OrderContextShoppingCartItem();
        $shoppingCartItem->setName("Friteuse");
        $shoppingCartItem->setDescription("Pour faire des frites :)");
        $shoppingCartItem->setProductCode("electronic_good");
        $shoppingCartItem->setProductRisk("normal");
        $shoppingCartItem->setQuantity(1);
        $shoppingCartItem->setUnitPrice(12345);
        $shoppingCartItem->setProductSKU("REF-FRIT-267");
        $shoppingCartItem->setImageURL("http://www.siteweb.ext/image-friteuse.png");

        $shoppingCart = new OrderContextShoppingCart();
        $shoppingCart->setGiftCardAmount(1000);
        $shoppingCart->setGiftCardCount(1);
        $shoppingCart->setGiftCardCurrency("EUR");
        $shoppingCart->setPreOrderDate(new \DateTime("-30 days"));
        $shoppingCart->setPreorderIndicator(true);
        $shoppingCart->setReorderIndicator(false);
        $shoppingCart->setShoppingCartItems([$shoppingCartItem]);

        $context = new OrderContext($billing);
        $context->setOrderContextClient($client);
        $context->setOrderContextShipping($shipping);
        $context->setOrderContextShoppingCart($shoppingCart);

        $paymentRequest = new PaymentRequest($generatedReference, 123.45, Currency::EUR, Language::FR, $context);
        $paymentRequest->setTexteLibre('Do not forget to HTML-encode every field value otherwise characters like " or \' might cause issues');
        /**
         * To set the url_retour_ok and url_retour_err manually, please use these functions
         * $paymentRequest->setUrlRetourOk("https://www.mywebsite.com");
         * $paymentRequest->setUrlRetourErreur();
         */
        $this->setPaymentRequest($paymentRequest);
    }

    public function getDescription()
    {
        return "This example shows an example of payment request with the order context completely filled.";
    }

    public function getName()
    {
        return "Complete order context example";
    }

    /**
     * @return \MoneticoDemoWebKit\Monetico\Request\PaymentRequest
     */
    public function getPaymentRequest(): \MoneticoDemoWebKit\Monetico\Request\PaymentRequest
    {
        return $this->paymentRequest;
    }

    /**
     * @param \MoneticoDemoWebKit\Monetico\Request\PaymentRequest $paymentRequest
     */
    public function setPaymentRequest(\MoneticoDemoWebKit\Monetico\Request\PaymentRequest $paymentRequest): void
    {
        $this->paymentRequest = $paymentRequest;
    }
}