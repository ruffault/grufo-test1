<?php
require 'autoload.php';

use MoneticoDemoWebKit\PaymentResponseDemo;

$paymentResponseDemo = new PaymentResponseDemo();

?>
<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title></title>
    <link type="text/css" rel="stylesheet" href="styles.css"/>

    <script type="text/javascript">
        function updateIFrame() {
            var inputFields = document.getElementById("form1").getElementsByTagName("input");
            str = "";

            for (var i = 0; i < inputFields.length; i++) {
                var input = inputFields[i];

                if (input.type !== "submit") {
                    str += input.name + "=" + input.value + "&";
                }
            }
            str = str.substring(0, str.length - 1);
            str = encodeURI(str);

            document.getElementById("parametersSent").value = str;
            document.getElementById("cgi2Result").src = "ResponseInterface.php?" + str;
        }
    </script>
</head>
<body>
<div style="margin: 1em;">
    <a href="PaymentRequestDemo.php">Go to payment request examples</a>
</div>
<div class="menu">
    Examples :
    <ul>
        <?php foreach ($paymentResponseDemo->getExamples() as $key => $value): ?>
            <li><a href="?example=<?php echo $key ?>"><?php echo $value->getName() ?></a></li>
        <?php endforeach; ?>
    </ul>
</div>

<h1><?php echo htmlentities($paymentResponseDemo->getShowExample()->getName()) ?></h1>
<p><?php echo htmlentities($paymentResponseDemo->getShowExample()->getDescription()) ?></p>

<div class="column" style="width: 50%">
    <form id="form1" method="post">
        <h2>Parameters sent by the Monetico platform to your response interface :</h2>
        <p>Validate the form below as is to simulate a call from the Monetico system to your response interface with
            correct parameters.<br/>
            You can also change the value of any parameter below to trigger the case where the seal cannot be validated.
        </p>
        <table>
            <?php foreach ($paymentResponseDemo->getResponseInterfaceParameters() as $key => $value): ?>
                <tr>
                    <th>
                        <label for="<%= item.Key %>"><?php echo $key ?></label>
                    </th>
                    <td>
                        <input type="text" name="<?php echo $key ?>" value="<?php echo $value ?>" style="width: 25em;"/>
                        <?php if ($key == "MAC"): ?>
                            <input type="submit" value="Recalculate the seal"/>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>

        <div style="margin: 2em; text-align:center;">
            <a class="button mainbutton" href="javascript: updateIFrame()">Simulate call to the response interface</a>
        </div>
    </form>
</div>
<div class="column">
    <h2>Result of the call to the &quot;response&quot; interface :</h2>
    <?php
    $queryString = implode(
        '&',
        array_map(
            function ($v, $k) {
                return sprintf("%s=%s", $k, $v);
            },
            $paymentResponseDemo->getResponseInterfaceParameters(),
            array_keys($paymentResponseDemo->getResponseInterfaceParameters())
        )
    );
    ?>
    <div>
        <p>Parameters received from the Monetico server :</p>
        <textarea id="parametersSent" readonly="readonly"
                  style="width: 80%; height: 10em"><?php echo $queryString; ?></textarea>
    </div>
    <div>
        <p>Response :</p>
        <iframe id="cgi2Result" src="ResponseInterface.php?<?php echo $queryString; ?>" style="width: 80%; height: 10em">
        </iframe>
    </div>
</div>
</body>
</html>
