@extends('front.layout.master')

@section('content')

@php
	$paymentStatus = request()->query('payment_status');
	$paymentMode = request()->query('payment_mode');
	$isUnsuccessful = in_array($paymentStatus, ['cancelled', 'failed'], true);
@endphp

<div class="thank_you_page">
	<div class="container">
		<div class="inner_container">
			
			@if($isUnsuccessful)
				<div class="heading">{{ $paymentStatus === 'cancelled' ? 'Payment Cancelled' : 'Payment Unsuccessful' }}</div>
				<div class="sub_heading">
					Your payment was not completed, so no booking was created.<br>
					You can try booking again whenever you're ready.
				</div>
			@else
				<div class="heading">Thank You</div>
				<div class="sub_heading">We have received your booking details. <br>
					We will get back to you shortly.
				</div>
			@endif

			@if(in_array($paymentMode, ['online', 'cod', 'cod_full'], true))
				<div>
					<ul>
						<li>Payment Mode : {{ $paymentMode === 'cod_full' ? 'COD' : strtoupper($paymentMode) }}</li>
						<li>Payment Status : {{ strtoupper($paymentStatus) }}</li>
						@if(request()->query('message'))
							<li>Message : <b>{{ request()->query('message') }}</b></li>
						@endif
					</ul>
				</div>
			@endif

		</div>
	</div>
</div>

@endsection
