@extends('admin.layout.master')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="page-header my_style">
                <div class="left_section">
                    <h1 class="">Add New Blog Post</h1>
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
                <div class="page-header my_style less_margin">
                    <div class="left_section">
                        <div class="title_text">
                            <div class="title">Please fillup the form </div>
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
                                <label>Blog Category</label>
                                <div class="error form_error" id="form-error-category_id"></div>
                                @if(!empty($categories))
                                <select name="category_id">
                                    <option value="">Select Category</option>                                    
                                    @foreach($categories as $row)
                                        <option value="{{ $row->id }}">{{ $row->title }}</option>
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
                                <input type="text" name="title" placeholder="Blog Title*">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="input_box">
                                <label>Description</label>
                                <div class="error form_error" id="form-error-description"></div>
                                <textarea name="description" placeholder="Description*" class="toolbar"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="input_box">
                                <label>Blog Date</label>
                                <div class="error form_error" id="form-error-blog_date"></div>
                                <input type="text" name="blog_date" class="datepicker" placeholder="Blog Date*">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="input_box">
                                <label>Image (800px x 600px)</label>
                                <div class="error form_error" id="form-error-image_file"></div>
                                <input type="file" name="image_file">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="input_box">
                                <label>Meta Title</label>
                                <div class="error form_error" id="form-error-meta_title"></div>
                                <input type="text" name="meta_title" placeholder="Meta Title*">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="input_box">
                                <label>Meta Description</label>
                                <div class="error form_error" id="form-error-meta_description"></div>
                                <input type="text" name="meta_description" placeholder="Meta Description*">
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
                url: "{{ route('admin.blog-posts.store') }}",
                data:  new FormData(this),
                dataType: 'json',
                cache: false,
                contentType: false,
                processData: false,
                success: function(result) {
                    location.href="{{ route('admin.blog-posts.index') }}";
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