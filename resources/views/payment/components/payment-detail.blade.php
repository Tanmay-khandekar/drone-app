<div class="modal" id="payment-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Payment Information</h5>
                <button type="button" class="close close-payment-form" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <form 
            role="form" 
            action="{{ route('stripe.post') }}" 
            method="post" 
            class="require-validation"
            data-cc-on-file="false"
            data-stripe-publishable-key="{{ env('STRIPE_KEY', 'pk_test_51MqhFkBYa5wxH4LQMVHMDUZJqw8p6yJZLqmmEqjrC5Yyua4MK9WhFHja7bKBDYp1ykEQQvYyiIsA4jnfWIQTSHl200x2DAzqFz') }}"
            id="payment-form">
            @csrf
                <div class="modal-body">
                    <input type="hidden" name="customer_id" value="{{ $job['user_id'] }}">
                    <input type="hidden" name="pilot_id" id="pilot_id" value="">
                    <input type="hidden" name="bid_id" id="bid_id" value="">
                    <input type="text" name="price" value="500">
                    <div class='form-row row'>
                        <div class='col-lg-12 form-group required'>
                            <label class='control-label'>Name on Card</label> 
                            <input class='form-control' size='4' type='text'>
                        </div>
                    </div>

                    <div class='form-row row'>
                        <div class='col-lg-12 form-group required'>
                            <label class='control-label'>Card Number</label> 
                            <input autocomplete='off' class='form-control card-number' size='20' type='text'>
                        </div>
                    </div>

                    <div class='form-row row'>
                        <div class='col-xs-12 col-md-4 form-group cvc required'>
                            <label class='control-label'>CVC</label>
                            <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='text'>
                        </div>
                        <div class='col-xs-12 col-md-4 form-group expiration required'>
                            <label class='control-label'>Expiration Month</label>
                            <input class='form-control card-expiry-month' placeholder='MM' size='2' type='text'>
                        </div>
                        <div class='col-xs-12 col-md-4 form-group expiration required'>
                            <label class='control-label'>Expiration Year</label> <input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text'>
                        </div>
                    </div>

                    <div class='form-row row'>
                        <div class='col-md-12 error form-group d-none'>
                            <div class='alert-danger alert'>Please correct the errors and try again.</div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close-payment-form" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit">Pay Now</button>
                </div>
            </form>
        </div>
    </div>
</div>