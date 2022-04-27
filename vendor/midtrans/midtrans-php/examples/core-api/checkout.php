<?php

namespace Midtrans;

require_once dirname(__FILE__) . '/../../Midtrans.php';

// YOUR CLIENT KEY
// can find in Merchant Portal -> Settings -> Access keys
Config::$clientKey = "<your client key>";

if (strpos(Config::$clientKey, 'your ') != false ) {
    echo "<p style='background: #FFB588; padding: 10px;'>";
    echo "Please set your client key in file " . __FILE__;
    echo "</p>";
}
?>
<html>

<head>
    <title>Checkout</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/featherlight/1.7.12/featherlight.min.css">
</head>

<body>
    <script id="midtrans-script" type="text/javascript" src="https://api.midtrans.com/v2/assets/js/midtrans-new-3ds.min.js" data-environment="sandbox" data-client-key="VT-client-0N5ngRfFPbOhBa7k"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/featherlight/1.7.12/featherlight.min.js"></script>

    <h1>Checkout</h1>
    <form action="checkout-process.php" method="POST" id="payment-form">
        <fieldset>
            <legend>Checkout</legend>
            <small><strong>Field that may be presented to customer:</strong></small>
            <p>
                <label>Card Number</label>
                <input class="card-number" value="4811 1111 1111 1114" size="23" type="text" autocomplete="off" />
            </p>
            <p>
                <label>Expiration (MM/YYYY)</label>
                <input class="card-expiry-month" value="12" placeholder="MM" size="2" type="text" />
                <span> / </span>
                <input class="card-expiry-year" value="2020" placeholder="YYYY" size="4" type="text" />
            </p>
            <p>
                <label>CVV</label>
                <input class="card-cvv" value="123" size="4" type="password" autocomplete="off" />
            </p>
            <p>
                <label>Save credit card</label>
                <input type="checkbox" name="save_cc" value="true">
            </p>

            <small><strong>Fields that shouldn't be presented to the customer:</strong></small>
            <p>
                <label>3D Secure</label>
                <input type="checkbox" name="secure" value="true" checked>
            </p>

            <input id="token_id" name="token_id" type="hidden" />
            <button class="submit-button" type="submit">Submit Payment</button>
        </fieldset>
    </form>

    <code>
        <pre>
        <b>Testing cards:</b>

        <b>For 3D Secure:</b>
        Visa        4811 1111 1111 1114
        MasterCard  5211 1111 1111 1117

        <b>For Non 3D Secure:</b>
        Visa success      4011 1111 1111 1112
        Visa challenge    4111 1111 1111 1111
        Visa deny by FDS  4211 1111 1111 1110

        MasterCard success      5481 1611 1111 1081
        MasterCard challenge    5110 1111 1111 1119
        MasterCard deny by FDS  5210 1111 1111 1118

        </pre>
    </code>

    <!-- Javascript for token generation -->
    <script type="text/javascript">
        $(function () {
            // Sandbox URL
            MidtransNew3ds.url = "https://api.sandbox.midtrans.com/v2/token";
            // TODO: Change with your client key.
            MidtransNew3ds.clientKey = "<?php echo Config::$clientKey ?>";

            var card = {
                "card_number": $(".card-number").val(),
                "card_exp_month": $(".card-expiry-month").val(),
                "card_exp_year": $(".card-expiry-year").val(),
                "card_cvv": $(".card-cvv").val(),
                "secure": $('[name=secure]')[0].checked,
                // "bank": "bni", // optional acquiring bank
                "gross_amount": 200000
            };

            var options = {
                performAuthentication: function(redirect_url){
                    openDialog(redirect_url);
                },
                onSuccess: function(response){
                    console.log('sukses');
                    console.log('response:',response);
                    closeDialog();
                    // Submit form
                    $("#token_id").val(response.token_id);
                    $("#payment-form").submit();
                },
                onFailure: function(response){
                    console.log('gagal');
                    console.log('response:',response);
                    closeDialog();
                    alert(response.status_message);
                    $('button').removeAttr("disabled");
                },
                onPending: function(response){
                    console.log('pending');
                    console.log('response:',response);
                    closeDialog();
                }
            };

            // callback functions
            var callback = {
                onSuccess: function(response){
                    // Success to get card token_id, implement as you wish here
                    console.log('Success to get card token_id, response:', response);
                    MidtransNew3ds.authenticate(response.redirect_url, options);
                },
                onFailure: function(response){
                    // Fail to get card token_id, implement as you wish here
                    console.log('Fail to get card token_id, response:', response);
                    closeDialog();
                    $('button').removeAttr("disabled");
                }
            };

            function openDialog(url) {
                $.featherlight({
                iframe: url, 
                iframeMaxWidth: '80%', 
                iframeWidth: 700, 
                iframeHeight: 500,
                closeOnClick: false,
                closeOnEsc: false,
                closeIcon:''
                });
            }

            function closeDialog() {
                $.featherlight.close();
            }

            $(".submit-button").click(function (event) {
                console.log("SUBMIT");
                event.preventDefault();
                $(this).attr("disabled", "disabled");
                MidtransNew3ds.getCardToken(card, callback);
                return false;
            });
        });
    </script>
</body>

</html>