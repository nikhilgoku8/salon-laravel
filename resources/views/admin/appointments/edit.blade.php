@extends('admin.layout.master')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="page-header my_style">
                <div class="left_section">
                    <h1 class="">Edit Appointment</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li><a href="{{ route('admin.appointments.index') }}">Appointments</a></li>
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
                            <div class="col-sm-4">
                                <div class="input_box">
                                    <label>Patient Name</label>
                                    <input type="text" name="" value="{{ $result->patient_name }}" readonly disabled>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="input_box">
                                    <label>Patient Email</label>
                                    <input type="text" name="" value="{{ $result->patient_email }}" readonly disabled>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="input_box">
                                    <label>Patient Phone</label>
                                    <input type="text" name="" value="{{ $result->patient_phone }}" readonly disabled>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="input_box">
                                    <label>Appointment Date</label>
                                    <input type="text" name="" value="{{ $result->appointment_date }}" readonly disabled>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="input_box">
                                    <label>Specialization</label>
                                    <input type="text" name="" value="{{ $result->specialization->title }}" readonly disabled>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="input_box">
                                    <label>Doctor</label>
                                    <input type="text" name="" value="{{ $result->doctor->name }}" readonly disabled>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="input_box">
                                    <label>Time Slot</label>
                                    <input type="text" name="" value="{{ $result->timeSlot->start_time }} - {{ $result->timeSlot->end_time }}" readonly disabled>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="input_box">
                                    <label>Patient Message</label>
                                    <textarea readonly disabled>{{ $result->patient_message }}</textarea>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="input_box">
                                    <label>Doctor Remarks</label>
                                    <div class="error form_error" id="form-error-doctor_remarks"></div>
                                    <textarea name="doctor_remarks" placeholder="Doctor Remarks*">{{ $result->doctor_remarks ?? '' }}</textarea>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="input_box">
                                    <label>Status</label>
                                    <div class="error form_error" id="form-error-status"></div>
                                    <select name="status">
                                        <option value="">Select Status</option>
                                        <option value="pending" @selected( $result->status == 'pending')>Pending</option>
                                        <option value="confirmed" @selected( $result->status == 'confirmed')>Confirmed</option>
                                        <option value="cancelled" @selected( $result->status == 'cancelled')>Cancelled</option>
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

    $("#data_form").on('submit',(function(e){
        e.preventDefault();

        $(".form_error").html("");
        $(".form_error").removeClass("alert alert-danger");

        // let formData = new FormData(this);
        // formData.append('_method','PUT');

        $.ajax({
            type: "POST",
            url: "{{ route('admin.appointments.update', $result->id) }}",
            data:  new FormData(this),
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            success: function(result) {
                // location.href="{{ route('admin.appointments.index') }}";
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