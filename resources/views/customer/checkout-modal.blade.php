<div class="modal fade" id="checkoutModal">
<div class="modal-dialog modal-dialog-centered modal-lg">
<div class="modal-content p-4">

<h5>Checkout</h5>

<form method="POST" action="{{ route('checkout') }}">
@csrf

<input class="form-control mb-2" placeholder="Full Name" required>
<input class="form-control mb-2" placeholder="Email" required>
<textarea class="form-control mb-3" placeholder="Delivery Address" required></textarea>

<h6>Payment Method</h6>

<div class="form-check">
  <input class="form-check-input"
         type="radio"
         name="payment_method"
         value="cod"
         checked>
  <label class="form-check-label">
      Cash on Delivery
  </label>
</div>

<div class="form-check">
  <input class="form-check-input"
         type="radio"
         name="payment_method"
         value="online">
  <label class="form-check-label">
      UPI / Card (Demo)
  </label>
</div>

<button class="btn btn-coffee w-100 mt-4">
    Place Order
</button>

</form>
</div>
</div>
</div>
