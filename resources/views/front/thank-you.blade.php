@extends('front.layout.master')

@section('content')

<div class="thank_you_page">
	<div class="container">
		<div class="inner_container">
			
			<div class="heading">Thank You</div>
			<div class="sub_heading">We have received your booking details. <br>
				We will get back to you shortly.
			</div>
			<!-- we will get back to you shortly -->
			@if(request()->query('payment_mode') == 'online')
				<div>
					<ul>
						<li>Payment Mode : {{ strtoupper(request()->query('payment_mode')) }}</li>
						<li>Payment Status : {{ strtoupper(request()->query('payment_status')) }}</li>
						<li>Message : <b>{{ request()->query('message') }}</b></li>
					</ul>
				</div>
			@endif

		</div>
	</div>
</div>

@endsection