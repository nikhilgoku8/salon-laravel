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
                <form id="data_form" action="" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="dataID" value="{{ $result->id }}">
                <div class="page-header my_style less_margin">
                    <div class="left_section">
                        <div class="title_text">
                            <div class="title">Edit Package</div>
                            <div class="sub_title">Please fillup the form </div>
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
                                <label>Package Name</label>
                                <div class="error form_error" id="form-error-title"></div>
                                <input type="text" name="title" placeholder="Title" value="{{ $result->title }}">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="input_box">
                                <label>Description</label>
                                <div class="error form_error" id="form-error-description"></div>
                                <textarea name="description">{{ $result->description }}</textarea>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input_box">
                                <label>Price</label>
                                <div class="error form_error" id="form-error-price"></div>
                                <input type="number" min="1" name="price" placeholder="Price" value="{{ $result->price }}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input_box">
                                <label>Sort Order</label>
                                <div class="error form_error" id="form-error-sort_order"></div>
                                <input type="number" min="0" name="sort_order" placeholder="Sort Order" value="{{ $result->sort_order }}">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="input_box">
                                <label>Services</label>
                                <div class="error form_error" id="form-error-services"></div>
                                @if(!empty($subCategories) && count($subCategories) > 0)
                                <select name="services[]" multiple>
                                    @foreach($subCategories as $subCategory)
                                        @if(!empty($subCategory->services) && count($subCategory->services) > 0)
                                            <optgroup label="{{$subCategory->title}}">
                                                @foreach($subCategory->services as $service)
                                                    <option value="{{$service->id}}" @selected(in_array($service->id, $result->services->pluck('id')->toArray() ))>{{$service->title}}</option>
                                                @endforeach
                                            </optgroup>
                                        @endif
                                    @endforeach
                                </select>
                                @endif
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

        var formData = new FormData(this);
        formData.append('_method', 'PUT'); // <-- This is important!

        $.ajax({
            type: "POST",
            url: "{{ route('admin.packages.update', $result->id) }}",
            data:  formData,
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            success: function(result) {
                location.href="{{ route('admin.packages.index') }}";
            },
            error: function(data){
                var responseData = data.responseJSON;        
                if(responseData.error_type=='form'){
                    jQuery.each( responseData.errors, function( i, val ) {
                        $("#form-error-"+i).html(val);
                        $("#form-error-"+i).addClass('alert alert-danger');
                    });
                }
            }
        });

    }));

});
</script>
            
@endsection    