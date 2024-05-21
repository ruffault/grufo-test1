<?php

namespace MoneticoDemoWebKit;

use MoneticoDemoWebKit\Monetico\HmacComputer;

class ResponseInterface
{
    /**
     * This is an example of response interface implementation.
     * It is displayed inside the iframe of the response example page.
     */
    function __construct()
    {
        // Fields can be provided by both GET or POST method. This is due to the fact that the
        // Monetico system uses the POST method. If the response interface returns an error, a mail is sent with
        // a link to the response interface with all payments parameters. Clicking this link will trigger a GET request
        // to the response interface.
        // Therefore, you must be capable to handle a response interface request being it sent through GET or POST method.
        $receivedData = $_SERVER['REQUEST_METHOD'] === 'GET' ? $_GET : $_POST;
        if (array_key_exists("MAC", $receivedData)) {
            $receivedSeal = $receivedData['MAC'];
            unset($receivedData['MAC']); // removes the MAC field itself

            $isSealValidated = (new HmacComputer())->validateSeal($receivedData, CLE_MAC, $receivedSeal);
            if ($isSealValidated) {
                // The seal has been validated so you can do any business treatment here.
                // Take care of the "code-retour" field which contains "payetest" for payments that have been done
                // in the sandbox environment and are, therefore, not real payments.
                //
                // Remember that the response interface can be called multiple times for the same payment.
                // This can happen for example if the customer tries to pay with a bank card that is refused and then
                // tries a second time with a valid one. Your response interface would then receive a first notification
                // indicating that the payment has been refused and a second one later indicating that it has been accepted.
                //
                // Please refer to the technical documentation for a complete description of all provided parameters.

                // Example :
                $codeRetour = $receivedData["code-retour"];
                $isSandboxPayment = $codeRetour === "payetest";
                $isPaymentValidated = substr($codeRetour, 0, strlen("paiement")) === "paiement";

                // Split payment only
                $instalmentNumber = 1;
                if (strpos(strtolower($codeRetour), "_pf")) {
                    $instalmentNumber = substr($codeRetour, strpos($codeRetour, '_pf') + 3);
                }

                if ($isPaymentValidated && !$isSandboxPayment) {
                    // Proceed to delivery
                }
            }
            $this->respondWithSealValidationResult($isSealValidated);
        } else {
            throw new \InvalidArgumentException("Unable to verify the sealing since received data did not contain MAC field.");
        }
    }

    private function respondWithSealValidationResult(bool $isSealValidated)
    {
        header("Content-Type: text/plain");
        echo "version=2\ncdr=";
        echo $isSealValidated ? "0" : "1";
    }
}