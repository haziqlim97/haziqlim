<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

</head>
<body>
        <input id="card-holder-name" type="text">


        <!-- Stripe Elements Placeholder -->
        <div id="card-element"></div>
        
        <button id="card-button">
            Process Payment
        </button>

        <button id="pay-button">
         Payment
        </button>

</body>
</html>

<script src="https://js.stripe.com/v3/"></script>

<script>
window.onload=function(){
  document.getElementById("pay-button").click();
};

var stripe = Stripe('pk_test_65wAWRCaupNlIbKuGoOxE1hQ00WP11fkr1');

const payButton = document.getElementById('pay-button');
const sessionId = '{!! $session->id !!}';
payButton.addEventListener('click', async (e) => {
    stripe.redirectToCheckout({
        sessionId: sessionId
    });
});
</script>

