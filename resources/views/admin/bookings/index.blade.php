@extends('admin.layout.master')

@section('content')   
    <div class="row">
        <div class="col-lg-12">
            <div class="page-header my_style">
                <div class="left_section">
                    <h1 class="">Bookings</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li><a href="{{ route('admin.bookings.index') }}">Bookings</a></li>
                    </ul>    
                </div>
                
                <div class="right_section">
                    <div class="purple_hollow_btn">
                        <!-- <a href="@{{ route('admin.bookings.create') }}">Add New</a> -->
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
                        <div class="title">All Bookings</div>
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
                                <th class="col-sm-2">User Info</th>
                                <!-- <th class="col-sm-">Email</th>
                                <th class="col-sm-">Phone</th> -->
                                <th class="col-sm-2">Address</th>
                                <th class="col-sm-1 center">Booking<br> Date</th>
                                <th class="col-sm-2">Package</th>
                                <th class="col-sm-2">Services</th>
                                <th class="col-sm-1">Total Price</th>
                                <th class="col-sm-">Time Slot</th>
                                <th class="col-sm-">Status</th>
                                <th class="col-sm- center">ACTION</th>
                            </tr>
                            @if(!empty($result) && count($result) > 0)
                                @foreach($result as $row)
                                    <tr>
                                        <td>
                                            {{ $row->fname.' '.$row->lname }}
                                            <br>
                                            {{ $row->email }}
                                            <br>
                                            {{ $row->phone }}
                                        </td>
                                        <!-- <td></td>
                                        <td></td> -->
                                        <td>{!! $row->address !!}</td>
                                        <!-- <td>{{ $row->booking_date }}</td> -->
                                        <td style="white-space: nowrap;">{{ \Carbon\Carbon::parse($row->timeSlot->booking_date)->format('d-m-Y') }}</td>
                                        <td>{{ $row->package?->title ?? $row->package_title }}</td>
                                        <td>
                                            @if(!empty($row->bookingServices) && count($row->bookingServices) > 0)
                                                <ul style="padding: 0 0 0 14px;">
                                                    @foreach($row->bookingServices as $bookingService)
                                                        <li>
                                                            {{ $bookingService->service->title }}
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </td>
                                        <td>{{ $row->total_price }}</td>
                                        <td>{{ \Carbon\Carbon::parse($row->timeSlot->start_time ?? $row->start_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($row->timeSlot->end_time ?? $row->end_time)->format('H:i') }}</td>
                                        <td style="white-space: nowrap;" class="{{ strtolower($row->status) }}">{{ strtoupper($row->status) }}</td>
                                        <td class="center">
                                            <a href="{{ route('admin.bookings.edit', $row->id) }}" class="edit_details" style="white-space: nowrap;">Edit</a>
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
                                    <td colspan="10" class="no_records"> No records </td>
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