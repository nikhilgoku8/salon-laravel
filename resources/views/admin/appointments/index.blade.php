@extends('admin.layout.master')

@section('content')   
    <div class="row">
        <div class="col-lg-12">
            <div class="page-header my_style">
                <div class="left_section">
                    <h1 class="">Appointments</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li><a href="{{ route('admin.appointments.index') }}">Appointments</a></li>
                    </ul>    
                </div>
                
                <div class="right_section">
                    <div class="purple_hollow_btn">
                        <!-- <a href="@{{ route('admin.appointments.create') }}">Add New</a> -->
                    </div>
                    <!-- <div class="orange_hollow_btn">
                        <a id="filter_option">Filter</a>
                    </div>
                    <div class="blue_filled_btn">
                        <a id="export_option">Export</a>
                    </div> -->
                </div>
            </div>                    
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="fourth_row">
            
            <div class="my_panel">
                
                @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                @endif
                @if(Session::has('error'))
                    <div class="alert alert-danger">{{Session::get('error')}}</div>
                @endif


                <div class="upper_sec">
                    <div class="left_section">
                        <div class="title">All Appointments</div>
                        <div class="sub_title"> </div>
                    </div>
                    <div class="right_section">
                        <div class="orange_filled_btn">
                            <a id="delete_records">Delete</a>
                        </div>
                    </div>
                </div>
                <div class="details_table">
                    <table>
                        <tbody>
                            <tr>
                                <th class="col-sm-">Name</th>
                                <th class="col-sm-">Email</th>
                                <th class="col-sm-">Phone</th>
                                <th class="col-sm- center">Appointment<br>Date</th>
                                <th class="col-sm-">Specialization</th>
                                <th class="col-sm-">Doctor</th>
                                <th class="col-sm-">Time Slot</th>
                                <th class="col-sm-">Status</th>
                                <!-- <th class="col-sm-">Created</th>
                                <th class="col-sm-">Updated</th> -->
                                <th class="col-sm- center">ACTION</th>
                            </tr>
                            @if(!empty($result) && count($result) > 0)
                                @foreach($result as $row)
                                    <tr>
                                        <td>{{ $row->patient_name }}</td>
                                        <td>{{ $row->patient_email }}</td>
                                        <td>{{ $row->patient_phone }}</td>
                                        <td>{{ $row->appointment_date }}</td>
                                        <td>{{ $row->specialization->title ?? $row->specialization_name }}</td>
                                        <td>{{ $row->doctor->name ?? $row->doctor_name }}</td>
                                        <td>{{ $row->timeSlot->start_time ?? $row->start_time }} - {{ $row->timeSlot->end_time ?? $row->end_time }}</td>
                                        <td>{{ strtoupper($row->status) }}</td>
                                        <!-- <td>
                                            @if(!empty($row->created_at))
                                                {{ date('d-M-Y H:i:s', strtotime($row->created_at)) }}
                                            @endif
                                        </td>                                
                                        <td>
                                            @if(!empty($row->updated_at))
                                                {{ date('d-M-Y H:i:s', strtotime($row->updated_at)) }}
                                            @endif
                                        </td> -->
                                        <td class="center">
                                            <a href="{{ route('admin.appointments.edit', $row->id) }}" class="edit_details">Edit</a>
                                            <!-- <br> -->
                                            <!-- <span class="checkbox">
                                                <input name="dataID" class="styled" type="checkbox" value="{{ $row->id }}">
                                                <label for="checkbox1"></label>
                                            </span> -->
                                            
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="9" class="no_records"> No records </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="table_pagination">
                    {{ $result->links() }}
                    <div class="clr"></div>
                </div>
            </div>

        </div>
        <!-- fourth_row end -->
    </div>
    <!-- /.row --> 

@endsection            