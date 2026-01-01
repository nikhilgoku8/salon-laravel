
<script src="{{ asset('admin/assets/js/custom.js') }}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('admin/assets/js/bootstrap.min.js') }}"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="{{ asset('admin/assets/js/metisMenu.min.js') }}"></script>

<!-- Custom Theme JavaScript -->
<script src="{{ asset('admin/assets/js/sb-admin-2.js') }}"></script>

<!-- Select Search JavaScript -->
<script src="{{ asset('admin/assets/plugins/selects_search/select2.min.js') }}"></script>
<script>
$(document).ready(function(){
    
    //$(".selSearch").select2();
    $("select").select2();

    // Read selected option
    // $('#but_read').click(function(){
    //     var username = $('#selUser option:selected').text();
    //     var userid = $('#selUser').val();
   
    //     $('#result').html("id : " + userid + ", name : " + username);
    // });
});
</script>

<script src="{{ asset('admin/assets/plugins/chart/d3.v4.min.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/chart/jquery.bar.chart.min.js') }}"></script>

<!--Textarea Toolbar-->
<script type="text/javascript" src="{{ asset('admin/assets/js/tinymce/tinymce.min.js') }}"></script>
<script>
tinymce.init({
    selector: "textarea.toolbar",
    menubar:false,
    statusbar: false,
    theme: "modern",
    height: 200,
    plugins: [

         "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
         "save table contextmenu directionality emoticons template paste textcolor"
   ],
   content_css: "css/content.css",
   toolbar: "insertfile undo redo | styleselect | bold italic | bullist numlist | link image code | forecolor backcolor", 
   style_formats: [
        {title: 'Bold text', inline: 'b'},
        {title: 'H1', block: 'h1'},
        {title: 'H2', block: 'h2'},
        {title: 'H3', block: 'h3'},
        {title: 'H4', block: 'h4'},
        {title: 'H5', block: 'h5'},
        {title: 'H6', block: 'h6'},
        {title: 'Table styles'},
        {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
    ]
 }); 

</script>

<!--Start calender -->
<script src="{{ asset('admin/assets/js/bootstrap-datetimepicker.js') }}"></script>
<script type="text/javascript">  
    $('.datepicker').datetimepicker({
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0,
        format: 'yyyy-mm-dd'
    });

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

    var start_date = new Date();
    start_date.setDate(start_date.getDate() + 3);
    $('.appointment_datepicker').datetimepicker({
        //startDate: start_date,
        startDate:new Date(),
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0,
        format: 'yyyy-mm-dd',
        daysOfWeekDisabled: [0]
    });

    $('.future_timepicker').datetimepicker({
        weekStart: 1,
        autoclose: 1,
        todayHighlight: 0,
        startView: 1,    // start with hour view
        minView: 0,      // allow minutes selection
        maxView: 1,      // prevent switching to date view
        format: 'hh:ii', // 24-hour time (HH:MM)
        minuteStep: 15,  // 15 minutes interval
        initialDate: new Date(0, 0, 0, 0, 0, 0),  // Avoid invalid internal date
        showMeridian: false // 24-hour format
    }).on('show', function () {
        var picker = $(this).data('datetimepicker');
        if (picker && !picker.date) {
            // set some dummy base date so getTime() works
            picker.setDate(new Date(1970, 0, 1, 0, 0, 0));
        }
    });
  
</script>
<!-- End calender -->

<!-- Custom Js -->
<script type="text/javascript">
    function patientsFilters(){
        document.getElementById("filter_box").classList.toggle("show");
    }
</script>