@extends('layouts.app_admin')

@section('content')

	<div id="paypal-button-container"></div>

@endsection


@section('js')
	<script src="https://www.paypal.com/sdk/js?client-id=AbQSV_9jkc2Lb8qQMyIWQ8HwV1oK4zla2MZ8Amoy18JSHVp3C7mHpvv-g0mBbBoislwU-4UKxrHCwImK"> </script>
   	<script>
   		paypal.Buttons({
		    createOrder: function(data, actions) {
		      // Set up the transaction
		      return actions.order.create({
		        purchase_units: [{
		          amount: {
		            value: '20.00'
		          }
		        }]
		      });
		    },
		    onApprove: function(data, actions) {
		      // Capture the funds from the transaction
		      return actions.order.capture().then(function(details) {
		        // Show a success message to your buyer
		        alert('Transaction completed by ' + details.payer.name.given_name);
		      });
		    }
		  }).render('#paypal-button-container');
   </script>
@endsection
