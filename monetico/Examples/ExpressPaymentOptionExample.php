<?php

namespace MoneticoDemoWebKit\Examples;

use MoneticoDemoWebKit\Monetico\Collections\Currency;
use MoneticoDemoWebKit\Monetico\Collections\Language;
use MoneticoDemoWebKit\Monetico\Request\OrderContext;
use MoneticoDemoWebKit\Monetico\Request\OrderContextBilling;
use MoneticoDemoWebKit\Monetico\Request\OrderContextClient;
use MoneticoDemoWebKit\Monetico\Request\PaymentRequest;

/**
 *  Example of a payment request using the express payment option to store the card of the customer
 */
class ExpressPaymentOptionExample implements IPaymentRequestExample
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
        $billing->setEmail("john.doe@unknown.com");

        $client = new OrderContextClient();
        $client->setCivility("Mr");
        $client->setFirstName("John");
        $client->setLastName("Doe");
        $client->setEmail("john.doe@unknown.com");
        $client->setPhone("+33-123456789"); // see technical documentation for correct formatting
        $client->setLastAccountModification(new \DateTime('2020-09-02'));
        $client->setAuthenticationTimestamp((new \DateTime('-5 minutes')));

        $context = new OrderContext($billing);
        $context->setOrderContextClient($client);

        $paymentRequest = new PaymentRequest($generatedReference, 123.45, Currency::EUR, Language::FR, $context);
        $paymentRequest->setTexteLibre('Do not forget to HTML-encode every field value otherwise characters like " or \' might cause issues');
        /**
         * To set the url_retour_ok and url_retour_err manually, please use these functions
         * $paymentRequest->setUrlRetourOk("https://www.mywebsite.com");
         * $paymentRequest->setUrlRetourErreur();
         */
        // Express payment specific option
        $paymentRequest->setAliasCb("customeralias");

        $this->setPaymentRequest($paymentRequest);
    }

    public function getDescription()
    {
        return "This example shows how to use the express payment option to store the card. This requires your EPT to have the express payment option.";
    }

    public function getName()
    {
        return "Express payment example (requires Express Payment option on your EPT)";
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