<?php
require 'autoload.php';

use MoneticoDemoWebKit\PaymentRequestDemo;
use MoneticoDemoWebKit\Monetico\HmacComputer;

$paymentRequestDemo = new PaymentRequestDemo();
?>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title></title>
    <link type="text/css" rel="stylesheet" href="styles.css"/>
</head>
<body>
<div style="margin: 1em;">
    <a href="PaymentResponseDemo.php">Go to response interface examples</a>
</div>
<div class="menu">
    Examples :
    <ul>
        <?php foreach ($paymentRequestDemo->getExamples() as $key => $value): ?>
            <li><a href="?example=<?php echo $key ?>"><?php echo $value->getName() ?></a></li>
        <?php endforeach; ?>
    </ul>
</div>

<div class="section">
    <h1><?php echo htmlentities($paymentRequestDemo->getShowExample()->getName()) ?></h1>
    <p>
        <?php echo htmlentities($paymentRequestDemo->getShowExample()->getDescription()) ?>
    </p>
</div>

<div class="section">
    <h2>HTML Form used to reach the payment page</h2>
    <p>
        The HTML form <strong>must only contain</strong> fields that are expected by the Monetico payment system.<br/>
        Please keep in mind the following points :
    </p>
    <ul>
        <li>Do <strong>not</strong> send additional or unexpected fields that are not defined in the Monetico technical
            documentation.
        </li>
        <li><strong>Always</strong> HTML-encode the form field values</li>
    </ul>
    <div class="code">
        &lt;form method=&quot;post&quot; action=&quot;<?php echo PAYMENT_PAGE_URL ?>&quot;&gt;<br/>
        <?php foreach ($paymentRequestDemo->getShowExample()->getPaymentRequest()->getFormFields() as $key => $value): ?>
            <div class="formLine">
                &lt;input type=&quot;hidden&quot; name=&quot;<?php echo $key ?>&quot;
                value=&quot;<?php echo htmlentities($value) ?>&quot; /&gt;
            </div>
        <?php endforeach; ?>
        <div class="formLine">
            &lt;input type=&quot;submit&quot; value=&quot;Try it !&quot; /&gt;<br/>
        </div>
        &lt;/form&gt;
    </div>

    <!-- Real form implementation -->
    <div id="paymentForm">
        <form method="post" action="<?php echo PAYMENT_PAGE_URL ?>">
            <?php foreach ($paymentRequestDemo->getShowExample()->getPaymentRequest()->getFormFields() as $key => $value): ?>
                <input type="hidden" name="<?php echo $key ?>" value="<?php echo htmlentities($value) ?>"/>
            <?php endforeach; ?>
            <input type="submit" class="mainbutton" style="margin-left: 1em;" value="Try it"/>
        </form>
    </div>
</div>

<div class="section">
    <h3>&quot;contexte_commande&quot; field</h3>
    <p>The &quot;contexte_commande&quot; field is a base 64 UTF-8 encoded value of the following JSON data :</p>
    <code>
        <pre><?php echo htmlentities(json_encode($paymentRequestDemo->getShowExample()->getPaymentRequest()->getContexteCommande())) ?></pre>
    </code>
    <a href="javascript: togglePrettyPrintContextCommande()">Toggle pretty printed version</a>
    <div id="contexte_commande_pretty_printed_block" style="display: none;">
        <h4>Pretty printed version :</h4>
        <code>
            <pre id="contexte_commande_json"></pre>
        </code>
    </div>
    <script type="text/javascript">
        function togglePrettyPrintContextCommande() {
            if (document.getElementById("contexte_commande_pretty_printed_block").style.display === "none") {
                var str = "<?php echo addslashes(json_encode($paymentRequestDemo->getShowExample()->getPaymentRequest()->getContexteCommande())) ?>"
                var prettyJson = JSON.stringify(JSON.parse(str), undefined, 2)
                document.getElementById("contexte_commande_json").innerHTML = prettyJson;
                document.getElementById("contexte_commande_pretty_printed_block").style.display = "block"
            } else {
                document.getElementById("contexte_commande_pretty_printed_block").style.display = "none";
            }
        }
    </script>
    <p><strong>Please refer to technical documentation in order to respect the format of each different field</strong>
    </p>
</div>

<div class="section">
    <h3>&quot;MAC&quot; field</h3>
    <p>
        MAC field value is an hexadecimal encoding of the result of sealing the following string with HMAC SHA-1 algorithm
        and you secret key :
    </p>
    <code>
        <pre><?php echo (new HmacComputer())->getStringToSeal($paymentRequestDemo->getShowExample()->getPaymentRequest()->getFormFieldsWithoutMac()) ?></pre>
    </code>
    <p>
        The string is composed of all the fields sent by the form (except the "MAC" field itself).<br/>
        If you do not send optional parameters, they must not be included inside the sealing string.<br/>
        To generate the string used for sealing, you have to :
    </p>
    <ul>
        <li>Separate each fields with a <strong>*</strong> character</li>
        <li>Order fields alphabetically (based on ASCII character values)</li>
        <li>Represent each field with format fieldKey=fieldValue (do not apply HTML encoding to field value when
            sealing)
        </li>
    </ul>
</div>
</body>
</html>
