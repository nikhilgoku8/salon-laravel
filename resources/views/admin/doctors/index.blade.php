@extends('admin.layout.master')

@section('content')   
    <div class="row">
        <div class="col-lg-12">
            <div class="page-header my_style">
                <div class="left_section">
                    <h1 class="">Doctors</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li><a href="{{ route('admin.doctors.index') }}">Doctors</a></li>
                    </ul>    
                </div>
                
                <div class="right_section">
                    <div class="purple_hollow_btn">
                        <a href="{{ route('admin.doctors.create') }}">Add New</a>
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
                        <div class="title">All Doctors</div>
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
                                <th class="col-sm-3">Doctor Name</th>
                                <th class="col-sm-4">Specialization</th>
                                <th class="col-sm-1">Status</th>
                                <th class="col-sm-1">Created at</th>
                                <th class="col-sm-1">Updated at</th>
                                <th class="col-sm-2 center">ACTION</th>
                            </tr>
                            @if(!empty($result) && count($result) > 0)
                                @foreach($result as $row)
                                    <tr>
                                        <td>{{ $row->name }}</td>
                                        <td>
                                            @if(!empty($row->specializations) && count($row->specializations) > 0)
                                                <ul>
                                                    @foreach($row->specializations as $specialization)
                                                        <li>{{ $specialization->title }}</li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </td>
                                        <td>{{ $row->is_active ? 'Active' : 'Inactive' }}</td>
                                        <td>
                                            @if(!empty($row->created_at))
                                                {{ date('d-M-Y H:i:s', strtotime($row->created_at)) }}
                                            @endif
                                        </td>                                
                                        <td>
                                            @if(!empty($row->updated_at))
                                                {{ date('d-M-Y H:i:s', strtotime($row->updated_at)) }}
                                            @endif
                                        </td>
                                        <td class="center">
                                            <a href="{{ route('admin.doctors.edit', $row->id) }}" class="edit_details">Edit</a>
                                            <!-- <br> -->
                                            <span class="checkbox">
                                                <input name="dataID" class="styled" type="checkbox" value="{{ $row->id }}">
                                                <label for="checkbox1"></label>
                                            </span>
                                            
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

<script type="text/javascript">
$(document).ready(function() {

  $("#delete_records").on('click',(function(e){
    e.preventDefault();

    var dataID = [];
    $.each($("input[name='dataID']:checked"), function(){            
        dataID.push($(this).val());
    });

    if(dataID.length == 0){
        alert('No records are selected');
    }else{
        if (confirm('Are you sure you want to delete these?')) {
            $.ajax({
                type: "POST",
                url: "{{ route('admin.doctors.bulk-delete') }}",
                data: {"_token":"{{ csrf_token() }}", "dataID":dataID},
                dataType: 'json',
                success: function(response) {
                    window.location.reload(true);
                }
            });
        }
    }
    
    

  }));

});
</script>

@endsection            