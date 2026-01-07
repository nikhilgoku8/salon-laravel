@extends('admin.layout.master')

@section('content')     

    <div class="row">
        <div class="col-lg-12">
            <div class="page-header my_style">
                <div class="left_section">
                    <h1 class="">Services</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li><a href="{{ route('admin.services.index') }}">Services</a></li>
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
                                <div class="title">Edit Service</div>
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
                            <div class="col-sm-6">
                                <div class="input_box">
                                    <label>Category</label>
                                    <div class="error form_error" id="form-error-category_id"></div>
                                    <select name="category_id">
                                        <option value="">Select Category</option>
                                        @if(!empty($categories) && count($categories) > 0)
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}" @if($result->subCategory->category->id == $category->id) selected @endif>{{ $category->title }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input_box">
                                    <label>Sub Category</label>
                                    <div class="error form_error" id="form-error-sub_category_id"></div>
                                    <select name="sub_category_id">
                                        <option value="" selected disabled>Sub Category</option>
                                        @if(!empty($subCategories) && count($subCategories) > 0)
                                            @foreach($subCategories as $subCategory)
                                                <option value="{{ $subCategory->id }}" @if($result->subCategory->id == $subCategory->id) selected @endif>{{ $subCategory->title }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="input_box">
                                    <label>Title</label>
                                    <div class="error form_error" id="form-error-title"></div>
                                    <input type="text" name="title" placeholder="Title" value="{{ $result->title }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input_box">
                                    <label>Price</label>
                                    <div class="error form_error form-error-price"></div>
                                    <input type="number" name="price" placeholder="Price" value="{{ $result->price }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input_box">
                                    <label>Sort Order</label>
                                    <div class="error form_error form-error-sort_order"></div>
                                    <input type="number" name="sort_order" placeholder="Sort Order" value="{{ $result->sort_order }}">
                                </div>
                            </div>
                            <div class="clr"></div>
                        </div>
                        
                        <div class="input_boxes">
                            <div class="clr"></div>
                        </div>

                    </div>
                </form>
            </div>

    </div>
    <!-- /.row -->

<script type="text/javascript">
$(document).ready(function() {
    $("input").prop('disabled', true);
    $("select").prop('disabled', true);
    $("textarea").prop('disabled', true);
    $(".delete_icon").css({'display':'none'});
    $(".edit_details").css({'display':'none'});
});
</script>
@endsection    