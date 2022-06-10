@section('title', 'Login')
@include('frontend.layout.includes.head')
@include('frontend.layout.includes.minicart')
@include('frontend.layout.includes.nav')

<div>
    <button class="button btn btn-primary btn-lg">
    <a class="donate-with-crypto"
       href="https://commerce.coinbase.com/checkout/6da189f179bc31">
      <span>Donate with Crypto</span>
    </a>
</button>
    <script src="https://commerce.coinbase.com/v1/checkout.js">
    </script>
  </div>
