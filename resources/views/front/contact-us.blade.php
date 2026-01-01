@extends('front.layout.master')

@section('content')

<div class="banner">
	<div class="container">
		<div class="inner_container">
			<div class="heading">We’re Here For You</div>
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

<div class="contact_section">
	<div class="container">
		<div class="inner_container">
		 	<div class="contact_boxes">
		 		<div class="ctc_info">
                    <div class="ctc_box">
                        <a href="#">
                            <span class="icon"><i class="fa-solid fa-location-dot"></i></span>
                            <span class="txt">S - 31, 2nd Floor, B Wing, EXPRESS ZONE<br> Western Express Hwy,<br> near Dindoshi metro, Malad, Panch Bawadi,<br> Malad East, Mumbai, Maharashtra 400063</span>
                        </a>
                    </div>
                    <div class="ctc_box">
                        <a href="#">
                            <span class="icon"><i class="fa-solid fa-envelope-open"></i></span>
                            <span class="txt">yourname@email.com</span>
                        </a>
                    </div>
                    <div class="ctc_box">
                        <a href="#">
                            <span class="icon"><i class="fa-solid fa-phone"></i></span>
                            <span class="txt">123-456-7890</span>
                        </a>
                    </div>
                    <div class="ctc_box">
                        <a href="#">
                            <span class="icon"><i class="fa-solid fa-clock"></i></span>
                            <span class="txt">Mon - Fri : 8 am - 9.30 pm</span>
                        </a>
                    </div>
                </div>
		 	</div>
		 	<div class="contact_img">
		 		<img src="{{ asset('front/images/contact/send-us-message.png') }}">
		 	</div>
		 	<div class="heading">Need Help or Want to Book? Let’s Talk.</div>
		</div>
	</div>
</div>

<div class="form_section">
	<div class="container">
		<div class="inner_container">
			<form class="enquiry_form" action="" method="POST">
                <div class="col-sm-12 form-group">
                    <div class="error form_error" id="form-error-enquire_fname"></div>
                    <input name="enquire_fname" id="enquire_fname" class="form-control" placeholder="Name" type="text">
                </div>
                <div class="col-sm-12 form-group">
                    <div class="error form_error" id="form-error-enquire_phone"></div>
                    <input name="enquire_phone" id="enquire_phone" class="form-control" placeholder="Number" type="text">
                </div>
                <div class="col-sm-12 form-group">
                    <div class="error form_error" id="form-error-enquire_email"></div>
                    <input name="enquire_email" id="enquire_email" class="form-control" placeholder="Email" type="text">
                </div>
                <div class="col-sm-12 form-group">
                    <div class="error form_error" id="form-error-comment_message"></div>
                    <textarea  name="comment_message" class="comment_message" placeholder="Message"></textarea>
                </div>
                <div class="submit_box">
                    <button type="submit" name="submit" class="submit-btn">Send</button>
				</div>
            </form>
		</div>
	</div>
</div>

<div class="map_section">
	<div class="inner_container">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3768.4269383539877!2d72.85584097520787!3d19.17654618204883!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7b707374fdf5b%3A0xdb893aa5be338aa0!2sExpress%20Zone%20B%20Wing!5e0!3m2!1sen!2sin!4v1762945453825!5m2!1sen!2sin" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
	</div>
</div>


@endsection