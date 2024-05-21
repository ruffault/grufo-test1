<?php

namespace MoneticoDemoWebKit;



use MoneticoDemoWebKit\Examples\Response\BasicPaymentResponseExample;
use MoneticoDemoWebKit\Examples\Response\PaymentResponseExample;
use MoneticoDemoWebKit\Examples\Response\SplitPaymentFirstInstalmentResponseExample;
use MoneticoDemoWebKit\Monetico\HmacComputer;

/**
 *  This is the page allowing you to test the example of response interface implementation provided.
 *  @see ResponseInterface to see how the response interface itself can be implemented
 */
class PaymentResponseDemo
{
    /**
     * @var []
     */
    private $responseInterfaceParameters;

    /**
     * @var PaymentResponseExample
     */
    private $showExample;

    /**
     * @var array
     */
    private $examples;

    function __construct()
    {
        $this->setExamples([
            "basic" => new BasicPaymentResponseExample(),
            "split_payment_first_instalment" => new SplitPaymentFirstInstalmentResponseExample()
        ]);

        $exampleId = $_GET["example"] ?? null;

        if ($exampleId != null && array_key_exists($exampleId, $this->getExamples())) {
            $this->setShowExample($this->getExamples()[$exampleId]);
        } else {
            $this->setShowExample(current($this->getExamples()));
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $formFields = $_POST;
            // Recalculate the seal
            unset($formFields['MAC']);
            $formFields["MAC"] = (new HmacComputer())->sealFields($formFields, CLE_MAC);
            $this->setResponseInterfaceParameters($formFields);

        } else {
            $this->setResponseInterfaceParameters($this->getShowExample()->getResponseParameters());
        }
    }

    /**
     * @return mixed
     */
    public function getResponseInterfaceParameters()
    {
        return $this->responseInterfaceParameters;
    }

    /**
     * @param mixed $responseInterfaceParameters
     */
    public function setResponseInterfaceParameters($responseInterfaceParameters): void
    {
        $this->responseInterfaceParameters = $responseInterfaceParameters;
    }

    /**
     * @return \MoneticoDemoWebKit\Examples\Response\PaymentResponseExample
     */
    public function getShowExample(): \MoneticoDemoWebKit\Examples\Response\PaymentResponseExample
    {
        return $this->showExample;
    }

    /**
     * @param \MoneticoDemoWebKit\Examples\Response\PaymentResponseExample $showExample
     */
    public function setShowExample(\MoneticoDemoWebKit\Examples\Response\PaymentResponseExample $showExample): void
    {
        $this->showExample = $showExample;
    }

    /**
     * @return array
     */
    public function getExamples(): array
    {
        return $this->examples;
    }

    /**
     * @param array $examples
     */
    public function setExamples(array $examples): void
    {
        $this->examples = $examples;
    }
}