@extends('admin.layout.master')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="page-header my_style">
                <div class="left_section">
                    <h1 class="">Edit Blog Post - {{ $result->title }}</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li><a href="{{ route('admin.blog-posts.index') }}">Blog Posts</a></li>
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
                                    <label>Category</label>
                                    <div class="error form_error" id="form-error-category_id"></div>
                                    @if(!empty($categories))
                                        <select name="category_id">
                                            <option value="">Select Category</option>                                    
                                            @foreach($categories as $row)
                                                <option value="{{ $row->id }}" @selected( $result->category_id == $row->id)>{{ $row->title }}</option>
                                            @endforeach                                    
                                        </select>
                                    @else
                                        Create a Blog Category First
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="input_box">
                                    <label>Blog Title</label>
                                    <div class="error form_error" id="form-error-title"></div>
                                    <input type="text" name="title" placeholder="Blog Title*" value="{{ $result->title }}">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="input_box">
                                    <label>Description</label>
                                    <div class="error form_error" id="form-error-description"></div>
                                    <textarea name="description" placeholder="Description*" class="toolbar">{{ $result->description }}</textarea>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="input_box">
                                    <label>Blog Date</label>
                                    <div class="error form_error" id="form-error-blog_date"></div>
                                    <input type="text" name="blog_date" placeholder="Blog Date*" class="datepicker" value="{{ $result->blog_date }}">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="input_box">
                                    <label>Image (800px x 600px)</label>
                                    <div class="error form_error form-error-image_file"></div>
                                    <div class="existing_file_wrapper">
                                        To replace <a href="{{ asset('uploads/blogs/'.$result->image_file) }}" target="_blank"><img src="{{ asset('uploads/blogs/'.$result->image_file) }}" width="50px">Existing Image</a> select below<br><br>
                                    </div>
                                    <input type="hidden" name="existing_image_file" value="{{ $result->image_file }}">
                                    <input type="file" name="image_file">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="input_box">
                                    <label>Meta Title</label>
                                    <div class="error form_error" id="form-error-meta_title"></div>
                                    <input type="text" name="meta_title" placeholder="Meta Title*" value="{{ $result->meta_title }}">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="input_box">
                                    <label>Meta Description</label>
                                    <div class="error form_error" id="form-error-meta_description"></div>
                                    <input type="text" name="meta_description" placeholder="Meta Description*" value="{{ $result->meta_description }}">
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

        let formData = new FormData(this);
        formData.append('_method','PUT');

        $.ajax({
            type: "POST",
            url: "{{ route('admin.blog-posts.update', $result->id) }}",
            data:  formData,
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            success: function(result) {
                // location.href="{{ route('admin.blog-posts.index') }}";
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