@extends('admin.layout.master')

@section('content')   
    <div class="row">
        <div class="col-lg-12">
            <div class="page-header my_style">
                <div class="left_section">
                    <h1 class="">Packages</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li><a href="{{ route('admin.packages.index') }}">Packages</a></li>
                    </ul>    
                </div>
                
                <div class="right_section">
                    <div class="purple_hollow_btn">
                        <a href="{{ route('admin.packages.create'); }}">Add New</a>
                    </div>
                    <!-- <div class="orange_hollow_btn">
                        <a id="filter_option">Filter</a>
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
                        <div class="title">Packages Data</div>
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
                                <th>Packages</th>
                                <th>Services</th>
                                <th>Price</th>
                                <th>Sort Order</th>
                                <th class="action">ACTION</th>
                            </tr>
                            @if(!empty($result))
                                @foreach ($result as $row)
                                    <tr>
                                        <td>{{ $row->title }}</td>
                                        <td>
                                            <!-- @if(!empty($row->services) && count($row->services) > 0)
                                                <ul>
                                                    @foreach($row->services as $service)
                                                        <li>{{ $service->subCategory->title }} - {{ $service->title }} - {{ $service->price }}</li>
                                                    @endforeach
                                                </ul>
                                            @endif -->
                                            @if(!empty($row->services) && count($row->services) > 0)
                                                <table>
                                                    <tr>
                                                        <td>Sub Category</td>
                                                        <td>Service</td>
                                                        <td>Price</td>
                                                    </tr>
                                                    @foreach($row->services as $service)
                                                        <tr>
                                                            <td>{{ $service->subCategory->title }}</td>
                                                            <td>{{ $service->title }}</td>
                                                            <td>{{ $service->price }}</td>
                                                        </tr>
                                                    @endforeach
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td>{{ $row->services->sum('price') }}</td>
                                                    </tr>
                                                </table>
                                            @endif
                                        </td>
                                        <td>{{ $row->price }}</td>
                                        <td>{{ $row->sort_order }}</td>
                                        <td class="action">
                                            <a href="{{ route('admin.packages.edit', $row->id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                            <span class="checkbox">
                                                <input name="dataID" class="styled" type="checkbox" value="{{ $row->id }}">
                                                <label for="checkbox1"></label>
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                @if (method_exists($result, 'links'))
                <div class="table_pagination">
                    {{ $result->links() }}
                    <div class="clr"></div>
                </div>
                @endif
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
        if (confirm('Are you sure you want to delete these records?')) {
            $.ajax({
                type: "POST",
                url: "{{ route('admin.packages.bulk-delete') }}",
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