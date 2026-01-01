@extends('admin.layout.master')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="page-header my_style">
                <div class="left_section">
                    <h1 class="">Add New Time Slot</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li><a href="{{ route('admin.time-slots.index') }}">Time Slots</a></li>
                    </ul>    
                </div>
                
                <div class="right_section">
                    <div class="blue_filled_btn">
                        <a href="{{ url()->previous() }}">Back</a>
                    </div>
                </div>
            </div>                    
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <div class="row">

            <div class="my_panel form_box">
                
                @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                @endif
                @if(Session::has('error'))
                    <div class="alert alert-danger">{{Session::get('error')}}</div>
                @endif
                
                <form id="data_form" action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="page-header my_style less_margin">
                    <div class="left_section">
                        <div class="title_text">
                            <div class="title">Please fillup the form </div>
                            <!-- <div class="sub_title">Add New time-slots</div> -->
                        </div>
                    </div>
                    <div class="right_section">
                        <!-- <div class="purple_filled_btn">
                            <a href="#">Save</a>
                        </div> -->
                    </div>
                </div>

                <div class="inner_boxes">
                    <div class="input_boxes">
                        <div class="col-sm-12">
                            <div class="input_box">
                                <label>Start Time</label>
                                <div class="error form_error" id="form-error-start_time"></div>
                                <input type="text" name="start_time" placeholder="Start Time*" class="future_timepicker" readonly>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="input_box">
                                <label>End Time</label>
                                <div class="error form_error" id="form-error-end_time"></div>
                                <input type="text" name="end_time" placeholder="End Time*" class="future_timepicker" readonly>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="input_box">
                                <label>Status</label>
                                <div class="error form_error" id="form-error-is_active"></div>
                                <select name="is_active">
                                    <option value="">Select Status</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="clr"></div>
                    </div>

                    <div class="input_boxes">
                        <div class="col-sm-4">
                            <div class="input_box">
                                <input type="submit" name="submit" id="submit" value="Save" class="btn btn-primary">
                            </div>
                        </div>
                        <div class="clr"></div>
                    </div>

                </div>
                </form>
            </div>

    </div>
    <!-- /.row -->


<script type="text/javascript">
$(document).ready(function() {

    $("#data_form").on('submit',(function(e){
        e.preventDefault();

        $(".form_error").html("");
        $(".form_error").removeClass("alert alert-danger");

        // if(confirm('Are you sure you want to Create Category?')){
            $.ajax({
                type: "POST",
                url: "{{ route('admin.time-slots.store') }}",
                data:  new FormData(this),
                dataType: 'json',
                cache: false,
                contentType: false,
                processData: false,
                success: function(result) {
                    location.href="{{ route('admin.time-slots.index') }}";
                },
                error: function(data){
                    var responseData = data.responseJSON;        
                    if(responseData.error_type=='form'){
                        jQuery.each( responseData.errors, function( i, val ) {
                            $("#form-error-"+i).html(val);
                            $("#form-error-"+i).addClass('alert alert-danger');
                        });
                    }else{
                        // window.location.reload(true);
                    }
                }
            });
        // }

    }));

});
</script>
            
@endsection    