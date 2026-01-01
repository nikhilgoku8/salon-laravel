@extends('front.layout.master')

@section('content')

<div class="hero_section">
    <div class="background_overlay"></div>
    <div class="salon_services_boxes">
        <div class="container">
            <div class="inner_container">
                <div class="left_side">
                    <div class="inner_box">
                        <div class="heading">Salon Services, Now Just a Doorbell Away.</div>
                        <p>From facials to full-body grooming — get premium beauty services in the comfort of your home.</p>
                        <div class="btn">
                            <a href="#">Book Your Glow Today</a>
                        </div>
                    </div>
                </div>
                <div class="middle_side">
                    <div class="item_box">
                        <div class="img_box">
                            <img src="{{ asset('front/images/hero-image-01.jpg') }}">
                        </div>
                    </div>
                </div>
                <div class="right_side">
                    <div class="item_box">
                        <div class="img_box">
                            <img src="{{ asset('front/images/hero-image-02.jpg') }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="waves_shape hero_waves_bottom" aria-hidden="true" data-negative="false">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none">
            <path class="waves_color_fill" opacity="0.33" d="M473,67.3c-203.9,88.3-263.1-34-320.3,0C66,119.1,0,59.7,0,59.7V0h1000v59.7 c0,0-62.1,26.1-94.9,29.3c-32.8,3.3-62.8-12.3-75.8-22.1C806,49.6,745.3,8.7,694.9,4.7S492.4,59,473,67.3z"></path>
            <path class="waves_color_fill" opacity="0.66" d="M734,67.3c-45.5,0-77.2-23.2-129.1-39.1c-28.6-8.7-150.3-10.1-254,39.1 s-91.7-34.4-149.2,0C115.7,118.3,0,39.8,0,39.8V0h1000v36.5c0,0-28.2-18.5-92.1-18.5C810.2,18.1,775.7,67.3,734,67.3z"></path>
            <path class="waves_color_fill" d="M766.1,28.9c-200-57.5-266,65.5-395.1,19.5C242,1.8,242,5.4,184.8,20.6C128,35.8,132.3,44.9,89.9,52.5C28.6,63.7,0,0,0,0 h1000c0,0-9.9,40.9-83.6,48.1S829.6,47,766.1,28.9z"></path>
        </svg>
    </div>
</div>

<div class="beauty_spa_section">
    <div class="container">
        <div class="inner_container">
            <div class="text_img">
                <div class="img_box">
                    <img src="{{ asset('front/images/beauty-spa/beauty-spa-relaxing.png') }}">
                </div>
            </div>
            <div class="beauty_spa_img">
                <div class="img_box">
                    <img src="{{ asset('front/images/beauty-spa/beauty-spa.png') }}" class="animation_wobble_vertical">
                </div>
            </div>
            <div class="heading">Salon-Grade Glamour, At Your Doorstep</div>
            <p>Book professional beauty and salon services at your convenience — anytime, anywhere in Mumbai.</p>
            <div class="buttons_wrapper">
                <div class="btn">
                    <span class="btn_one">
                        <a href="#">Services</a>
                    </span>
                    <span class="btn_two">
                        <a href="#">Packages</a>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="why_choose_section">
    <div class="background_overlay"></div>
    <div class="waves_shape why_choose_waves_top" aria-hidden="true" data-negative="false">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none">
            <path class="waves_color_fill" opacity="0.33" d="M473,67.3c-203.9,88.3-263.1-34-320.3,0C66,119.1,0,59.7,0,59.7V0h1000v59.7 c0,0-62.1,26.1-94.9,29.3c-32.8,3.3-62.8-12.3-75.8-22.1C806,49.6,745.3,8.7,694.9,4.7S492.4,59,473,67.3z"></path>
            <path class="waves_color_fill" opacity="0.66" d="M734,67.3c-45.5,0-77.2-23.2-129.1-39.1c-28.6-8.7-150.3-10.1-254,39.1 s-91.7-34.4-149.2,0C115.7,118.3,0,39.8,0,39.8V0h1000v36.5c0,0-28.2-18.5-92.1-18.5C810.2,18.1,775.7,67.3,734,67.3z"></path>
            <path class="waves_color_fill" d="M766.1,28.9c-200-57.5-266,65.5-395.1,19.5C242,1.8,242,5.4,184.8,20.6C128,35.8,132.3,44.9,89.9,52.5C28.6,63.7,0,0,0,0 h1000c0,0-9.9,40.9-83.6,48.1S829.6,47,766.1,28.9z"></path>
        </svg>
    </div>
    <div class="why_choose_boxes">
        <div class="container">
            <div class="inner_container">
                <div class="col-sm-6">
                    <div class="inner_info">
                        <div class="heading">Why choose us</div>
                        <p>Professional Care. Personal Touch. On Wheels.</p>
                        <div class="boxes">
                            <div class="col-sm-6">
                                <div class="inner_box">
                                    <div class="img_box">
                                         <img src="{{ asset('front/images/icons/1.png') }}">
                                    </div>
                                    <div class="title">Certified Beauty Experts</div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="inner_box">
                                    <div class="img_box">
                                         <img src="{{ asset('front/images/icons/2.png') }}">
                                    </div>
                                    <div class="title">Hygienic & High-Quality Products</div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="inner_box">
                                    <div class="img_box">
                                         <img src="{{ asset('front/images/icons/3.png') }}">
                                    </div>
                                    <div class="title">Hassle-Free Online Booking</div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="inner_box">
                                    <div class="img_box">
                                         <img src="{{ asset('front/images/icons/4.png') }}">
                                    </div>
                                    <div class="title">Services for Women & Men</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="img_boxes">
                        <div class="img_box_one">
                            <img src="{{ asset('front/images/why-choose-1.jpg') }}">
                        </div>
                        <div class="img_box_two">
                            <img src="{{ asset('front/images/why-choose-2.jpg') }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="waves_shape why_choose_waves_bottom" aria-hidden="true" data-negative="false">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none">
            <path class="waves_color_fill" opacity="0.33" d="M473,67.3c-203.9,88.3-263.1-34-320.3,0C66,119.1,0,59.7,0,59.7V0h1000v59.7 c0,0-62.1,26.1-94.9,29.3c-32.8,3.3-62.8-12.3-75.8-22.1C806,49.6,745.3,8.7,694.9,4.7S492.4,59,473,67.3z"></path>
            <path class="waves_color_fill" opacity="0.66" d="M734,67.3c-45.5,0-77.2-23.2-129.1-39.1c-28.6-8.7-150.3-10.1-254,39.1 s-91.7-34.4-149.2,0C115.7,118.3,0,39.8,0,39.8V0h1000v36.5c0,0-28.2-18.5-92.1-18.5C810.2,18.1,775.7,67.3,734,67.3z"></path>
            <path class="waves_color_fill" d="M766.1,28.9c-200-57.5-266,65.5-395.1,19.5C242,1.8,242,5.4,184.8,20.6C128,35.8,132.3,44.9,89.9,52.5C28.6,63.7,0,0,0,0 h1000c0,0-9.9,40.9-83.6,48.1S829.6,47,766.1,28.9z"></path>
        </svg>
    </div>
</div>

<div class="how_its_works_section">
    <div class="container">
        <div class="inner_container">
            <div class="heading">How It Works</div>
            <div class="how_its_works_boxes">
                <div class="col-sm-4">
                    <div class="inner_box">
                        <div class="img_box">
                            <img src="{{ asset('front/images/icons/one.png') }}">
                        </div>
                        <div class="title">Browse Services</div>
                        <p>Explore our wide range of home and personal services tailored to your needs.</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="inner_box">
                        <div class="img_box">
                            <img src="{{ asset('front/images/icons/two.png') }}">
                        </div>
                        <div class="title">Choose Date &amp; Time</div>
                        <p>Pick a time slot that fits your schedule – we’re flexible and ready when you are.</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="inner_box">
                        <div class="img_box">
                            <img src="{{ asset('front/images/icons/three.png') }}">
                        </div>
                        <div class="title">Expert Comes to You</div>
                        <p>Sit back and relax – a trained professional will arrive on time, ready to help.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="popular_services_section">
    <div class="container">
        <div class="inner_container">
            <div class="spa_treatments">
                <div class="img_box">
                    <img src="{{ asset('front/images/spa-treatments/spa-treatments-image.png') }}">
                </div>
            </div>
            <div class="heading">Popular Services</div>
            <div class="popular_services_boxes">
                 <div class="left_plane">
                     <div class="img_boxes_one">
                        <div class="img_box">
                            <img src="{{ asset('front/images/spa-treatments/images-1.jpg') }}">
                        </div>
                        <div class="text_box">
                            <div class="inner_box">
                                <div class="title">Waxing & Threading</div>
                                <p>Smooth and flawless skin with gentle, precise hair removal.</p>
                                <div class="btn">
                                    <a href="#">Book Now</a>
                                </div>
                            </div>
                        </div>
                     </div>
                     <div class="img_boxes_two">
                        <div class="img_box">
                            <img src="{{ asset('front/images/spa-treatments/images-2.jpg') }}">
                        </div>
                        <div class="text_box">
                            <div class="inner_box">
                                <div class="title">Haircuts, Styling & Colour</div>
                                <p>From trims to transformations – your perfect look, delivered.</p>
                                <div class="btn">
                                    <a href="#">Book Now</a>
                                </div>
                            </div>
                        </div>
                     </div>
                 </div>
                 <div class="right_plane">
                     <div class="img_boxes_three">
                         <div class="img_box">
                             <img src="{{ asset('front/images/spa-treatments/images-3.jpg') }}">
                         </div>
                         <div class="text_box">
                            <div class="inner_box">
                                <div class="title">Facials & Clean-Ups</div>
                                <p>Glow up with skin treatments that cleanse, hydrate, and refresh.</p>
                                <div class="btn">
                                    <a href="#">Book Now</a>
                                </div>
                            </div>
                        </div>
                     </div>
                     <div class="img_boxes_four">
                        <div class="img_box">
                            <img src="{{ asset('front/images/spa-treatments/images-4.jpg') }}">
                        </div>
                        <div class="text_box">
                            <div class="inner_box">
                                <div class="title">Manicure & Pedicure</div>
                                <p>Pamper your hands and feet with relaxing, salon-quality care</p>
                                <div class="btn">
                                    <a href="#">Book Now</a>
                                </div>
                            </div>
                        </div>
                     </div>
                 </div>
            </div>
            <div class="popular_services_bottom_boxes">
                <div class="img_boxes_five">
                    <div class="img_box">
                        <img src="{{ asset('front/images/spa-treatments/images-5.jpg') }}">
                    </div>
                    <div class="text_box">
                        <div class="inner_box">
                            <div class="title">Bridal & Pre-Bridal Packages</div>
                            <p>Look your best for your big day with our all-inclusive bridal beauty services.</p>
                            <div class="btn">
                                <a href="#">Book Now</a>
                            </div>
                        </div>
                    </div>
                 </div>
            </div>
        </div>
    </div>
</div>

<div class="testimonials_section">
    <div class="container">
        <div class="inner_container">
            <div class="img_box">
                 <img src="{{ asset('front/images/testimonials/testimonials-image.png') }}">
            </div>
            <div class="heading">Hear what people are saying about our service</div>
            <div class="boxes">
                <div class="review_slider owl-carousel owl-theme">
                    <div class="review_box">
                        <div class="inner_box">
                            <ul>
                                <li><a><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path></svg></a></li>
                                <li><a><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path></svg></a></li>
                                <li><a><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path></svg></a></li>
                                <li><a><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path></svg></a></li>
                                <li><a><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path></svg></a></li>
                            </ul>
                            <div class="text_box">
                                <p>I booked a facial and waxing session and was honestly surprised by the quality. The beautician arrived right on time, wore gloves and mask, and used top products. It felt like a real salon at home. Highly recommended!</p>
                                <div class="title">Riya S., Andheri</div>
                            </div>
                        </div>
                    </div>
                    <div class="review_box">
                        <div class="inner_box">
                            <ul>
                                <li><a><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path></svg></a></li>
                                <li><a><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path></svg></a></li>
                                <li><a><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path></svg></a></li>
                                <li><a><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path></svg></a></li>
                                <li><a><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path></svg></a></li>
                            </ul>
                            <div class="text_box">
                                <p>No more waiting at salons with a toddler in tow! The beautician was polite, skilled, and made me feel completely pampered. Loved the manicure and cleanup combo. Will book again for sure.</p>
                                <div class="title">Meera J., Bandra</div>
                            </div>
                        </div>
                    </div>
                    <div class="review_box">
                        <div class="inner_box">
                            <ul>
                                <li><a><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path></svg></a></li>
                                <li><a><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path></svg></a></li>
                                <li><a><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path></svg></a></li>
                                <li><a><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path></svg></a></li>
                                <li><a><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path></svg></a></li>
                            </ul>
                            <div class="text_box">
                                <p>Booked the 2-day Pre-Bridal package and everything — from waxing to facial to hair spa — was done to perfection. The staff was warm, professional, and punctual. Couldn’t have asked for better service.</p>
                                <div class="title">Anjali D., Powai</div>
                            </div>
                        </div>
                    </div>
                    <div class="review_box">
                        <div class="inner_box">
                            <ul>
                                <li><a><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path></svg></a></li>
                                <li><a><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path></svg></a></li>
                                <li><a><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path></svg></a></li>
                                <li><a><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path></svg></a></li>
                                <li><a><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path></svg></a></li>
                            </ul>
                            <div class="text_box">
                                <p>Tried the Smooth & Shine hair combo. Super happy with the results! My hair feels soft, and I didn’t even have to step out. Great job team Salononwheels!</p>
                                <div class="title">Neha R., Malad</div>
                            </div>
                        </div>
                    </div>
                    <div class="review_box">
                        <div class="inner_box">
                            <ul>
                                <li><a><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path></svg></a></li>
                                <li><a><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path></svg></a></li>
                                <li><a><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path></svg></a></li>
                                <li><a><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path></svg></a></li>
                                <li><a><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path></svg></a></li>
                            </ul>
                            <div class="text_box">
                                <p>I’ve tried multiple at-home services but this one stands out. Clean tools, courteous beautician, and stress-free booking. Loved the Detan Pedicure and Gold Facial!</p>
                                <div class="title">Shweta K., Goregaon</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
