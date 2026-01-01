@extends('front.layout.master')

@section('content')

<div class="banner">
	<div class="container">
		<div class="inner_container">
			<div class="heading">About us</div>
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

<div class="bringing_section">
	<div class="container">
		<div class="inner_container">
			<div class="width_50">
				<div class="inner_box">
					<div class="heading">Bringing the Salon to You.</div>
					<div class="text_box">
						<p>At Salononwheels, we believe beauty should be effortless. That’s why we created a salon experience that fits into your schedule, not the other way around. Whether it’s a quick clean-up or a luxurious spa treatment, our expert beauticians bring professional services to your doorstep — complete with top-grade products and strict hygiene protocols.</p>
						<p>We are based in Mumbai and cater to individuals who value comfort, quality, and convenience. Whether you’re at home, at work, or preparing for an event, we’ll be there — wherever “there” is for you.</p>
					</div>
				</div>
			</div>
			<div class="width_50">
				<div class="item_box">
					<div class="img_box">
						<img src="{{ asset('front/images/about-images/bringing-salon.png') }}">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="mission_vision_section">
	<div class="container">
		<div class="inner_container">
			<div class="width_50">
				<div class="item_box_one">
					<div class="img_box">
						<img src="{{ asset('front/images/about-images/mission.png') }}">
					</div>
					<div class="title">Why choose spa</div>
					<p>Get expert beauty care at home from certified professionals. We use safe, high-quality products and offer easy online booking. For women and men — comfort, hygiene, and convenience, all in one.</p>
				</div>
			</div>
			<div class="width_50">
				<div class="item_box_two">
					<div class="img_box">
						<img src="{{ asset('front/images/about-images/vision.png') }}">
					</div>
					<div class="title">Our Vision</div>
					<p>To make salon experiences easier and more accessible by bringing trusted beauty services to your doorstep — anytime, anywhere.</p>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="our_experts_section">
	<div class="container">
		<div class="inner_container">
			<div class="our_experts_img">
				<img src="{{ asset('front/images/about-images/our-experts.png') }}">
			</div>
			<div class="heading">The experts you need</div>
			<div class="our_experts_boxes">
				<div class="col-sm-3">
					<div class="boxes">
						<div class="img_box">
							<img src="{{ asset('front/images/about-images/team-1.jpg') }}">
						</div>
						<div class="text_box">
							<div class="title">Emma White</div>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,</p>
							<ul>
								<li>
									<a href="#"><i class="fa-brands fa-facebook-f"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa-brands fa-whatsapp"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa-brands fa-instagram"></i></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="boxes">
						<div class="img_box">
							<img src="{{ asset('front/images/about-images/team-2.jpg') }}">
						</div>
						<div class="text_box">
							<div class="title">lora jean</div>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,</p>
							<ul>
								<li>
									<a href="#"><i class="fa-brands fa-facebook-f"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa-brands fa-whatsapp"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa-brands fa-instagram"></i></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="boxes">
						<div class="img_box">
							<img src="{{ asset('front/images/about-images/team-3.jpg') }}">
						</div>
						<div class="text_box">
							<div class="title">catty paul</div>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,</p>
							<ul>
								<li>
									<a href="#"><i class="fa-brands fa-facebook-f"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa-brands fa-whatsapp"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa-brands fa-instagram"></i></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="boxes">
						<div class="img_box">
							<img src="{{ asset('front/images/about-images/team-4.jpg') }}">
						</div>
						<div class="text_box">
							<div class="title">cris jordan</div>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,</p>
							<ul>
								<li>
									<a href="#"><i class="fa-brands fa-facebook-f"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa-brands fa-whatsapp"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa-brands fa-instagram"></i></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection