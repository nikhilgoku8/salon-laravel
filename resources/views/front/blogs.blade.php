@extends('front.layout.master')

@section('content')

<div class="banner">
	<div class="container">
		<div class="inner_container">
			<div class="heading">Beauty Tips, Trends & More</div>
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

<div class="blogs_section">
	<div class="container">
		<div class="inner_container">
			<div class="blogs_img">
				<img src="{{ asset('front/images/blogs/news-feed.png') }}">
			</div>
			<div class="heading">Stay updated with expert skincare advice, seasonal grooming tips, and insider beauty secrets — right from the pros.</div>
			<div class="blogs_boxes">
				<div class="col-sm-4">
					<div class="inner_box">
						<a href="#">
							<div class="img_box">
								<img src="{{ asset('front/images/blogs/1.jpg') }}">
							</div>
							<div class="text_box">
								<div class="title">5 Home Beauty Hacks That Actually Work</div>
								<p>Who says you need a full salon setup to look your best? These five beauty hacks are simple, natural, and surprisingly effective:</p>
								<div class="btn">
									<a href="#">Learn more</a>
								</div>
							</div>
						</a>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="inner_box">
						<a href="{{ route('single_blog') }}">
							<div class="img_box">
								<img src="{{ asset('front/images/blogs/2.jpg') }}">
							</div>
							<div class="text_box">
								<div class="title">The Right Way to Prep for a Facial</div>
								<p>Getting a facial soon? Here’s how to prep your skin so you get the most out of it:</p>
								<div class="btn">
									<a href="{{ route('single_blog') }}">Learn more</a>
								</div>
							</div>
						</a>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="inner_box">
						<a href="#">
							<div class="img_box">
								<img src="{{ asset('front/images/blogs/3.jpg') }}">
							</div>
							<div class="text_box">
								<div class="title">Hair Colour Maintenance Made Easy</div>
								<p>Just coloured your hair? Here’s how to keep that fresh, salon-finish look longer:</p>
								<div class="btn">
									<a href="#">Learn more</a>
								</div>
							</div>
						</a>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="inner_box">
						<a href="#">
							<div class="img_box">
								<img src="{{ asset('front/images/blogs/4.jpg') }}">
							</div>
							<div class="text_box">
								<div class="title">Top 3 Bridal Looks of the Year</div>
								<p>Planning your big day? These 2025 bridal looks are trending — and absolutely stunning:</p>
								<div class="btn">
									<a href="#">Learn more</a>
								</div>
							</div>
						</a>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="inner_box">
						<a href="#">
							<div class="img_box">
								<img src="{{ asset('front/images/blogs/5.jpg') }}">
							</div>
							<div class="text_box">
								<div class="title">How to Choose the Right Facial for Your Skin Type</div>
								<p>Picking the right facial makes all the difference. Here’s a quick guide:</p>
								<div class="btn">
									<a href="#">Learn more</a>
								</div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection