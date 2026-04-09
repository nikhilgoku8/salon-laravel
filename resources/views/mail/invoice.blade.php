<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Invoice</title>
  <style>
    @page {
		margin: 2cm 2cm 3cm 2cm;
    }

    body {
		font-family: 'Helvetica Neue', Arial, sans-serif;
		font-size: 13px;
		color: #333;
		line-height: 1.5;
		margin: 0;
		padding: 20px;
    }

    .header {
		display: flex;
		justify-content: space-between;
		margin-bottom: 1cm;
    }

    .header-left {
		width: 60%;
    }

    .logo {
		/* height: 50px; */
		max-width: 150px;
		display: block;
		margin-bottom: 8px;
    }

    .company-info {
		line-height: 1.4;
    }

    .invoice-meta {
		text-align: right;
    }

    .invoice-title {
		font-size: 24px;
		font-weight: 600;
		margin-bottom: 10px;
    }

    .recipient {
		margin-bottom: 1cm;
    }

    table {
		width: 100%;
		border-collapse: collapse;
		border-bottom: 1px solid #ddd;
		margin-bottom: 1.5cm;
    }

    th,
    td {
		border-top: 1px solid #ddd;
		padding: 6px 4px;
		text-align: left;
		vertical-align: top;
    }

    th {
		background: #f5f5f5;
		font-weight: 600;
    }

    .totals {
		width: 40%;
		float: right;
		margin-bottom: 0.5cm;
    }

    .totals td {
		padding: 4px 0;
    }

    .bottom-container {
		display: flex;
		justify-content: space-between;
		margin-top: 1.5cm;
		margin-bottom: 1.5cm;
		page-break-inside: avoid;
    }

    .sender-details,
    .bank-info {
		width: 48%;
    }

    .bank-info {
		text-align: right;
    }

    .notes {
		clear: both;
		margin-bottom: 1.5cm;
		text-align: center;
    }
  </style>
</head>
<body>
  <div class="header">
    <div class="header-left">
		<img class="logo" src="{{ asset('front/images/logo.png') }}" alt="Logo">
		<div class="company-info"><strong>Salononwheels</strong><br>S - 31, 2nd Floor, B Wing, EXPRESS ZONE Western Express Hwy,<br> near Dindoshi metro, Malad, Panch Bawadi,<br> Malad East, Mumbai, Maharashtra 400063</div>
    </div>
    <div class="invoice-meta">
		<div class="invoice-title">Invoice</div>
		<div><strong>Invoice No.:</strong> INV-{{ $mailData['booking_id'] }}</div>
		<div><strong>Date:</strong> {{ \Carbon\Carbon::parse('now')->format('d-m-Y') }}</div>
		<!-- <div><strong>Due Date:</strong> 2025-10-24</div> -->
    </div>
  </div>

  <div class="recipient">
    <strong>Recipient:</strong><br>{{ $mailData['fname'] .' '. $mailData['lname'] }}<br> 
    <span style="max-width: 300px;">{{ $mailData['address'] }}</span>
    <!-- <br>Tax ID: Tax ID -->
  </div>

  <table>
    <thead>
		<tr>
			<th style="width:5%">#</th>
			<th>Description</th>
			<th style="width:15%; text-align: right;">Amount</th>
		</tr>
    </thead>
    <tbody>
		@php
			$i = 1;
		@endphp
		@if(!empty($mailData['package']))
			<tr>
				<td>{{ $i }}</td>
				<td>
					{{ $mailData['package']->title }} - (Package)
					@if(!empty($mailData['package']->services) && count($mailData['package']->services) > 0)
						<ul>
							@foreach($mailData['package']->services as $packageService)
								<li>{{ $packageService->title }}</li>
							@endforeach
						</ul>
					@endif
				</td>
				<td style="text-align: right;">&#8377; {{ $mailData['package']->price }}.00</td>
			</tr>
			@php
				$i++
			@endphp
		@endif
		@if(!empty($mailData['bookingServices']) && count($mailData['bookingServices']) > 0)
			@foreach($mailData['bookingServices'] as $bookingService)
				@if(!$mailData['package']?->services->contains($bookingService->service))
					<tr>
						<td>{{ $i }}</td>
						<td>
							{{ $bookingService->service->title }}
						</td>
						<td style="text-align: right;">&#8377; {{ $bookingService->service->price }}.00</td>
					</tr>
					@php
						$i++
					@endphp
				@endif
			@endforeach
		@endif
    </tbody>
  </table>

  <div class="totals">
    <table>
		<tr>
			<td><strong>Total:</strong></td>
			<td style="text-align:right;"><strong>&#8377; {{ $mailData['total_price'] }}.00</strong></td>
		</tr>
    </table>
  </div>

  
  <div class="notes">
    It was a pleasure doing business with you.
  </div>
  

  <!-- <div class="bottom-container">
    <div class="sender-details">
		<strong>Company Name</strong><br>
		Address<br><br>
		Tax ID: Tax ID<br>
		Phone: Phone<br>
		Email: Email
    </div>
  </div> -->

</body>
</html>