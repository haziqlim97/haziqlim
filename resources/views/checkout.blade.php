
<div class="container justify-content-center">
    <button id="pay-button">
        Payment
    </button>
</div>

<script src="https://js.stripe.com/v3/"></script>

<script>
// window.onload=function(){
//   document.getElementById("pay-button").click();
// };

var stripe = Stripe('pk_test_65wAWRCaupNlIbKuGoOxE1hQ00WP11fkr1');

const payButton = document.getElementById('pay-button');
const sessionId = '{!! $session->id !!}';
payButton.addEventListener('click', async (e) => {
    stripe.redirectToCheckout({
        sessionId: sessionId
    });
});
</script>

