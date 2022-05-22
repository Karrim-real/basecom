<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{ asset('assets/js/jquery.js') }}"></script>


    <title>Pay now </title>
</head>
<body>
    <form id="paymentForm" >
        <div class="form-group">
          <label for="email">Email Address</label>
          <input type="email" id="email-address" required />
        </div>
        <div class="form-group">
          <label for="amount">Amount</label>
          <input type="tel" id="amount" required />
        </div>
        <div class="form-group">
          <label for="first-name">First Name</label>
          <input type="text" id="first-name" />
        </div>
        <div class="form-group">
          <label for="last-name">Last Name</label>
          <input type="text" id="last-name" />
        </div>
        <div class="form-submit">
          <button type="submit" onclick="payWithPaystack(event)"> Pay </button>
        </div>
      </form>

      <script src="https://js.paystack.co/v1/inline.js"></script>
<script src="{{ asset('assets/js/addons.js') }}"></script>

      <script>
const paymentForm = document.getElementById('paymentForm');
paymentForm.addEventListener("submit", payWithPaystack, false);
function payWithPaystack(e) {
  e.preventDefault();
  let handler = PaystackPop.setup({
    key: 'pk_test_aad75fe1267330f1c4c3355581891fdf246f4060', // Replace with your public key
    email: document.getElementById("email-address").value,
    amount: document.getElementById("amount").value * 100,
    ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
    // label: "Optional string that replaces customer email"
    onClose: function(){
      alert('Window closed.');
      console.log('You have cance the payment process');
    },
    callback: function(response){
    //   let message = 'Payment complete! Reference: ' + response.reference;
      let reference = response.reference;
    //   console.log(reference);
    $.ajax({
        type: "GET",
        url: "{{URL::to('verify-paymen')}}/".reference,
        // data: reference,
        dataType: json,
        success: function (response) {
            console.log('get to sycc');
            console.log(response);
        }
    });
    }
  });
  handler.openIframe();
}
      </script>

</body>
</html>
