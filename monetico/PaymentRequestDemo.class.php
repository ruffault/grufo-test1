<?php

namespace MoneticoDemoWebKit;

use MoneticoDemoWebKit\Examples\IPaymentRequestExample;
use MoneticoDemoWebKit\Examples\BasicPaymentExample;
use MoneticoDemoWebKit\Examples\Bypass3DSecureChallengePaymentExample;
use MoneticoDemoWebKit\Examples\SplitPaymentExample;
use MoneticoDemoWebKit\Examples\ExpressPaymentOptionExample;
use MoneticoDemoWebKit\Examples\FullOrderContextExample;
use MoneticoDemoWebKit\Examples\Cofidis1EuroDirectRedirectionExample;
use MoneticoDemoWebKit\Examples\CofidisPreFillPaymentExample;

/**
 *  This is the page showing payment requests examples.
 *  See the code of the different example classes to understand how to initialize a new payment request.
 *  You can also look at the class file associated with this page to see how to build the form to call the
 *  Monetico payment page.
 */
class PaymentRequestDemo
{
    /**
     * @var string
     */
    private $moneticoPayementPageUrl = PAYMENT_PAGE_URL;

    /**
     * @var IPaymentRequestExample
     */
    private $showExample;

    /**
     * @var array
     */
    private $examples;

    /**
     * @return string
     */
    public function getMoneticoPayementPageUrl()
    {
        return $this->moneticoPayementPageUrl;
    }

    /**
     * @param string $moneticoPayementPageUrl
     */
    public function setMoneticoPayementPageUrl($moneticoPayementPageUrl)
    {
        $this->moneticoPayementPageUrl = $moneticoPayementPageUrl;
    }

    /**
     * @return \MoneticoDemoWebKit\Examples\IPaymentRequestExample
     */
    public function getShowExample()
    {
        return $this->showExample;
    }

    /**
     * @param \MoneticoDemoWebKit\Examples\IPaymentRequestExample $showExample
     */
    public function setShowExample($showExample)
    {
        $this->showExample = $showExample;
    }

    /**
     * @return array
     */
    public function getExamples()
    {
        return $this->examples;
    }

    /**
     * @param array $examples
     */
    public function setExamples($examples)
    {
        $this->examples = $examples;
    }

    function __construct()
    {
        $this->setExamples([
            "basic" => new BasicPaymentExample(),
            "split" => new SplitPaymentExample(),
            "full_order_context" => new FullOrderContextExample(),
            "bypass_3ds_challenge" => new Bypass3DSecureChallengePaymentExample(),
            "cofidis_prefilling" => new CofidisPreFillPaymentExample(),
            "cofidis_1euro_direct_redirection" => new Cofidis1EuroDirectRedirectionExample(),
            "express_payment" => new ExpressPaymentOptionExample()
        ]);

        $exampleId = $_GET["example"] ?? null;

        if ($exampleId != null && array_key_exists($exampleId, $this->getExamples())) {
            $this->setShowExample($this->getExamples()[$exampleId]);
        } else {
            $this->setShowExample(current($this->getExamples()));
        }
    }
}