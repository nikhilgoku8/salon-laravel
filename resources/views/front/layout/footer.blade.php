</div>

<footer>
    <div class="waves_shape footer_waves_top" aria-hidden="true" data-negative="false">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none">
            <path class="waves_color_fill" opacity="0.33" d="M473,67.3c-203.9,88.3-263.1-34-320.3,0C66,119.1,0,59.7,0,59.7V0h1000v59.7 c0,0-62.1,26.1-94.9,29.3c-32.8,3.3-62.8-12.3-75.8-22.1C806,49.6,745.3,8.7,694.9,4.7S492.4,59,473,67.3z"></path>
            <path class="waves_color_fill" opacity="0.66" d="M734,67.3c-45.5,0-77.2-23.2-129.1-39.1c-28.6-8.7-150.3-10.1-254,39.1 s-91.7-34.4-149.2,0C115.7,118.3,0,39.8,0,39.8V0h1000v36.5c0,0-28.2-18.5-92.1-18.5C810.2,18.1,775.7,67.3,734,67.3z"></path>
            <path class="waves_color_fill" d="M766.1,28.9c-200-57.5-266,65.5-395.1,19.5C242,1.8,242,5.4,184.8,20.6C128,35.8,132.3,44.9,89.9,52.5C28.6,63.7,0,0,0,0 h1000c0,0-9.9,40.9-83.6,48.1S829.6,47,766.1,28.9z"></path>
        </svg>
    </div>
    <div class="footer_info">
        <div class="container">
            <div class="inner_container">
                <div class="logo">
                    <a href="{{ route('home') }}"><img src="{{ asset('front/images/logo.png') }}"></a>
                </div>
                <ul>
                    <li>
                        <a href="{{ route('home') }}">
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('about_us') }}">
                            <span>About us</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('service') }}">
                            <span>Service</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('blogs') }}">
                            <span>Blog</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('contact_us') }}">
                            <span>Contact us</span>
                        </a>
                    </li>
                </ul>
                <div class="ctc_info">
                    <div class="ctc_box">
                        <a href="#">
                            <span class="icon"><i class="fa-solid fa-location-dot"></i></span>
                            <span class="txt">Plaza X , XY Floor, Street, XYZ</span>
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
                <div class="copy_right">
                    <p>Copyright © 2025 Salon on wheels. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="waves_shape footer_waves_bottom" aria-hidden="true" data-negative="false">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none">
            <path class="waves_color_fill" opacity="0.33" d="M473,67.3c-203.9,88.3-263.1-34-320.3,0C66,119.1,0,59.7,0,59.7V0h1000v59.7 c0,0-62.1,26.1-94.9,29.3c-32.8,3.3-62.8-12.3-75.8-22.1C806,49.6,745.3,8.7,694.9,4.7S492.4,59,473,67.3z"></path>
            <path class="waves_color_fill" opacity="0.66" d="M734,67.3c-45.5,0-77.2-23.2-129.1-39.1c-28.6-8.7-150.3-10.1-254,39.1 s-91.7-34.4-149.2,0C115.7,118.3,0,39.8,0,39.8V0h1000v36.5c0,0-28.2-18.5-92.1-18.5C810.2,18.1,775.7,67.3,734,67.3z"></path>
            <path class="waves_color_fill" d="M766.1,28.9c-200-57.5-266,65.5-395.1,19.5C242,1.8,242,5.4,184.8,20.6C128,35.8,132.3,44.9,89.9,52.5C28.6,63.7,0,0,0,0 h1000c0,0-9.9,40.9-83.6,48.1S829.6,47,766.1,28.9z"></path>
        </svg>
    </div>
    
</footer>


<div class="body_overlay">
    <div class="inner_box">
        <div class="request_overlay_box">
            <div class="form_wrapper">
                <div class="heading">Book</div>
                <form class="booking_form" action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-sm-6">
                        <div class="input_box">
                            <div class="error form_error form-error-fname"></div>
                            <input type="text" name="fname" placeholder="First Name">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="input_box">
                            <div class="error form_error form-error-lname"></div>
                            <input type="text" name="lname" placeholder="Last Name">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="input_box">
                            <div class="error form_error form-error-phone"></div>
                            <input type="text" name="phone" placeholder="Phone">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="input_box">
                            <div class="error form_error form-error-email"></div>
                            <input type="text" name="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="col-sm-12 textarea_box">
                        <div class="input_box">
                            <div class="error form_error form-error-address"></div>
                            <textarea name="address" placeholder="Address"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="input_box">
                            <label><b>Services</b> (Multiple selection allowed)</label>
                            <div class="error form_error form-error-services"></div>
                            <!-- <select name="services[]" class="services">
                                <option value="">Select Service</option> -->
                                @if(!empty($subCategories) && count($subCategories) > 0)
                                    <select name="services[]" multiple>
                                        @foreach($subCategories as $subCategory)
                                            @if(!empty($subCategory->services) && count($subCategory->services) > 0)
                                                <optgroup label="{{$subCategory->title}}">
                                                    @foreach($subCategory->services as $service)
                                                        <option value="{{$service->id}}">{{$service->title}}</option>
                                                    @endforeach
                                                </optgroup>
                                            @endif
                                        @endforeach
                                    </select>
                                @endif
                            <!-- </select> -->
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="input_box">
                            <label><b>Package</b></label>
                            <div class="error form_error form-error-package_id"></div>
                                @if(!empty($packages) && count($packages) > 0)
                                    <select name="package_id">
                                        <option value="">Select Package</option>
                                        @foreach($packages as $package)
                                            <option value="{{$package->id}}">{{$package->title}}</option>
                                        @endforeach
                                    </select>
                                @endif
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="input_box">
                            <div class="error form_error form-error-booking_date"></div>
                            <input type="text" name="booking_date" placeholder="Booking Date" class="future_datepicker">
                        </div>
                    </div>
                    <div class="col-sm-6 slot_box">
                        <div class="input_box">
                            <div class="error form_error form-error-slot_id"></div>
                            <select name="slot_id">
                                <option value="">Select Time Slot</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 submit_box">
                        <div class="input_box center">
                            <div class="error form_error form-error-all_errors all_errors"></div>
                            <button type="submit" class="pink_btn">submit</button>
                        </div>
                    </div>
                    <div class="clr"></div>
                </form>
            </div>
             <a class="close_overlay"></a>
        </div>
    </div>
</div>
<!-- body_overlay -->

<!-- Select Search JavaScript -->
<script src="{{ asset('admin/assets/plugins/selects_search/select2.min.js') }}"></script>
<script>
$(document).ready(function(){
    $("select").select2();
});
</script>

<script>
$(document).ready(function () {    

    $(".request_callback").on('click', function(){
        $(".body_overlay").fadeIn();
    });
    $(".close_overlay").on('click', function(){
        $(".body_overlay").fadeOut();
    });
    $(".body_overlay").on('click', function(event){
        if (!$(event.target).closest('.request_overlay_box').length) {
            $(".body_overlay").fadeOut();
        }
    });

    $(".booking_form").on('submit',(function(e){
        $this = $(this);
        e.preventDefault();
        $(".form_error").html("");
        $(".form_error").removeClass("alert alert-danger");

        $.ajax({
            type: "POST",
            url: "{{ route('booking.store') }}",
            data:  new FormData(this),
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            success: function(result) {
                location.href="{{ route('booking.thank-you') }}";
            },
            error: function(data){
                if (data.status === 422) {
                    let errors = data.responseJSON.errors;
                    $.each(errors, function (key, message) {
                        var fieldName = key.replace(/\./g, '-');
                        $this.find(".form-error-"+fieldName).html(message);
                        $this.find(".form-error-"+fieldName).addClass('alert alert-danger');
                        // $('#form-error-' + key).html(message).addClass('alert alert-danger');
                    });
                } else if (data.status === 401) {
                    alert("Please log in.");
                    // window.location.href = "/login";
                } else if (data.status === 403) {
                    alert("You don’t have permission.");
                } else if (data.status === 404) {
                    alert("The resource was not found.");
                } else if (data.status === 500) {
                    alert("Something went wrong on the server.");
                    console.log(data.console_message);
                } else {
                    alert("Unexpected error: " + data.status);
                    console.log(data);
                }
            }
        });

    }));

    // Event listener for changes in both start and end input fields
    $('[name=booking_date]').on('change', function() {
        updateTimeSlots();
    });

    function updateTimeSlots() {

        const booking_date = $('[name=booking_date]').val();

        $.ajax({
            type: "POST",
            url: "{{ route('get-time-slots') }}",
            data: {"_token":"{{ csrf_token() }}", "booking_date":booking_date},
            dataType: 'json',
            success: function(result) {
                console.log(result.slots);
                $timeSlot = $("[name=slot_id]");
                $timeSlot.find("option").remove();
                $timeSlot.append('<option value="">Select Time Slot</option>');
                if (result.slots.length === 0) {
                    $timeSlot.append('<option value="">No slots available select another date</option>');
                    return; // Stop here, do NOT run the loop
                }else{
                    jQuery.each( result.slots, function( i, val ) {
                        $timeSlot.append('<option value="'+val['id']+'" ' + (val['is_booked'] ? 'disabled' : '') + '>'+val['start_time']+' - '+val['end_time'] + (val['is_booked'] ? ' - Booked' : '') +'</option>');
                    });
                }
            },
            error: function(data){
            }
        });

    }
});
</script>


<!--sticky header-->
<!-- <script src="{{ asset('front/js/classie.js') }}"></script>
<script>
function init() {
window.addEventListener('scroll', function(e){
  var distanceY = window.pageYOffset || document.documentElement.scrollTop,
  shrinkOn = 50,
  header = document.querySelector("header");
  if (distanceY > shrinkOn) {
  classie.add(header,"smaller");
  } else {
  if (classie.has(header,"smaller")) {
    classie.remove(header,"smaller");
  }
  }
});
}
window.onload = init();
</script> -->
<script src="{{ asset('front/js/common.js') }}"></script>
<script src="{{ asset('front/js/jquery.easing.1.3.js') }}"></script>


<script src="{{ asset('front/js/ace-responsive-menu.js') }}"></script>
<script>
$(document).ready(function () {
    $("#respMenu").aceResponsiveMenu({
        resizeWidth: '768', // Set the same in Media query       
        animationSpeed: 'fast', //slow, medium, fast
        accoridonExpAll: false //Expands all the accordion menu on click
    });
});
</script>

<script src="{{ asset('front/plugins/venobox/venobox.min.js') }}"></script>
<script>
$(document).ready(function(){
    new VenoBox({
        selector: '.new_veno',
        // numeration: true,
        // infinigall: true,
        // share: true,
        // spinner: 'rotating-plane'
    });
});
</script>

<script src="{{ asset('front/js/wow.min.js') }}"></script>
<script>
new WOW().init();
</script>


<script>
$(document).ready(function() {
    $('.our_experts_section .boxes')
    .on('mouseenter', function() {
        $(this).find('.text_box').slideDown();
        // $(this).find('p').fadeIn();
    })
    .on('mouseleave', function() {
        $(this).find('.text_box').slideUp();
        // console.log('Out');
    });
});
</script>


<!--slider-->
<script src="{{ asset('front/plugins/owl-carousel/owl.carousel.js') }}"></script>
<script src="{{ asset('front/plugins/owl-carousel/owl-content-animation.js') }}"></script>


<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('admin/assets/js/bootstrap.min.js') }}"></script>
<!--Start calender -->
<script src="{{ asset('admin/assets/js/bootstrap-datetimepicker.js') }}"></script>
<script type="text/javascript">

    $('.future_datepicker').datetimepicker({
        startDate: new Date(),
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0,
        format: 'yyyy-mm-dd'
    });
  
</script>
<!-- End calender -->

</body>
</html>