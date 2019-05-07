@extends('layouts.app_admin')

@section('content')

	<div id="paypal-button-container"></div>

@endsection


@section('js')
	<script src="https://www.paypal.com/sdk/js?client-id=AbQSV_9jkc2Lb8qQMyIWQ8HwV1oK4zla2MZ8Amoy18JSHVp3C7mHpvv-g0mBbBoislwU-4UKxrHCwImK"> </script>
   	<script>

		paypal.Buttons({
	    createOrder: function(data, actions) {
	      return actions.order.create({
	        purchase_units: [{
	          amount: {
	            value: '0.01'
	          }
	        }]
	      });
	    },
	    onApprove: function(data, actions) {
	      return actions.order.capture().then(function(details) {
	        alert('Transaction completed by ' + details.payer.name.given_name);
	        // Call your server to save the transaction
	        return fetch	('/paypal_catch_response', {
	          method: 'post',
	          headers: {
	            'content-type': 'application/json'
	          },
	          body: JSON.stringify({
	            orderID: data.orderID
	          })
	        });
	      });
	    }
	  }).render('#paypal-button-container');

		fetch('paypal_catch_response')
.then(response => response.json())
.then(data => {
  console.log(data) // Prints result from `response.json()` in getRequest
})
.catch(error => console.error(error))


	</script>
@endsection
