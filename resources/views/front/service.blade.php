@extends('front.layout.master')

@section('content')

<div class="banner">
	<div class="container">
		<div class="inner_container">
			<div class="heading">Booking</div>
		</div>
	</div>
	<div class="waves_shape about_waves_bottom" aria-hidden="true" data-negative="false">
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none">
			<path class="waves_color_fill" opacity="0.33" d="M473,67.3c-203.9,88.3-263.1-34-320.3,0C66,119.1,0,59.7,0,59.7V0h1000v59.7 c0,0-62.1,26.1-94.9,29.3c-32.8,3.3-62.8-12.3-75.8-22.1C806,49.6,745.3,8.7,694.9,4.7S492.4,59,473,67.3z"></path>
			<path class="waves_color_fill" opacity="0.66" d="M734,67.3c-45.5,0-77.2-23.2-129.1-39.1c-28.6-8.7-150.3-10.1-254,39.1 s-91.7-34.4-149.2,0C115.7,118.3,0,39.8,0,39.8V0h1000v36.5c0,0-28.2-18.5-92.1-18.5C810.2,18.1,775.7,67.3,734,67.3z"></path>
			<path class="waves_color_fill" d="M766.1,28.9c-200-57.5-266,65.5-395.1,19.5C242,1.8,242,5.4,184.8,20.6C128,35.8,132.3,44.9,89.9,52.5C28.6,63.7,0,0,0,0 h1000c0,0-9.9,40.9-83.6,48.1S829.6,47,766.1,28.9z"></path>
		</svg>		
	</div>
</div>

<div class="salon_services_section">
	<div class="container">
		<div class="inner_container">
			<div class="salon_services_img">
				<img src="{{ asset('front/images/service/salon-services.png') }}">
			</div>
			<div class="heading">Everything You Need, From Head to Toe.</div>
			<p>Explore our full range of beauty treatments — from facials and waxing to haircare and bridal packages.</p>
			<div class="bg_color_text">CHECK OUR PACKAGES & COMBOS</div>
			<div class="salon_services_boxes">

				@if(!empty($categories) && count($categories) > 0)
					@foreach($categories as $category)
						<div class="box">
							<div class="title">{{$category->title}}</div>
							<div class="salon_services_type">

								@if(!empty($category->subCategories) && count($category->subCategories) > 0)
									@foreach($category->subCategories as $subCategory)
													@if(!empty($subCategory->services) && count($subCategory->services) > 0)
										<div class="col-sm-6">
											<div class="inner_box">
												<div class="text_box">
													<div class="sub_title">{{$subCategory->title}}</div>
														<ul>
															@foreach($subCategory->services as $service)
																<li>
																	<span class="icon"><svg aria-hidden="true" class="e-font-icon-svg e-fas-caret-square-right" viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg"><path d="M48 32h352c26.51 0 48 21.49 48 48v352c0 26.51-21.49 48-48 48H48c-26.51 0-48-21.49-48-48V80c0-26.51 21.49-48 48-48zm140.485 355.515l123.029-123.029c4.686-4.686 4.686-12.284 0-16.971l-123.029-123.03c-7.56-7.56-20.485-2.206-20.485 8.485v246.059c0 10.691 12.926 16.045 20.485 8.486z"></path></svg></span>
																	<span class="txt">{{$service->title}}: ₹{{$service->price}}</span>
																</li>
															@endforeach
														</ul>
												</div>
												<div class="book_btn">
													<button type="button" class="request_callback">Book</button>
													<!-- <a href="#">Book</a> -->
												</div>
											</div>
										</div>
													@endif
									@endforeach
								@endif

							</div>
						</div>
					@endforeach
				@endif
			</div>
		</div>
	</div>
</div>

<div class="pricing_plan_section">
	<div class="container">
		<div class="inner_container">
			<div class="salon_services_img">
				<img src="{{ asset('front/images/service/pricing-plan.png') }}">
			</div>
			<div class="heading">Our Best Packages</div>
			<!-- <div class="search_wrapper">
				<form action="#">
					<button type="submit">
	                    <i class="fa-solid fa-magnifying-glass"></i>
	                </button>
	                <input type="text" placeholder="Search" value="">
	            </form>
			</div> -->
			<div class="pricing_plan_boxes">
				<div class="box">
					<div class="title">Available - 12 Packages</div>
					<div class="pricing_plan_type">

						@if(!empty($packages) && count($packages) > 0)
							@foreach($packages as $package)
								<div class="col-sm-6">
									<div class="inner_box">
										<div class="package_box">
											<span class="icon"><i class="fa-solid fa-briefcase"></i></span>
											<span class="txt">Package</span>
										</div>
										<div class="text_box">
											<div class="sub_title">{{ $package->title }}</div>
											<div class="offer_box">
												<div class="save_box">Save 10%</div>
												<div class="price_box">INR{{ $package->price }}</div>
											</div>
										</div>
										<p>In Package:</p>
										@if(!empty($package->services) && count($package->services) > 0)
											<ul>
												@foreach($package->services as $service)
													<li>{{$service->title}}</li>
												@endforeach
											</ul>
											<div class="continue_btn">
												<button type="button" class="book_package" data-id="{{ $package->id }}" data-id="{{ $package->id }}" data-price="{{ $package->price }}" data-title="{{ $package->title }} - ₹{{$service->price}}" 
													data-description="<ul>
													@foreach($package->services as $service)
														<li>{{$service->title}}</li>
													@endforeach
												</ul>
												">Continue</button>
											</div>
										@endif
									</div>
								</div>
							@endforeach
						@endif

					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection