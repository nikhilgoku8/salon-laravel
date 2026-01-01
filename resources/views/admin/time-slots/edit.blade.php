@extends('admin.layout.master')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="page-header my_style">
                <div class="left_section">
                    <h1 class="">Edit Time Slot</h1>
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
                    <input type="hidden" name="dataID" value="{{ $result->id }}">
                    <div class="inner_boxes">
                        <div class="input_boxes">
                            <div class="col-sm-12">
                                <div class="input_box">
                                    <label>Start Time</label>
                                    <div class="error form_error" id="form-error-start_time"></div>
                                    <input type="text" name="start_time" placeholder="Start Time*" class="future_timepicker" value="{{ date('Y-m-d') .' '. \Carbon\Carbon::createFromFormat('H:i:s', $result->start_time)->format('H:i') }}" readonly>
                                    <!-- <input type="text" name="start_time" placeholder="Start Time*" class="future_timepicker" value="{{ \Carbon\Carbon::createFromFormat('H:i:s', $result->start_time)->format('H:i') }}" readonly> -->
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="input_box">
                                    <label>End Time</label>
                                    <div class="error form_error" id="form-error-end_time"></div>
                                    <!-- <input type="text" name="end_time" placeholder="End Time*" class="future_timepicker" value="{{ date('Y-m-d') .' '. \Carbon\Carbon::createFromFormat('H:i:s', $result->end_time)->format('H:i') }}" readonly> -->
                                    <input type="text" name="end_time" placeholder="End Time*" class="future_timepicker" value="{{ \Carbon\Carbon::createFromFormat('H:i:s', $result->end_time)->format('H:i') }}" readonly>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="input_box">
                                    <label>Status</label>
                                    <div class="error form_error" id="form-error-is_active"></div>
                                    <select name="is_active">
                                        <option value="">Select Status</option>
                                        <option value="1" @selected( $result->is_active == 1)>Active</option>
                                        <option value="0" @selected( $result->is_active == 0)>Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="input_box">
                                    <input type="submit" name="submit" id="submit" value="Save" class="btn btn-primary">
                                </div>
                            </div>
                            <div class="clr"></div>
                        </div>
                    </div>
                </form>

        </div>
        <!-- my_panel -->
    </div>
    <!-- /.row -->

<script type="text/javascript">
$(document).ready(function() {

    $('.future_timepicker').each(function () {
        let input = $(this);

        input.on('hide', function () {
            setTimeout(() => {
                input[0].blur();
            }, 20);
        });

        setTimeout(() => {
            input.focus();
            setTimeout(() => {
                input.datetimepicker('show');
                setTimeout(() => {
                    input.datetimepicker('hide');
                }, 50);
            }, 50);
        }, 200);
    });


    $("#data_form").on('submit',(function(e){
        e.preventDefault();

        $(".form_error").html("");
        $(".form_error").removeClass("alert alert-danger");

        let formData = new FormData(this);
        formData.append('_method','PUT');

        $.ajax({
            type: "POST",
            url: "{{ route('admin.time-slots.update', $result->id) }}",
            data:  formData,
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            success: function(result) {
                // location.href="{{ route('admin.time-slots.index') }}";
                window.location.reload(true);
            },
            error: function(data){
                var responseData = data.responseJSON;
                // if(responseData.error_type=='form'){
                    if (data.status === 422) {
                        let errors = data.responseJSON.errors;
                        $.each(errors, function (key, message) {
                            $('#form-error-' + key).html(message).addClass('alert alert-danger');
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
                // }else{
                //     window.location.reload(true);
                // }
            }
        });
    }));

});
</script>
            
@endsection    